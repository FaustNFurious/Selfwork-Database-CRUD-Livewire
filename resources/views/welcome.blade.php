<x-Layout>




    <header>

      <div class="container-fluid header-custom">

        @if (session()->has('email-inviata'))
          <div class="alert alert-secondary my-5">
            {{ session('email-inviata') }}
          </div>
        @endif

        @if (session()->has('erroreEmail'))
          <div class="alert alert-danger my-5">
            {{ session('erroreEmail') }}
          </div>
        @endif

        @if (session()->has('Successo'))
          <div class="alert alert-success my-5">
            {{ session('Successo') }}
          </div>
        @endif

        @if (session()->has('Errore'))
          <div class="alert alert-danger my-5">
            {{ session('Errore') }}
          </div>
        @endif


        <div class="row vh-100 align-items-center">
          <div class="col-12">
            <h1 class="text-light text-center display-1 fw-bold">Blog Personale</h1>
          </div>
        </div>

      </div>

    </header>

    
    

      <div class="container-fluid header-custom">

        <div class="row align-items-center text-center text-white justify-content-center">
          <livewire:counter />
        </div>

      </div>

    



</x-Layout>