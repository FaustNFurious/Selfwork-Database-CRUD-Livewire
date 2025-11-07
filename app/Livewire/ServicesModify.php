<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;




class ServicesModify extends Component
{

    use WithFileUploads;

    public $service;
    public $brand;
    public $name;
    public $usage;
    public $price;
    public $img;
    public $oldImg;


    // Regole di validazione per l'update (simili a quelle della creazione)
    protected $rules = [
        'brand' => 'required|string|min:2|max:255',
        'name' => 'required|string|max:255',
        'usage' => 'required|string|max:50',
        'price' => 'required|numeric|min:0',
        'img' => 'nullable|image'
    ];

    // Messaggi personalizzati
    protected $messages = [
        '*.required' => 'Il Campo :attribute è obbligatorio.',
        'img.image' => 'Il campo Immagine Prodotto deve essere di tipo immagine.'
    ];


    public function servicesUpdate() {

        // Validazione: interrompe e popola $errors se qualcosa non va
        $this->validate();

        $this->service->update([
            'brand' => $this->brand,
            'name' => $this->name,
            'usage' => $this->usage,
            'price' => $this->price
        ]);

        if($this->img) {
            $this->service->update([
                'img' => $this->img->store('public/Immagini')
            ]);

            if($this->oldImg) {
                Storage::delete($this->oldImg);
            }

            $this->reset('img');

        }

        return redirect()->route('Home')->with('Successo', 'Hai modificato il tuo prodotto correttamente');

    }


    public function mount() {
        $this->brand = $this->service->brand;
        $this->name = $this->service->name;
        $this->usage = $this->service->usage;
        $this->price = $this->service->price;
        $this->oldImg = $this->service->img;
    }

    

    public function render()
    {
        return view('livewire.services-modify');
    }
}
