<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{


    protected function setUp(): void
    {
        parent::setUp();

        // Tell Laravel not to load @vite during tests
        $this->withoutVite();
    }
}
