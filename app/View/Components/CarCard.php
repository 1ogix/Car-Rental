<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Car;

class CarCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $car;
    public function __construct(Car $car)
    {
        //
        $this->car = $car;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.car-card');
    }
}
