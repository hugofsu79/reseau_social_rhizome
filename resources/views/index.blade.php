@extends ('layouts.app')

@section('title')
    Inscription/connexion - Rhizome
@endsection

@section('content')
    <main class="ensemble">


        <div class="container mx-auto">
            <h1 class="connexion_title">Bienvenue sur <br>Rhizome</h1>
        </div>


        <div class="container mx-auto">
            <div class="row">
                <div class="baseline col-md-12">
                    <h2>Notre réseau social dédié aux passionnés de plantes vous permet de connecter avec d'autres amateurs
                        et
                        d'échanger des conseils pour prendre soin de vos précieuses plantes.</h2>
                </div>

                <div class="col pb-5">
                    <a href="login"><button
                            class="connexion btn btn-lg px-5 btn-success rounded-pill">Connexion</button></a>
                </div>
                <div class="col pb-5">
                    <a href="register"><button
                            class="connexion btn btn-lg px-5 btn-success rounded-pill">Inscription</button></a>
                </div>


            </div>
        </div>
    </main>
@endsection
