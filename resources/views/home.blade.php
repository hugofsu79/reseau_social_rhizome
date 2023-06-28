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
            <div class="message_publication card container w-100">
                <div class="all_avatar pt-3">
                    <p>Posté par {{ $post->user->pseudo }}</p>

                    <img class="avatar rounded-circle" src="{{ asset('images/' . $post->user->image) }}" alt="imagePost">

                </div>

                <!-- * Image post *-->
                <div class="col">
                    <img class="image_publie w-75" src="{{ asset('images/' . $post->image) }}" alt="plantes">
                </div>

                <!-- * Date du post *-->

                <p class="p-2">{{ $post->tags }}
                    Posté {{ $post->created_at }}</p>

                @if ($post->created_at != $post->updated_at)
                @endif


                <!-- * text post *-->

                <div class="card-body">
                    <p class="commentaire_publication">{{ $post->content }}</p>
                    <div class="boutons_publications m-auto">


                        <!-- ** Bouton Commentaire **-->


                        <button class="style_button btn btn-primary  rounded-pill m-1"
                            onclick="document.getElementById('formulairecommentaire{{ $post->id }}').style.display = 'block'">
                            Commenter
                        </button>


                        <!-- ** Bouton modifier=> mène à la page modification **-->

                        {{-- @can('update', $post) --}}
                        <a href="{{ route('posts.edit', $post) }}">
                            <button class="style_button btn btn-primary  rounded-pill m-1">modifier</button>
                        </a>
                        {{-- @endcan --}}


                        <!-- ** Bouton supprimer  post -> edit -> (comme le user)**-->
                        {{-- @can('delete', $post) --}}

                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @method ("delete") @csrf
                            <button type="submit"
                                class="style_button btn btn-primary  rounded-pill  m-1">Supprimer</button>
                        </form>
                        {{-- @endcan --}}
                    </div>
                </div>



                @foreach ($post->comments as $comment)
                <div class="commentaire_user card w-50 mx-auto mb-2">
                    {{-- @can('update', $comment)
                    @endcan --}}
                    
                    <div class="all_avatar m-2">
                        <p>Posté par {{ $comment->user->pseudo }}</p>
                        <img class="avatar rounded-circle" src="{{ asset('images/' . $comment->user->image) }}" alt="imagePost">
                    </div>
                    
                    <div class="card-body">
                        <img class="image_publie w-100" src="{{ asset('images/' . $comment->image) }}" alt="plantes">
                        <p class="card-text">{{ $comment->content }}</p>
                        <p class="card-text">{{ $comment->tags }}</p>
                    </div>
            
                    <!-- Formulaire de création de réponse au commentaire -->
                    <form method="POST" action="{{ route('comment.replies.store', $comment->id) }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" placeholder="Répondre au commentaire"></textarea>
                        <button type="submit">Répondre</button>
                    </form>
            
                    <!-- Liste des réponses au commentaire -->

                        @if ($comment->replies)
                        <ul class="replies-list">
                            @foreach ($comment->replies as $reply)
                                <li>{{ $reply->content }}</li>
                            @endforeach
                        </ul>
                    @endif
                        
                    </ul>
                </div>
            @endforeach
{{--             
                <!-- Section des commentaires -->

                    <!-- Formulaire de création de commentaire -->
                    <form method="POST" action="{{ route('comments.store') }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" placeholder="Ajouter un commentaire"></textarea>
                        <button type="submit">Publier</button>
                    </form>

                    <!-- Liste des commentaires -->
                    <ul class="comment-list">
                        @foreach ($post->comments as $comment)
                            <li>{{ $comment->content }}</li>
                        @endforeach
                    </ul>
                </div> --}}


            </div>
        @endforeach

        {{ $posts->links() }}

    </section>
@endsection
