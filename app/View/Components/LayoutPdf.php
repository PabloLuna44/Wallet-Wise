<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LayoutPdf extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $namePage = "Wallet Wise";
    public $date = '';

    public function __construct($title, $namePage = null, $date = null)
    {
        $this->title = $title;
        $this->namePage = $namePage ?? $this->namePage;
        date_default_timezone_set('America/Mexico_City');
        $this->date = date('Y-m-d H:i:s');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout-pdf');
    }
}
