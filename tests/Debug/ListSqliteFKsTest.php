namespace Tests\Debug;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ListSqliteFKsTest extends TestCase
{
    /** @test */
    public function list_foreign_keys_in_sqlite()
    {
        // Ensure we're using sqlite in-memory for tests
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

        var_export($result);

        $this->assertIsArray($result);
    }
}
