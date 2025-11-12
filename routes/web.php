<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TraineeController;

Route::get('/', [TraineeController::class,'index'])->name('home');
Route::post('/register', [TraineeController::class,'store'])->name('trainees.store');

// MVP simple login: set session by email (not secure, replace in production)
Route::post('/login', function (Illuminate\Http\Request $r) {
    $email = $r->input('email');
    $t = App\Models\Trainee::where('email',$email)->first();
    if ($t) {
        session(['trainee_id'=>$t->id]);
        return redirect('/panel');
    }
    return redirect('/')->with('error','Email no registrado');
})->name('login.post');

Route::get('/panel', function () {
    $id = session('trainee_id') ?? null;
    if (!$id) return redirect('/');
    $t = App\Models\Trainee::findOrFail($id);
    return view('panel.dashboard', ['trainee'=>$t]);
})->name('trainee.panel');

Route::get('/certificate/{id}', [TraineeController::class,'certificate'])->name('certificate.generate');
