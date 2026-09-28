<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
  use RefreshDatabase;

  protected function setUp(): void
  {
    if (! extension_loaded('pdo_sqlite')) {
      $this->markTestSkipped('Feature test membutuhkan ekstensi pdo_sqlite.');
    }

    parent::setUp();
  }

  public function test_each_role_can_log_in_with_its_username_and_password(): void
  {
    $accounts = [
      ['username' => 'kepala_desa', 'role' => 'kepala_desa', 'password' => 'kepala123'],
      ['username' => 'super_admin', 'role' => 'super_admin', 'password' => 'super123'],
      ['username' => 'admin', 'role' => 'admin', 'password' => 'admin123'],
    ];

    foreach ($accounts as $account) {
      $user = User::factory()->create([
        'username' => $account['username'],
        'role' => $account['role'],
        'password' => Hash::make($account['password']),
      ]);

      $response = $this->post(route('login.store'), [
        'username' => $account['username'],
        'password' => $account['password'],
      ]);

      $response->assertRedirect('/');
      $this->assertAuthenticatedAs($user);
      $this->post(route('logout'));
    }
  }

  public function test_login_rejects_invalid_password(): void
  {
    User::factory()->create([
      'username' => 'admin',
      'password' => Hash::make('admin123'),
    ]);

    $response = $this->from(route('login'))->post(route('login.store'), [
      'username' => 'admin',
      'password' => 'salah',
    ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHasErrors('username');
    $this->assertGuest();
  }
}
