<div class="text-center justify-content-center my-5 align-items-center">


    <h2>Il Valore è: {{$cnt}}</h2>

    <div class="mx-auto my-5">
        <button wire:click="increment" class="btn btn-primary">Incrementa di 1</button>
    </div>

    <div class="mx-auto my-5">
        <button wire:click="decrement" class="btn btn-outline-warning">Decrementa di 1</button>
    </div>

    <div class="mx-auto my-5">
        <button wire:click="incrementByN(5)" class="btn btn-outline-info">Incrementa di 5</button>
    </div>

    <div class="mx-auto my-5">
        <button wire:click="decrementByN(5)" class="btn btn-outline-danger">Decrementa di 5</button>
    </div>



</div>

