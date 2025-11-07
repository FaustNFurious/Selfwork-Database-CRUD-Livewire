<div class="container-fluid">

    <div class="row align-items-center justify-content-center my-5">

        <div class="row">
            <h3 class="text-dark text-center display-2 my-5">Tutti i nostri prodotti</h3>
        </div>
        
        @forelse($services as $service)

            <div class="col-12 col-md-3">

                <x-Cards 
                    :computer="$service" 
                /> 
                    
            </div>
            
        @empty

            <div class="col-12">
                <h3 class="text-center my-5 text-dark">Nessun prodotto ancora registrato</h3>
            </div>

        @endforelse

    </div>
                
</div>