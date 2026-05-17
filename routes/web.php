<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::redirect('/about', '/')->name('about');

Route::get('/dashboard', function () {
    return redirect()->route('students.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/students/export/csv', [StudentController::class, 'exportCsv'])->name('students.export.csv');
    Route::get('/students/trash', [StudentController::class, 'trash'])->name('students.trash');
    Route::post('/students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');
    Route::delete('/students/{id}/force-delete', [StudentController::class, 'forceDelete'])->name('students.force-delete');
    Route::resource('students', StudentController::class);
    Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
