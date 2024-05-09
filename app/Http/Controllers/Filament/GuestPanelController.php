<?php

namespace App\Http\Controllers\Filament;

use App\Constants\Constants;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Message;
use App\Models\Offers;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\OfferItem;

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
        $offerItem = null;
        if ($offerItemId) {
            $offerItem = OfferItem::find($offerItemId);
        }
        return view('contact', compact('offerItem'));
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

        // $products = Product::all(); // Fetch all products
        $products = Product::where('product_type', 'school')->get(); // Fetch all products of type 'school'a

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