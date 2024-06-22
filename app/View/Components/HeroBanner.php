<?php

namespace App\View\Components;

use App\Models\Offers;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroBanner extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $offers = Offers::where('title', '!=', 'Rainshooting')->orderBy('updated_at', 'desc')->take(5)->get();
        $slides = $offers->map(function ($offer) {
            return [
                'image' => $offer->image_url,
                'alt' => $offer->title,
                'link' => route('offer', $offer->id),
            ];
        })->toArray();

        return view('components.hero-banner', compact('slides'));
    }
}
