<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

require __DIR__.'/auth.php';

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| Player Panel
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/player/dashboard', [PlayerController::class, 'dashboard'])
        ->name('player.dashboard');

    Route::get('/notifications', [NotificationController::class, 'index'])
        ->name('notifications.index');

});

/*
|--------------------------------------------------------------------------
| Tournaments
|--------------------------------------------------------------------------
*/

Route::get('/tournaments', [TournamentController::class, 'index'])
    ->name('tournaments.index');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/tournaments/create', [TournamentController::class, 'create'])
        ->name('tournaments.create');

    Route::post('/tournaments', [TournamentController::class, 'store'])
        ->name('tournaments.store');

    Route::get('/tournaments/{tournament}/edit', [TournamentController::class, 'edit'])
        ->name('tournaments.edit');

    Route::put('/tournaments/{tournament}', [TournamentController::class, 'update'])
        ->name('tournaments.update');

    Route::delete('/tournaments/{tournament}', [TournamentController::class, 'destroy'])
        ->name('tournaments.destroy');

    Route::get('/notifications/admin', [NotificationController::class, 'admin'])
        ->name('notifications.admin');

    Route::post('/notifications/send', [NotificationController::class, 'send'])
        ->name('notifications.send');

    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])
        ->name('notifications.destroy');

});

Route::get('/tournaments/{tournament}', [TournamentController::class, 'show'])
    ->name('tournaments.show');

    Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/tournaments', [TournamentController::class,'adminIndex'])
        ->name('admin.tournaments');

    Route::get('/tournaments/{tournament}/slots', [RegistrationController::class, 'slots'])
        ->name('registrations.slots'); 

});

/*
|--------------------------------------------------------------------------
| Teams
|--------------------------------------------------------------------------
*/

Route::resource('teams', TeamController::class);

/*
|--------------------------------------------------------------------------
| Registrations
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/kayit/{tournament}', [RegistrationController::class, 'create'])
        ->name('registration.create');

    Route::post('/kayit', [RegistrationController::class, 'store'])
        ->name('registration.store');

    Route::get('/registrations', [RegistrationController::class, 'index'])
        ->name('registrations.index');

});

Route::middleware(['auth','admin'])->group(function () {

    Route::post('/registrations/{id}/approve', [RegistrationController::class, 'approve'])
        ->name('registrations.approve');

    Route::post('/registrations/{id}/reject', [RegistrationController::class, 'reject'])
        ->name('registrations.reject');

     Route::post('/registrations/{id}/slot', [RegistrationController::class, 'slot'])
        ->name('registrations.slot');

     Route::get('/slots/{tournament}', [RegistrationController::class, 'slots'])
        ->name('registrations.slots');

});

/*
|--------------------------------------------------------------------------
| Rooms
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/room', [RoomController::class, 'show'])
        ->name('room.show');

});

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/rooms/create', [RoomController::class, 'create'])
        ->name('rooms.create');

    Route::post('/rooms/store', [RoomController::class, 'store'])
        ->name('rooms.store');

    Route::get('/rooms', [RoomController::class, 'index'])
        ->name('rooms.index');

     Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])
        ->name('rooms.edit');

     Route::put('/rooms/{room}', [RoomController::class, 'update'])
        ->name('rooms.update');

    Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])
        ->name('rooms.destroy');

});

/*
|--------------------------------------------------------------------------
| Results
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/results', [ResultController::class, 'index'])
        ->name('results.index');

});

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/results/create', [ResultController::class, 'create'])
        ->name('results.create');

    Route::post('/results/store', [ResultController::class, 'store'])
        ->name('results.store');

    Route::get('/results/{result}/edit', [ResultController::class, 'edit'])
        ->name('results.edit');

    Route::put('/results/{result}', [ResultController::class, 'update'])
        ->name('results.update');

    Route::delete('/results/{result}', [ResultController::class, 'destroy'])
        ->name('results.destroy');

});

/*
|--------------------------------------------------------------------------
| Reports
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Oyuncu Bildirim Gönderir
    Route::get('/reports/create', [ReportController::class, 'create'])
        ->name('reports.create');

    Route::post('/reports/store', [ReportController::class, 'store'])
        ->name('reports.store');

    // Admin Bildirimleri Görür
    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports.index');

    // Çözüldü
    Route::post('/reports/{report}/approve', [ReportController::class, 'approve'])
        ->name('reports.approve');

    Route::delete('/reports/{report}', [ReportController::class, 'destroy'])
        ->name('reports.destroy');

});

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');

    Route::post('/users/{user}/toggle', [UserController::class, 'toggle'])
        ->name('users.toggle');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])
        ->name('users.destroy');

});

/*
|--------------------------------------------------------------------------
| Announcements
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/announcements', [AnnouncementController::class, 'index'])
        ->name('announcements.index');

    Route::get('/announcements/create', [AnnouncementController::class, 'create'])
        ->name('announcements.create');

    Route::post('/announcements/store', [AnnouncementController::class, 'store'])
        ->name('announcements.store');

    Route::post('/announcements/{announcement}/toggle', [AnnouncementController::class, 'toggle'])
        ->name('announcements.toggle');

    Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])
        ->name('announcements.destroy');

});

/*
|--------------------------------------------------------------------------
| Support
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/supports', [SupportController::class, 'index'])
        ->name('supports.index');

    Route::get('/supports/create', [SupportController::class, 'create'])
        ->name('supports.create');

    Route::post('/supports', [SupportController::class, 'store'])
        ->name('supports.store');

});

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/supports', [SupportController::class, 'adminIndex'])
        ->name('supports.admin');

    Route::post('/supports/{support}/reply', [SupportController::class, 'reply'])
        ->name('supports.reply');

});

/*
|--------------------------------------------------------------------------
| Site Settings
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/settings', [SettingController::class, 'index'])
        ->name('settings.index');

    Route::post('/settings', [SettingController::class, 'update'])
        ->name('settings.update');

});
