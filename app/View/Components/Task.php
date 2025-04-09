<?php

namespace App\View\Components;

use Closure;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Task extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $id,
        public string $title,
        public ?string $description, 
        public string $duedate,
        public bool $iscomplete,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.task');
    }
}
