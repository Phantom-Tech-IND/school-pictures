<?php

namespace App\View\Components;

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
        $slides = [
            [
                'title' => 'Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi',
                'image' => 'hero-banner.jpg',
                'cta' => 'Get Started',
                'link' => '/contact',
                'caption' => 'Moderne Kindergarten - und Schulfotografie',
                'alt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ],
            [
                'title' => 'Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi',
                'image' => 'cute-boy-sit-grass-park-scaled.jpg',
                'cta' => 'Get Started',
                'link' => '/contact',
                'caption' => 'Moderne Kindergarten - und Schulfotografie',
                'alt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ],
        ];

        return view('components.hero-banner', compact('slides'));
    }
}
