<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    protected function getCart(Request $r): array
    {
        return $r->session()->get('cart', ['items' => []]);
    }
    protected function putCart(Request $r, array $cart): void
    {
        $r->session()->put('cart', $cart);
    }

    public function add(Request $r)
    {
        $data = $r->validate([
            'id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'], // en €, pour dev rapide
            'image' => ['nullable', 'string'],
            'qty' => ['nullable', 'integer', 'min:1'],
        ]);

        $qty = $data['qty'] ?? 1;
        $cart = $this->getCart($r);

        $i = collect($cart['items'])->search(fn($it) => $it['id'] === (int)$data['id']);
        if ($i !== false) {
            $cart['items'][$i]['qty'] += $qty;
        } else {
            $cart['items'][] = [
                'id' => (int)$data['id'],
                'name' => $data['name'],
                'price' => (float)$data['price'],
                'image' => $data['image'] ?? null,
                'qty' => $qty,
            ];
        }
        $this->putCart($r, $cart);
        return back();
    }

    public function remove(Request $r)
    {
        $data = $r->validate(['id' => ['required', 'integer']]);
        $cart = $this->getCart($r);
        $cart['items'] = collect($cart['items'])
            ->reject(fn($it) => $it['id'] === (int)$data['id'])
            ->values()->all();
        $this->putCart($r, $cart);
        return back();
    }

    public function clear(Request $r)
    {
        $this->putCart($r, ['items' => []]);
        return back();
    }
}
