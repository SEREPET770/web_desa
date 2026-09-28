<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
$dashboardRoles = [
    'super-admin' => ['label' => 'Super Admin', 'initials' => 'SA', 'canEdit' => true],
    'admin' => ['label' => 'Admin', 'initials' => 'AD', 'canEdit' => true],
    'kepala-desa' => ['label' => 'Kepala Desa', 'initials' => 'KD', 'canEdit' => false],
];

=======
>>>>>>> origin/main
Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');
<<<<<<< HEAD

Route::get('/dashboard/{role?}', function (?string $role = null) use ($dashboardRoles) {
    $sessionRole = session('dashboard_role');

    if ($sessionRole === null) {
        return redirect()->route('login');
    }

    if ($role !== null && $role !== $sessionRole) {
        abort(403, 'Anda tidak memiliki akses ke dashboard ini.');
    }

    $roleKey = $role ?? $sessionRole;

    abort_unless(isset($dashboardRoles[$roleKey]), 404);

    return view('dashboard', [
        'roleKey' => $roleKey,
        'role' => $dashboardRoles[$roleKey],
        'roles' => $dashboardRoles,
    ]);
})->name('dashboard');
=======
>>>>>>> origin/main
