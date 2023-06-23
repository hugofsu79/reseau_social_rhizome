@extends('layouts.app')

@section('content')
    <div class="card-body">
        <div class="container">
            <div class="row">
                {{-- @if (Route::currentRouteName) == 'search'
                    <h1 class="m-5">Résultats de laa recherche</h1>
                @else --}}
                    <h1 class="m-5">L'Amazonie</h1>


                    <!-- //********************** Formulaire ajout message ****************************\\ -->

                    <form action="{{ route('posts.store') }}" method="POST" class="w-50" enctype="multipart/form-data">
                        @csrf

                        <!-- //********************** Input content ****************************\\ -->

                        <div class="row mb-3">
                            <i class="fas fa-pen-fancy text-primary fa-2x me-2"></i>
                            <h2 class="mt-5">De quelle plante veux-tu parler ?</h2>
                            <textarea required class="container-fluid rounded-3 mt-2" type="text" name="content" id="content" placeholder="...."></textarea>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <!-- ** input tags **-->

                        <div class="row mb-4">
                            <label for="tags" class="col-md-4 col-form-label text-md-end">Ajoute des tags</label>

                            <div class="col-md-6">
                                <input id="tags" type="text"
                                    class="rounded-pill form-control @error('tags') is-invalid @enderror" name="tags"
                                    placeholder="#calamondin#agrume#citron" required autofocus>

                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- ** input image **-->

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="text"
                                    class="rounded-pill form-control @error('image') is-invalid @enderror" name="image"
                                    placeholder="Parcourir..." autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-5">Partager</button>

                        <!-- ** boucle qui affiche les messages **-->
                        @foreach ($posts as $post)
                            <div class="card text-bg-primary mb-3">
                                posté par {{ $post->user->pseudo }}
                                <div class="col-6">
                                    {{ $post->tags }}
                                    posté {{ $post->created_at }}
                                </div>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="row card-text">
                                    <div class="col-md-8">
                                        <img src="{{ asset('images/' . $post->image) }}" alt="imagePost">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($post->comments as $comment)
                            <div class="w-50 mx-auto card text-white bg-secondary">

                                <img class="card-img-top" src="{{ asset('images/' . $comment->image) }} "
                                    alt="image_commentaire">

                                <div class="card-body">
                                    <p class="card-text">{{ $comment->content }}</p>
                                    <p class="card-text">{{ $comment->tags }}</p>

                                    <!-- ** Bouton modifier=> mène à la page modification **-->

                                    {{-- @can --}}
                                    ('update', $post)
                                        <a href="{{ route('comments.edit', $comment) }}">
                                            <button class="btn btn-info">modifier</button>
                                        </a>
                                    {{-- @endcan --}}
                        @endforeach

                        <!-- ** Bouton supprimer **-->
                        {{-- @can --}}
                        ('delete', $post)
                            <div class="container text-center mt-5">supprimer</div>
                        {{-- @endcan --}}
                    </form>
            </div>
        </div>
    </div>
@endsection
