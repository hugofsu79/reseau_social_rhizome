@extends('layouts.app')

@section('content')
    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-center">
                {{-- @if (Route::currentRouteName) == 'search'
                    <h1 class="m-5">Résultats de laa recherche</h1>
                @else --}}
                <h1 class="amazonie">L'Amazonie</h1>


                <!-- //********************** Formulaire ajout message ****************************\\ -->

                <form action="{{ route('posts.store') }}" method="POST" class="publication_home w-50"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- //********************** Input content ****************************\\ -->
                    <div class="row mb-3">
                        <i class="fas fa-pen-fancy text-primary fa-2x me-2"></i>
                        <h2 class="mt-5">De quelle plante veux-tu parler ?</h2>
                        <textarea required class="message_publication container-fluid rounded-3 pb-5 mt-2" type="text" name="content"
                            id="content" placeholder="...."></textarea>

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <!-- ** input tags **-->

                    <div class="row mb-4 justify-content-end">
                        <label for="tags" {{-- class="col-md-4 col-form-label text-md-end">#{{ implode(' #', explode(' ', $post->tags)) }}</label> --}} <div class="col-md-6">
                            <input id="tags" type="text"
                                class="tags rounded-pill form-control @error('tags') is-invalid @enderror" name="tags"
                                placeholder="#calamondin#agrume#citron" required autofocus>

                            @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!-- ** input image **-->

                    <div class="row mb-3 justify-content-end">
                        <label for="image"
                            class="col col-form-label text-md-end">{{ __('Uploade ton image ici (max 2 Mo)') }}</label>

                        <div class="col-md-5">
                            <input id="image" type="text"
                                class="parcourir rounded-pill form-control @error('image') is-invalid @enderror"
                                name="image" placeholder="Parcourir..." autocomplete="image" autofocus>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="partager btn btn-primary  rounded-pill">Partager</button>
                </form>
            </div>
        </div>
    </section>

    <!-- ** boucle qui affiche les messages **-->

    <section class="text-center">

        @foreach ($posts as $post)
            <div class="message_publication card container">
                <div class="all_avatar">
                    <p>Posté par {{ $post->user->pseudo }}</p>

                    <img class="avatar rounded-circle" src="{{ asset('images/' . $post->user->image) }}" alt="imagePost">

                </div>

                <!-- * Image post *-->

                <img class="image_publie w-50" src="{{ asset('images/' . $post->image) }}" alt="plantes">

                <!-- * Date du post *-->

                <p class="p-2">{{ $post->tags }}
                    Posté {{ $post->created_at }}</p>

                @if ($post->created_at != $post->updated_at)
                @endif


                <!-- * text post *-->

                <div class="card-body">
                    <p>{{ $post->content }}</p>
                    <h5 class="card-title"></h5>
                    <div class="col-md-8">


                        <!-- ** Bouton Commentaire **-->


                        <button class="btn btn-info"
                            onclick="document.getElementById('formulairecommentaire{{ $post->id }}').style.display = 'block'">
                            Commenter
                        </button>


                        <!-- ** Bouton modifier=> mène à la page modification **-->

                        {{-- @can('update', $post) --}}
                        <a href="{{ route('posts.edit', $post) }}">
                            <button class="btn btn-danger">modifier</button>
                        </a>
                        {{-- @endcan --}}


                        <!-- ** Bouton supprimer  post -> edit -> (comme le user)**-->
                        {{-- @can('delete', $post) --}}

                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @method ("delete") @csrf
                            <button type="submit" class="btn btn-danger">supprimer</button>
                        </form>
                        {{-- @endcan --}}
                    </div>
                </div>

                @foreach ($post->comments as $comment)
                    <div class="w-50 mx-auto card text-white">
                        {{-- @can('update', $comment)
                    @endcan --}}

                        <img class="card-img-top w-25" src="{{ asset('images/' . $comment->image) }} "
                            alt="image_commentaire">

                        <div class="card-body">
                            <p class="card-text">{{ $comment->content }}</p>
                            <p class="card-text">{{ $comment->tags }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </section>
@endsection
