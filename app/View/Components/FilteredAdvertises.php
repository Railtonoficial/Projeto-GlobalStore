<?php

namespace App\View\Components;

use App\Models\Advertise;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilteredAdvertises extends Component
{
    public $advertisesList;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->advertisesList = Advertise::orderBy('created_at', 'desc')->limit(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filtered-advertises');
    }
}
