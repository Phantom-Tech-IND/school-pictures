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
                'image' => 'slider-home/Geschwistershooting.jpg',
                'alt' => 'A photoshoot featuring siblings.',
            ],
            [
                'image' => 'slider-home/Kindershooting.jpg',
                'alt' => 'A photoshoot featuring children.',
            ],
            [
                'image' => 'slider-home/Maennershooting.jpg',
                'alt' => 'A photoshoot featuring men.',
            ],
            [
                'image' => 'slider-home/Newborn-Baby.jpg',
                'alt' => 'A photoshoot featuring a newborn baby.',
            ],
            [
                'image' => 'slider-home/Partnershooting.jpg',
                'alt' => 'A photoshoot featuring partners.',
            ],
            [
                'image' => 'slider-home/Passbilder.jpg',
                'alt' => 'Passport photos.',
            ],
            [
                'image' => 'slider-home/Rainshooting.jpg',
                'alt' => 'A photoshoot in the rain.',
            ],
            [
                'image' => 'slider-home/Schwangerschaftsshooting.jpg',
                'alt' => 'A maternity photoshoot.',
            ],
            [
                'image' => 'slider-home/Akt-Erotikshooting.jpg',
                'alt' => 'A woman posing in lingerie on a bed for an artistic and erotic photoshoot.',
            ],
            [
                'image' => 'slider-home/Bewerbungsbilder.jpg',
                'alt' => 'A man in a business suit smiling and holding a folder, suitable for professional headshots or job application photos.',
            ],
            [
                'image' => 'slider-home/Familienshooting.jpg',
                'alt' => 'A family photoshoot.',
            ],
            [
                'image' => 'slider-home/Frauenshooting.jpg',
                'alt' => 'A photoshoot featuring women.',
            ],
        ];

        return view('components.hero-banner', compact('slides'));
    }
}
