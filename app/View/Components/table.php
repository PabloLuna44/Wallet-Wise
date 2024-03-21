<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public function __construct(public string $title = '', public array $object = [])
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
