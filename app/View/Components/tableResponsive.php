<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class tableResponsive extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title,public array $object, public string $tableId="dataTable-1")
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-responsive');
    }
}
