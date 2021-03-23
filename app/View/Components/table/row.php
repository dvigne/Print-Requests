<?php

namespace App\View\Components;

use Illuminate\View\Component;

class row extends Component
{
    public $filename;
    public $date;
    public $user;
    public $request;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($filename, $date, $user, $request)
    {
        $this->filename = $filename;
        $this->date     = $date;
        $this->user     = $user;
        $this->request  = $request;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.row');
    }
}
