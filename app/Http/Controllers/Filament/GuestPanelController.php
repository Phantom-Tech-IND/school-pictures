<?php

namespace App\Http\Controllers\Filament;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Message;
use App\Models\OfferItem;
use App\Models\Offers;
use App\Models\Order;
use App\Models\Product;
use App\Models\Student;
use App\Models\User;
use App\Notifications\MessageNotification;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class GuestPanelController extends Controller
{
    public function testEmail()
    {

        $message = 'This is a test message.';

        Notification::route('mail', 'axentioialexandru95@gmail.com')
            ->notify(new MessageNotification($message));

        return response()->json(['status' => 'success', 'message' => 'Email sent']);

    }

    public function login()
    {
        // Set SEO tags
        SEOTools::setTitle('Login');
        SEOTools::setDescription('Login to access your account.');

        return view('welcome');
    }

    public function index(Request $request)
    {
        // Set SEO tags
        SEOTools::setTitle('Home');
        SEOTools::setDescription('Welcome to our website.');

        return view('welcome');
    }

    public function cart(Request $request)
    {
        // Set SEO tags
        SEOTools::setTitle('Cart');
        SEOTools::setDescription('View and manage your cart items.');

        return view('cart');
    }

    public function webhookZahls(Request $request)
    {

        $data = $request->input('transaction');
        if (! $data) {
            return response()->json(['status' => 'error', 'message' => 'Invalid transaction data'], 400);
        }

        $invoiceData = $data['invoice'] ?? null;
        $referenceId = $data['referenceId'] ?? null;

        if (! $invoiceData || ! $referenceId) {
            return response()->json(['status' => 'error', 'message' => 'Missing invoice or reference ID'], 400);
        }

        // Find the order by referenceId
        $order = Order::where('id', $referenceId)->firstOrFail();
        $order->update([
            'payment_status' => 'paid',
        ]);

        $invoice = new Invoice([
            'products' => $invoiceData['products'] ?? [],
            'discount' => $invoiceData['discount'] ?? [],
            'currency' => $invoiceData['currency'] ?? 'CHF',
            'original_amount' => $invoiceData['originalAmount'] / 100 ?? 0,
            'refunded_amount' => $invoiceData['refundedAmount'] ?? 0,
            'custom_fields' => $invoiceData['custom_fields'] ?? [],
        ]);

        $order->invoice()->save($invoice);

        return response()->json(['status' => 'success', 'data' => $data]);
    }

    public function postContactForm(StoreMessageRequest $request)
    {
        try {
            Message::create($request->validated());

            $recipient = User::find(1);
            Notification::make()
                ->title('New message from '.$request->input('name'))
                ->body($request->input('message'))
                ->sendToDatabase($recipient);

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
        // Set SEO tags
        SEOTools::setTitle('Not Available');
        SEOTools::setDescription('The requested page is not available.');

        return view('not-available');
    }

    public function webshop(Request $request, $slug = null)
    {
        $categories = Category::all(); // Fetch all categories
        $selectedCategory = null;
        $productsQuery = Product::query(); // Start with a base query

        if ($slug) {
            $selectedCategory = Category::where('slug', $slug)->first();
            if (! $selectedCategory) {
                abort(404);
            }
            $productsQuery = $selectedCategory->products(); // Start with the category's products query
        }

        // Check if a search term is provided and modify the query accordingly
        if ($search = $request->input('search')) {
            $productsQuery->where('name', 'LIKE', "%{$search}%"); // Adjust 'name' if your product name column is different
        }

        $products = $productsQuery->paginate(10);

        // Set SEO tags
        SEOTools::setTitle('Webshop');
        SEOTools::setDescription('Browse our products.');

        return view('webshop', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }

    public function product(Request $request)
    {
        $product = null;

        $productId = $request->input('id');
        $studentId = session('student_id');

        if ($productId && $studentId) {
            $product = Product::where('id', $productId)->first();

            if ($product) {
                SEOTools::setTitle($product->name);
                SEOTools::setDescription($product->description);
            }

            $student = Student::with('photos') // Eager load photos
                ->find($studentId);

            if (! $student) {
                return redirect()->route('not-available'); // Redirect if no student is found
            }

            return view('product', compact('product', 'student'));
        }

        return view('not-available');
    }

    public function team(Request $request)
    {
        // Set SEO tags
        SEOTools::setTitle('Our Team');
        SEOTools::setDescription('Meet our team members.');

        return view('team');
    }

    public function kindergarden(Request $request)
    {
        // Set SEO tags
        SEOTools::setTitle('Kindergarden');
        SEOTools::setDescription('Learn more about our kindergarden services.');

        return view('kindergarden');
    }

    public function offers(Request $request)
    {
        $offers = Offers::all();

        // Set SEO tags
        SEOTools::setTitle('Offers');
        SEOTools::setDescription('View our current offers.');

        return view('offers', compact('offers'));
    }

    public function offer($id)
    {
        $offer = Offers::where('id', $id)->first();

        // Set SEO tags
        SEOTools::setTitle($offer->title);
        SEOTools::setDescription($offer->description);

        return view('offer', compact('offer'));
    }

    public function about(Request $request)
    {
        // Set SEO tags
        SEOTools::setTitle('About Us');
        SEOTools::setDescription('Learn more about our company and team.');

        return view('about');
    }

    public function partners(Request $request)
    {
        // Set SEO tags
        SEOTools::setTitle('Our Partners');
        SEOTools::setDescription('Meet our partners.');

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

        // Set SEO tags
        SEOTools::setTitle('Contact Us');
        SEOTools::setDescription('Get in touch with us.');

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
            SEOTools::setTitle('Student Not Found');
            SEOTools::setDescription('The requested student gallery is not available.');

            return redirect()->route('not-available'); // Redirect if no student is found
        }

        // Set dynamic SEO tags based on the student's name or a specific attribute
        SEOTools::setTitle('Gallery for '.$student->name);
        SEOTools::setDescription('View the gallery of '.$student->name.' including various photos and projects.');

        // Fetch all products of type 'school'
        $products = Product::all();

        return view('gallery-code', compact('student', 'products'));
    }

    public function upload()
    {
        // Set SEO tags
        SEOTools::setTitle('Upload');
        SEOTools::setDescription('Upload your files here.');

        return view('filament.guest.upload');
    }

    public function impressum()
    {
        // Set SEO tags
        SEOTools::setTitle('Impressum');
        SEOTools::setDescription('Legal information about our website.');

        return view('impressum');
    }

    public function cookiePolicy()
    {
        // Set SEO tags
        SEOTools::setTitle('Cookie Policy');
        SEOTools::setDescription('Information about our cookie policy.');

        return view('cookie-policy');
    }

    public function privacyPolicy()
    {
        // Set SEO tags
        SEOTools::setTitle('Privacy Policy');
        SEOTools::setDescription('Information about our privacy policy.');

        return view('privacy-policy');
    }

    public function generalTermsAndConditions()
    {
        // Set SEO tags
        SEOTools::setTitle('General Terms and Conditions');
        SEOTools::setDescription('Information about our general terms and conditions.');

        return view('general-terms-and-conditions');
    }

    public function frequentlyAskedQuestions()
    {
        $tabs = \App\Constants\Constants::FAQ_TABS;

        // Set SEO tags
        SEOTools::setTitle('Frequently Asked Questions');
        SEOTools::setDescription('Find answers to frequently asked questions.');

        return view('frequently-asked-questions', compact('tabs'));
    }
}
