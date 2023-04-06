<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LocalSistema extends Component
{

    public $local;
    public $url;
    public $texto;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($local, $url, $texto)
    {
        $this->local = $local;
        $this->url = $url;
        $this->texto = $texto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.local-sistema');
    }
}
