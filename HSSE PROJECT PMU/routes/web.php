
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Halaman Login
|--------------------------------------------------------------------------
| Login ini masih berupa tampilan/demo. Autentikasi sungguhan perlu
| dihubungkan ke sistem auth Laravel sebelum website dipublikasikan.
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    return redirect()->route('dashboard');
})->name('login.process');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Daily Work dan HSSE Plan
|--------------------------------------------------------------------------
| Menggunakan halaman Blade yang sudah ada.
*/

Route::get('/daily-work', function () {
    return view('daily-work.index');
})->name('daily-work.index');

Route::get('/hsse-plan', function () {
    return view('hsse-plan.index');
})->name('hsse-plan.index');

/*
|--------------------------------------------------------------------------
| Events
|--------------------------------------------------------------------------
*/

Route::get('/events', function () {
    return view('pages.module', [
        'title' => 'Events',
        'subtitle' => 'Pencatatan kegiatan, pelatihan, kampanye, dan inspeksi HSSE.',
        'module' => 'events',
    ]);
})->name('events.index');

/*
|--------------------------------------------------------------------------
| Inventory
|--------------------------------------------------------------------------
*/

Route::get('/inventory', function () {
    return view('pages.module', [
        'title' => 'Inventory',
        'subtitle' => 'Pemantauan barang, stok, serta transaksi masuk dan keluar.',
        'module' => 'inventory',
    ]);
})->name('inventory.index');

/*
|--------------------------------------------------------------------------
| Workforce
|--------------------------------------------------------------------------
*/

Route::get('/workforce', function () {
    return view('pages.module', [
        'title' => 'Workforce',
        'subtitle' => 'Pengelolaan dan pemantauan jumlah tenaga kerja.',
        'module' => 'workforce',
    ]);
})->name('workforce.index');

/*
|--------------------------------------------------------------------------
| Man Hours
|--------------------------------------------------------------------------
*/

Route::get('/man-hours', function () {
    return view('pages.module', [
        'title' => 'Man Hours',
        'subtitle' => 'Rekap jam kerja sebagai bagian dari pemantauan HSSE.',
        'module' => 'man-hours',
    ]);
})->name('man-hours.index');

/*
|--------------------------------------------------------------------------
| Incident
|--------------------------------------------------------------------------
*/

Route::get('/incident', function () {
    return view('pages.module', [
        'title' => 'Incident',
        'subtitle' => 'Pencatatan dan pemantauan insiden HSSE.',
        'module' => 'incident',
    ]);
})->name('incident.index');

/*
|--------------------------------------------------------------------------
| Issue & Follow Up
|--------------------------------------------------------------------------
*/

Route::get('/issue-follow-up', function () {
    return view('pages.module', [
        'title' => 'Issue & Follow Up',
        'subtitle' => 'Pemantauan temuan, penanggung jawab, tenggat, dan tindak lanjut.',
        'module' => 'issue-follow-up',
    ]);
})->name('issue-follow-up.index');

/*
|--------------------------------------------------------------------------
| User Management
|--------------------------------------------------------------------------
*/

Route::get('/users', function () {
    return view('pages.module', [
        'title' => 'User Management',
        'subtitle' => 'Halaman pengelolaan pengguna sistem.',
        'module' => 'users',
    ]);
})->name('users.index');

/*
|--------------------------------------------------------------------------
| Logout Demo
|--------------------------------------------------------------------------
| Ganti dengan proses logout Laravel ketika autentikasi sudah diterapkan.
*/

Route::post('/logout', function () {
    return redirect()->route('login');
})->name('logout');
