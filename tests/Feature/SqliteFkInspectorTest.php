<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SqliteFkInspectorTest extends TestCase
{
    /** @test */
    public function it_lists_foreign_keys_pointing_to_users_in_sqlite()
    {
        // Configure in-memory sqlite for this test run
        $this->app['config']->set('database.default', 'sqlite');
        $this->app['config']->set('database.connections.sqlite.database', ':memory:');

        Artisan::call('migrate', ['--force' => true]);

        $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%';");

        $result = [];
        foreach ($tables as $t) {
            $table = $t->name;
            $fks = DB::select("PRAGMA foreign_key_list('$table');");
            foreach ($fks as $fk) {
                if (isset($fk->table) && $fk->table === 'users') {
                    $result[] = [
                        'table' => $table,
                        'from' => $fk->from,
                        'to' => $fk->to,
                        'on_delete' => $fk->on_delete,
                        'on_update' => $fk->on_update,
                    ];
                }
            }
        }

        // Output for CI logs
        fwrite(STDOUT, "FKs pointing to users: " . print_r($result, true) . PHP_EOL);

        $this->assertIsArray($result);
    }
}
