<x-Layout>




    <div class="container-fluid bg-black text-white min-vh-100">

        <div class="row my-5">

            <div class="col-12 text-center my-5">
                <h2>Naviga tra i nostri prodotti per tipologia di utilizzo</h2>
            </div>

        </div>

        @foreach ($types as $type)

            <div class="row justify-content-center align-items-center my-5">

                <div class="col-12 col-md-5 text-center">

                    <a href="{{route('type.List', compact('type'))}}" class="btn btn-outline-light btn-lg w-100">
                        {{$type->name}}
                    </a>

                </div>

            </div>

        @endforeach

    </div>



    
    
</x-Layout>