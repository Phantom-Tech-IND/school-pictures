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
                'image' => 'slider-home/Geschwistershooting.webp',
                'alt' => 'A photoshoot featuring siblings.',
            ],
            [
                'image' => 'slider-home/Kindershooting.webp',
                'alt' => 'A photoshoot featuring children.',
            ],
            [
                'image' => 'slider-home/Maennershooting.webp',
                'alt' => 'A photoshoot featuring men.',
            ],
            [
                'image' => 'slider-home/Newborn-Baby.webp',
                'alt' => 'A photoshoot featuring a newborn baby.',
            ],
            [
                'image' => 'slider-home/Partnershooting.webp',
                'alt' => 'A photoshoot featuring partners.',
            ],
            [
                'image' => 'slider-home/Passbilder.webp',
                'alt' => 'Passport photos.',
            ],
            [
                'image' => 'slider-home/Rainshooting.webp',
                'alt' => 'A photoshoot in the rain.',
            ],
            [
                'image' => 'slider-home/Schwangerschaftsshooting.webp',
                'alt' => 'A maternity photoshoot.',
            ],
            [
                'image' => 'slider-home/Akt-Erotikshooting.webp',
                'alt' => 'A woman posing in lingerie on a bed for an artistic and erotic photoshoot.',
            ],
            [
                'image' => 'slider-home/Bewerbungsbilder.webp',
                'alt' => 'A man in a business suit smiling and holding a folder, suitable for professional headshots or job application photos.',
            ],
            [
                'image' => 'slider-home/Familienshooting.webp',
                'alt' => 'A family photoshoot.',
            ],
            [
                'image' => 'slider-home/Frauenshooting.webp',
                'alt' => 'A photoshoot featuring women.',
            ],
        ];

        return view('components.hero-banner', compact('slides'));
    }
}
