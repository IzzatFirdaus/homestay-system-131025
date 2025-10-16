<?php

declare(strict_types=1);

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WelcomePageTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function test_basic_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Sistem Pengurusan & Analitik Homestay');
        });
    }
}
