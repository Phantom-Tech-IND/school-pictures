<?php

namespace App\Http\Controllers\Filament;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Offers;
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

    public function cart(Request $request)
    {
        return view('cart');
    }

    public function postContactForm(Request $request)
    {
        Message::create($request->all());
    }

    public function notAvailable(Request $request)
    {
        return view('not-available');
    }

    public function shop(Request $request)
    {
        $products = Product::all();

        return view('webshop', compact('products'));
    }

    public function product(Request $request)
    {
        $product = null;

        $productId = $request->input('id');
        if ($productId) {
            $product = Product::where('id', $productId)->first();

            return view('product', compact('product'));
        }

        return view('not-available');

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
        $offers = Offers::all();

        return view('offers', compact('offers'));
    }

    public function offer(Request $request)
    {
        $offer = Offers::where('id', $request->input('id'))->first();

        return view('offer', compact('offer'));
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
        $searchTerm = $request->input('code');
        $birthDate = $request->input('date'); // Get birth date from request
        $student = null;
        DB::enableQueryLog();
        if (! empty($searchTerm)) {
            $student = Student::where('name', 'like', '%'.$searchTerm.'%')
                ->when($birthDate, function ($query) use ($birthDate) {
                    return $query->where('birth_date', $birthDate);
                })
                ->first(['id', 'name', 'birth_date']); // Ensure 'id' is selected for the relationship loading

            if (! $student) {
                return redirect()->route('not-available'); // Redirect to a 404 page if no student is found
            }

            $student->load('photos'); // Explicitly load the photos relationship

            Log::info(DB::getQueryLog());
        } else {
            return redirect()->route('not-available'); // Redirect to a 404 page if search term is empty
        }

        $products = Product::all(); // Fetch all products

        return view('gallery-code', compact('student', 'products'));
    }

    public function upload()
    {
        return view('filament.guest.upload');
    }
}
