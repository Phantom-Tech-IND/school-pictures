<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOTools;

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

            // Set SEO tags
            SEOTools::setTitle('Gallery Code');
            SEOTools::setDescription('View your gallery using the code.');

            return response()->json(['redirect' => '/gallery-code']);
        } else {
            return response()->json(['error' => 'The provided credentials do not match our records.'], 404);
        }
    }
}
