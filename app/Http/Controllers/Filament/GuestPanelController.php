<?php

namespace App\Http\Controllers\Filament;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Category;
use App\Models\Message;
use App\Models\OfferItem;
use App\Models\Offers;
use App\Models\Product;
use App\Models\Student;
use App\Models\User;
use App\Notifications\ContactFormSubmitted;
use Illuminate\Http\Request;

class GuestPanelController extends Controller
{
    public function login()
    {
        return view('welcome');
    }

    public function index(Request $request)
    {
        return view('welcome');
    }

    public function cart(Request $request)
    {
        return view('cart');
    }

    public function postContactForm(StoreMessageRequest $request)
    {
        try {

            Message::create($request->validated());

            $admin = User::find(1);
            $admin->notify(new ContactFormSubmitted($request->validated()));

            return response()->json([
                'status' => 'success',
                'message' => 'Your message has been successfully sent.',
                'data' => $request->all(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send message. Error: '.$e->getMessage(),
            ], 500);
        }
    }

    public function notAvailable(Request $request)
    {
        return view('not-available');
    }

    public function shop(Request $request)
    {
        $productsQuery = Product::query(); // Start with a base query
        $categories = Category::all(); // Fetch all categories

        // Check if a search term is provided and modify the query accordingly
        if ($search = $request->input('search')) {
            $productsQuery->where('name', 'LIKE', "%{$search}%"); // Adjust 'name' if your product name column is different
        }

        $products = $productsQuery->paginate(10);

        return view('webshop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function showCategoryProducts($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        if (! $category) {
            abort(404);
        }

        // Start with the category's products query
        $query = $category->products();

        // Check if a search term is provided and modify the query accordingly
        if ($search = $request->input('search')) {
            $query->where('name', 'LIKE', "%{$search}%"); // Adjust 'name' if your product name column is different
        }

        $products = $query->paginate(10);

        return view('category.products', compact('products', 'category', 'categories'));
    }

    public function product(Request $request)
    {
        $product = null;

        $productId = $request->input('id');
        $studentId = session('student_id');

        if ($productId && $studentId) {
            $product = Product::where('id', $productId)->first();

            $student = Student::with('photos') // Eager load photos
                ->find($studentId);

            if (!$student) {
                return redirect()->route('not-available'); // Redirect if no student is found
            }

            return view('product', compact('product', 'student'));
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

    public function offer($id)
    {
        $offer = Offers::where('id', $id)->first();

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
        $offerItemId = $request->query('offerItemId');
        $offers = Offers::with('offerItems')->get(); // Fetch all offers with their related offer items
        $offerItem = null;

        if ($offerItemId) {
            $offerItem = OfferItem::find($offerItemId);
        }

        return view('contact', compact('offers', 'offerItem'));
    }

    public function galleryCode(Request $request)
    {
        // Retrieve student ID from session
        $studentId = session('student_id');

        if (! $studentId) {
            return redirect()->route('not-available'); // Redirect if no student ID is found in session
        }

        // Fetch the student from the database
        $student = Student::with('photos') // Eager load photos
            ->find($studentId);

        if (! $student) {
            return redirect()->route('not-available'); // Redirect if no student is found
        }

        // Fetch all products of type 'school'
        $products = Product::where('product_type', 'school')->get();

        return view('gallery-code', compact('student', 'products'));
    }

    public function upload()
    {
        return view('filament.guest.upload');
    }

    public function impressum()
    {
        return view('impressum');
    }

    public function cookiePolicy()
    {
        return view('cookie-policy');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function generalTermsAndConditions()
    {
        return view('general-terms-and-conditions');
    }

    public function frequentlyAskedQuestions()
    {
        $tabs = \App\Constants\Constants::FAQ_TABS;

        return view('frequently-asked-questions', compact('tabs'));
    }
}
