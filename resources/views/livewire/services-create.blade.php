<form class="my-5" wire:submit.prevent="servicesStore" enctype="multipart/form-data">
    @csrf

    <!-- Funzione che cattura gli errori del form e li fa visualizzare a schermo -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
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
    
    <!-- Per il campo file, non si può memorizzare il file inserito in precedenza se non si compilano tutti i campi, pertanto si dovrà necessariamente reinserire -->
    <div class="mb-3">
        <label for="img" class="form-label">Inserisci l'immagine del Prodotto</label>
        <input type="file" class="form-control" wire:model="img" id="img">
    </div>

    @foreach($types as $type)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="selectedTypes" id="typeCheck{{$type->id}}" value="{{$type->id}}">
            <label class="form-check-label" for="typeCheck{{$type->id}}">{{$type->name}}</label>
        </div>
    @endforeach

    <p>Non trovi la tipologia di utilizzo corretto? <a href="{{route('type.Create')}}">Aggiungila tu!</a> </p>
    

    
    <button type="submit" class="btn btn-primary my-5">Invio Modulo</button>


</form>