<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Type;



class ServicesCreate extends Component
{

    use WithFileUploads;

    public $name;
    public $brand;
    public $usage;
    public $price;
    public $img;
    public $user_id;
    public $types; // lista delle tipologie per la view
    public $selectedTypes = []; // checkbox selezionate


    protected $rules = [
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'usage' => 'required|string|max:50',
        'price' => 'required|numeric|min:0',
        'img' => 'required|image'
    ];


    // Funzione che raccoglie tutti i campi required e mostra un messaggio di errore personalizzato
    protected $messages = [
        '*.required' => 'Il Campo :attribute è obbligatorio.'
    ];


    public function mount()
    {
        // recupero le tipologie per popolare i checkbox nella view
        $this->types = Type::all();
    }


    public function servicesStore() {

        // Validazione: interrompe e popola $errors se qualcosa non va
        $this->validate();

        $this->user_id = Auth::user()->id;

        // Salvo l'immagine in una variabile già validata per evitare errori su null
        $imgPath = $this->img ? $this->img->store('public/images') : null;

        $service = Service::create([
            'name' => $this->name,
            'brand' => $this->brand,
            'usage' => $this->usage,
            'price' => $this->price,
            'img' => $imgPath,
            'user_id' => $this->user_id
        ]);

        // se l'utente ha selezionato delle tipologie, le associo al servizio
        if (!empty($this->selectedTypes)) {
            $service->types()->attach($this->selectedTypes);
        }

        return redirect()->route('Home')->with('Successo', 'Prodotto creato con successo!');

    }


    public function render()
    {
        return view('livewire.services-create');
    }
}
