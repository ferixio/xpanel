<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Grid1 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $data ;
    public function __construct($data)
    {
        //
        $this->data = 'oke gan';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.public.section.grid1');
    }
    
}
