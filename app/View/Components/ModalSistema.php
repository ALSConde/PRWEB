<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;


class ModalSistema extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $regId, public $url, public $title)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): Closure|string|View
    {
        return view('components.modal-sistema');
    }
}
