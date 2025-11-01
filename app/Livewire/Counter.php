<?php

namespace App\Livewire;

use Livewire\Component;




class Counter extends Component
{

    public $cnt = 0;


    // Increment the counter by 1
    public function increment() {
        $this->cnt++;
    }


    // Decrement the counter by 1
    public function decrement() {
        $this->cnt--;
    }


    // Increment the counter by N
    public function incrementByN($num) {
        $this->cnt += $num;
    }


    // Decrement the counter by N
    public function decrementByN($num) {
        $this->cnt -= $num;
    }



    public function render()
    {
        return view('livewire.counter');
    }
}
