<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Models\Homestay;
use App\Models\User;
use App\Services\UserAccessService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class UserAccessServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_access_scoped_by_negeri(): void
    {
        Homestay::factory()->forNegeri('Selangor')->count(2)->create();
        Homestay::factory()->forNegeri('Johor')->count(1)->create();

        // Use a partial mock to bypass spatie/permission roles tables
        /** @var User $user */
        $user = new class extends User
        {
            public function hasAnyRole(...$roles): bool
            {
                return false;
            }
        };
        $user->negeri = 'Selangor';
        $user->cooperative_id = null;

        $service = app(UserAccessService::class);
        $homestays = $service->getAccessibleHomestays($user);

        $this->assertCount(2, $homestays);
        $this->assertTrue($homestays->every(fn ($h) => $h->negeri === 'Selangor'));
    }
}
