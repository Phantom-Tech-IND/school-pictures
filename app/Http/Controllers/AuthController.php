<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::guard('student')->logout();
        session()->forget('student_id');

        return redirect()->route('home');
    }

    public function login(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'birth_date' => 'required|date',
        ]);

        $student = Student::where('name', $request->name)
            ->whereDate('birth_date', $request->birth_date)
            ->first();

        if ($student) {
            Auth::guard('student')->login($student);
            session()->put('student_id', $student->id);

            return redirect()->intended('/gallery-code');
        } else {
            return back()->withErrors(['welcome' => 'The provided credentials do not match our records.']);
        }

    }
}
