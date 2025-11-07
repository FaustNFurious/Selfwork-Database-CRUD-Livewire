<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;




class ServicesList extends Component
{
    public function render()
    {
        $services = Service::all()->sortByDesc('created_at');
        return view('livewire.services-list', compact('services'));
    }
}
