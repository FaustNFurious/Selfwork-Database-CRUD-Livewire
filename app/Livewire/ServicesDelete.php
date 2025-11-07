<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class ServicesDelete extends Component
{

    public $service;


    public function deleteService() {

        // Controllo che l'utente sia autenticato e che sia il proprietario del prodotto da eliminare
        if (Auth::check() && $this->service->user_id == Auth::id()) {
            $serviceName = $this->service->name;

            // Se presenti, rimuovo tutte le relazioni many-to-many per evitare errori di FK, come errori di vincoli, es. SQLSTATE[23000]
            if (method_exists($this->service, 'types')) {
                $this->service->types()->detach();
            }

            if($this->service->img != null) {
                Storage::delete($this->service->img);
            }

            $this->service->delete();
            return redirect()->route('Home')->with('Successo', 'Hai eliminato il tuo prodotto correttamente');

        } else {
            return redirect()->route('Home')->with('Errore', 'Non puoi eliminare un prodotto che non hai creato tu');
        }

    }


    public function render()
    {
        return view('livewire.services-delete');
    }
}
