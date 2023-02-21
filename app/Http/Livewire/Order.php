<?php

namespace App\Http\Livewire;

use Livewire\Component;


class Order extends Component
{
    public $count = 2;
    public function render()
    {
        return view('livewire.order');
    }
}
