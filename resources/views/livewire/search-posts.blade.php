<div class="row my-5">

    <input type="text" wire:model.live="search" class="form-control mb-5" placeholder="Cerca un post...">

    @if (session()->has('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif


    @foreach($posts as $post)

        <div class="col-12 col-md-3 my-5">
            <div class="card mx-auto">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                </div>
            </div>
        </div>

    @endforeach



</div>
