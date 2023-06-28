@extends ('layouts.app')

@section('title')
    Inscription/connexion - Rhizome
@endsection

@section('content')
    <div class="container mx-auto">
        <h1 class="p-5">Bienvenue sur Rhizome</h1>
    </div>


    <div class="container mx-auto">
        <div class="row">
            <div class="baseline col-md-12 pb-5">
                <h1 class="connexion_title">Rhizome</h1>
                <h2>Notre réseau social dédié aux passionnés de plantes vous permet de connecter avec d'autres amateurs
                    et
                    d'échanger des conseils pour prendre soin de vos précieuses plantes.</h2>
            </div>
            
            <div class="col">
                <a href="login"><button class="connexion btn btn-lg px-5 btn-primary rounded-pill">Connexion</button></a>
            </div>
            <div class="col">
                <a href="register"><button
                        class="connexion btn btn-lg px-5 btn-primary rounded-pill">Inscription</button></a>
            </div>


        </div>
    </div>
@endsection
