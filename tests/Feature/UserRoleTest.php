<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_helper_returns_true_for_admin(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->assertTrue(
            $admin->isAdmin()
        );
    }

    public function test_admin_helper_returns_false_for_user(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $this->assertFalse(
            $user->isAdmin()
        );
    }
}