<form class="my-5" wire:submit.prevent="servicesUpdate" enctype="multipart/form-data">
    @csrf
    
    <!-- Funzione che cattura gli errori del form e li fa visualizzare a schermo -->
    @if ($errors->any())
        <div class="alert alert-danger my-5 text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label for="brand" class="form-label">Marchio Prodotto</label>
        <input type="text" class="form-control" wire:model="brand" id="brand" value="{{old('brand')}}">
    </div>
    
    <div class="mb-3">
        <label for="name" class="form-label">Nome Prodotto</label>
        <input type="text" class="form-control" wire:model="name" id="name" value="{{old('name')}}">
    </div>

    <div class="mb-3">
        <label for="usage" class="form-label">Utilizzo</label>
        <input type="text" class="form-control" wire:model="usage" id="usage" value="{{old('usage')}}">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo Prodotto</label>
        <input type="number" class="form-control" wire:model="price" id="price" value="{{old('price')}}">
    </div>

    <div class="mb-3">
        @if ($service->img)
            <p class="h5">Immagine odierna</p>
            <img src="{{ Storage::url($service->img) }}" class="img-fluid" alt="Anteprima Immagine">
        @else
            <p class="h5">Nessuna Immagine caricata</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Inserisci l'immagine del Prodotto</label>
        <input type="file" class="form-control" wire:model="img" id="img">
    </div>


    <button type="submit" class="btn btn-primary my-5">Invio Modifica</button>
    

</form>