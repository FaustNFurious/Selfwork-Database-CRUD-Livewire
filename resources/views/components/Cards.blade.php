<div class="card my-5 mb-5" style="width: 18rem;">

<!-- Caricamento Immagine di Default in caso il database non contenga immagini salvate -->
    @if(!$computer->img)
        <img src="https://picsum.photos/200/300" class="card-img-top card-img-custom" alt="Immagine di default">
    @else
    <img src="{{Storage::url($computer->img)}}" class="card-img-top card-img-custom" alt="Immagine di {{$computer['name']}}">
    @endif

    <div class="card-body">

        <h5 class="card-title">Nome: {{$computer['name']}}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">Marchio: {{$computer['brand']}}</h6>
        <p class="card-text">Utilizzo: {{$computer['usage']}}</p>
        <p class="card-text">Prezzo: {{$computer['price']}}€</p>
        <p class="card-text">Creato da: {{$computer->user->name}}</p>

        <div class="d-flex flex-wrap">
            @forelse($computer->types as $type)
                <a href="{{route('type.List', compact('type'))}}" class="badge bg-secondary m-1 mb-3 mx-auto text-decoration-none">{{$type->name}}</a>
            @empty
                <p>Nessuna Tipologia Associata</p>
            @endforelse
        </div>

        <a href="{{route('services.ServicesDetails', compact('computer'))}}" class="btn btn-primary">Più Info</a>

        @auth
            <!-- Il pulsante viene mostrato solo se l'utente è autenticato ed è stato lui a creare il prodotto -->
            @if ($computer->user_id == Auth::id())
                <a href="{{route('services.ServicesModify', compact('computer'))}}" class="btn btn-primary">Modifica</a>
            @endif
            
        @endauth

    </div>

</div>   