<?php
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\ProjectController as PublicProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// /projects
Route::get('/projects', [PublicProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/show/{project}', [PublicProjectController::class, 'show'])->name('projects.show');


Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
   
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // /admin/projects
        Route::resource('projects', ProjectController::class);
        Route::resource('types', TypeController::class);
        Route::resource('technologies', TechnologyController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
