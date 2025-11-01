    <nav class="navbar navbar-expand-lg bg-dark fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('Home')}}"><i class="bi bi-rocket-takeoff-fill"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('Home')}}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{route('AboutUs')}}">Chi Siamo</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{route('Contacts')}}">Contatti</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{route('services.ServicesList')}}">Servizi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{route('Posts')}}">Tutti i Post</a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Creazioni
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('services.ServicesCreation')}}">Creazione Prodotto</a></li>
                        <li><a class="dropdown-item" href="{{route('type.Create')}}">Aggiungi Nuovo Utilizzo</a></li>
                        <li><a class="dropdown-item" href="{{route('type.Index')}}">Tutti gli Utilizzi</a></li>
                    </ul>

                </li>

                <li class="nav-item dropdown">

                    <!-- Se l'utente è già loggato, visualizzo un tipo menù, altrimenti visualizzo le impostazioni generiche -->
                    @auth
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bentornato, {{Auth::user()->name}}
                        </a>

                        <ul class="dropdown-menu">
                            
                            <li>
                                <a class="dropdown-item" href="{{route('user.Profilo')}}">Il mio Profilo</a>
                            </li>


                            <!--Per il pulsante di Logout bisogna eseguire più passaggi, perchè di norma i <li> supportano solo il metodo GET, 
                                al Logout serve il metodo POST -->
                            <li>

                                <a href="{{route('logout')}}" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a>

                                <form action="{{route('logout')}}" method="POST" id="form-logout" style="display: none;">@csrf</form>
                                
                            </li>
                            
                        </ul>
                    @else

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Benvenuto, Utente
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                        </ul>

                    @endauth

                </li>

            </ul>
            
            </div>
        </div>
    </nav>