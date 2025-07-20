<?php

use App\Http\Controllers\FrontendController;
use App\Models\Problem;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/permission', function () {
//     return auth()->user()->hasPermission('permission_create');
// });

Route::get('/', [FrontendController::class, 'index']);
// Route::get('/problems/{slug}', [FrontendController::class, 'showProblem'])->name('problems.show');
Route::get('/problems/{slug}', function ($slug) {
    $problem = Problem::where('slug', $slug)->firstOrFail();

    // Directly return the HTML (the markdown field contains full HTML).
    return response($problem->markdown)
        ->header('Content-Type', 'text/html');
});

