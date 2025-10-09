<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // A) Ajouter la colonne si elle n'existe pas
        if (!Schema::hasColumn('categories', 'slug')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('name');
            });
        }

        // B) Backfill uniquement là où slug est NULL ou vide
        $rows = DB::table('categories')
            ->select('id', 'name', 'slug')
            ->where(function ($q) {
                $q->whereNull('slug')->orWhere('slug', '');
            })
            ->orderBy('id')->get();

        foreach ($rows as $row) {
            $base = Str::slug((string) $row->name);
            if ($base === '') {
                $base = 'category-' . $row->id;
            }

            $slug = $base;
            $i = 1;
            while (
                DB::table('categories')
                ->where('slug', $slug)
                ->where('id', '!=', $row->id)
                ->exists()
            ) {
                $slug = $base . '-' . $i++;
            }

            DB::table('categories')->where('id', $row->id)->update(['slug' => $slug]);
        }

        // C) Rendre NOT NULL si tout est rempli
        $nulls = DB::table('categories')->whereNull('slug')->orWhere('slug', '')->count();
        if ($nulls === 0) {
            // MySQL syntax
            DB::statement("ALTER TABLE categories MODIFY slug VARCHAR(255) NOT NULL");
        }

        // D) Ajouter l'unique si pas déjà présent
        $hasUnique = DB::table('information_schema.statistics')
            ->where('table_schema', DB::getDatabaseName())
            ->where('table_name', 'categories')
            ->where('column_name', 'slug')
            ->where('non_unique', 0)
            ->exists();

        if (!$hasUnique) {
            Schema::table('categories', function (Blueprint $table) {
                $table->unique('slug');
            });
        }
    }

    public function down(): void
    {
        // Supprimer l'unique si présent puis la colonne
        $hasUnique = DB::table('information_schema.statistics')
            ->where('table_schema', DB::getDatabaseName())
            ->where('table_name', 'categories')
            ->where('column_name', 'slug')
            ->where('non_unique', 0)
            ->exists();

        Schema::table('categories', function (Blueprint $table) use ($hasUnique) {
            if ($hasUnique) {
                $table->dropUnique('categories_slug_unique');
            }
            if (Schema::hasColumn('categories', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};
