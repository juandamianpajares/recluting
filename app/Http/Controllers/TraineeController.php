<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainee;
use Illuminate\Support\Str;

class TraineeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:trainees,email',
            'github' => 'nullable|string|max:255',
            'motivation' => 'nullable|string|max:1000',
        ]);

        $data['progress'] = 0;
        $data['certificate_code'] = null;
        $trainee = Trainee::create($data);

        return redirect()->route('home')->with('success', 'Registro exitoso. Revisa tu correo (Mailhog) para instrucciones.');
    }

    public function panel()
    {
        // Simple session-based for MVP
        $id = session('trainee_id') ?? null;
        if (!$id) return redirect()->route('home');
        $trainee = Trainee::findOrFail($id);
        return view('panel.dashboard', compact('trainee'));
    }

    public function certificate($id)
    {
        $t = Trainee::findOrFail($id);
        if ($t->progress < 100) abort(403,'Progreso insuficiente');
        if (!$t->certificate_code) {
            $t->certificate_code = strtoupper(Str::random(10));
            $t->save();
        }
        $html = view('certificate.template', ['trainee'=>$t])->render();
        // For MVP return HTML; recommend dompdf for PDF generation in production
        return response($html);
    }
}
