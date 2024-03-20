<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public $title;
    public $namePage = "Wallet Wise";
    public $year = '';

    public function __construct($title, $namePage = null, $year = null)
    {
        $this->title = $title;
        // Asigna los parámetros opcionales solo si se proporcionan
        $this->namePage = $namePage ?? $this->namePage;
        $this->year = $year !== '' ? $year : date('Y');
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
