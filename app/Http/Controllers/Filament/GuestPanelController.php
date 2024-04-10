<?php

namespace App\Http\Controllers\Filament;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GuestPanelController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }

    public function shop(Request $request)
    {
        return view('webshop');
    }

    public function team(Request $request)
    {
        return view('team');
    }

    public function kindergarden(Request $request)
    {
        return view('kindergarden');
    }

    public function offers(Request $request)
    {
        return view('offers');
    }

    public function about(Request $request)
    {
        return view('about');
    }

    public function partners(Request $request)
    {
        return view('partners');
    }

    public function contact(Request $request)
    {
        return view('contact');
    }

    public function galleryCode(Request $request)
    {
        $searchTerm = $request->input('search');
        $birthDate = $request->input('birth_date'); // Get birth date from request
        $student = null;
        DB::enableQueryLog();
        if (! empty($searchTerm)) {
            $student = Student::where('name', 'like', '%'.$searchTerm.'%')
                ->when($birthDate, function ($query) use ($birthDate) {
                    return $query->where('birth_date', $birthDate);
                })
                ->first(['id', 'name', 'birth_date']); // Ensure 'id' is selected for the relationship loading

            if ($student) {
                $student->load('photos'); // Explicitly load the photos relationship
            }

            Log::info(DB::getQueryLog());
        }

        $products = Product::all(); // Fetch all products

        return view('gallery-code', compact('student', 'products'));
    }

    public function upload()
    {
        return view('filament.guest.upload');
    }
}
