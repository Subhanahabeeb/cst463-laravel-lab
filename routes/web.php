<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| ROUTES  — the front door of a Laravel app
|--------------------------------------------------------------------------
| Every request (URL + HTTP verb) is matched against this list.
| The first route that matches decides who handles it:
|   - a closure (small function written right here), or
|   - a controller method   [SomeController::class, 'method']
|
| See every route:   php artisan route:list
*/

// Lesson 1: the home page. A closure that returns a view (resources/views/home.blade.php).
Route::get('/hello/{Subhana}', function ($Subhana) {
    return 'Hello, '.$Subhana;
});

// Lessons 2-6: you will add your routes below this line.
Route::get('/about',[AboutController::class,'index']);
Route::resource('students',StudentController::class);
Route::get('/roll/{roll}',function(Student $roll){
    return view('students.show',['student'=>$roll]);
});
Route::get('/api/students',function() {
    return response()->son(Student::all());
});