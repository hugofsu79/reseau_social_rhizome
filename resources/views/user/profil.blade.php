@extends ('layouts.app')

@section('title')
    Profil de {{ $user->pseudo }}
@endsection

@section('content')
    <div class="container mb-3 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="container-fluid p-3">
                    <div class="carte_identité container">
                        <div class="row">
                            <!--image-->
                            <div class="col ">
                                @if ($user->image)
                                    <img src="{{ asset("images/$user->image") }} " class="photo_profil m-1 rounded-5"
                                        style="width: 20vw; height:20vw" alt="imageUtilisateur">
                                @else
                                    <img src="{{ asset('images/default_user.jpg') }} " class="m-1 rounded-circle"
                                        style="width: 20vw; height:20vw" alt="imageUtilisateur">
                                @endif
                            </div>
                            <div class="col">
                                <div class="nom_profil col pt-3 text">Bienvenue sur le profil de <h1 class="administrateur font-weight-bold">
                                        {{ $user->pseudo }}</h1>
                                </div>
                                <div class="col">
                                    inscrit(e) le {{ date('d-m-Y à H:i:s', strtotime($user->created_at)) }}
                                </div>
                                {{ count($user->Posts) }} post(s) posté(s)
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***********************************AFFICHER LES POSTS*****************************-->

                @foreach ($user->posts as $post)
                    <div class="card mb-4 mt-5 pb-2 rounded-5 text-center">
                        <div class="card-header rounded-top-5">
                            <div class="row">
                                <div class="col">
                                    @if ($user->image)
                                        <img class="m-1 rounded-circle" style="width: 5vw; height:5vw"
                                            src="{{ asset("images/$user->image") }}" alt="imageUtilisateur">
                                    @else
                                        <img class="m-1 rounded-circle" style="width: 5vw; height:5vw"
                                            src="{{ asset('images/default_user.jpg') }}" alt="imageUtilisateur">
                                    @endif
                                    <h5><a href="{{ route('users.show', $post->user_id) }}">
                                            <strong>{{ $user->pseudo }}</strong>
                                        </a>
                                    </h5>
                                </div>
                                <div class="col m-auto">
                                    <h4>#{{ $post->tags }} </h4>
                                </div>
                                <div class="col m-auto">
                                    <div class="row">posté {{ $post->created_at->diffForHumans() }}</div>
                                    @if ($post->created_at != $post->updated_at)
                                        <div class="row">modifié {{ $post->updated_at->diffForHumans() }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if ($post->image !== null)
                            <div class="card-img p-3">
                                <img class="m-1 rounded-3" style="width: 45vw" src="{{ asset("images/$post->image") }}"
                                    alt="imagePost">
                            </div>
                        @endif
                        <div class="card-body ml-5 mr-5">
                            <p>{{ $post->content }}</p>



                            <!--  ******************************OPTIONS : MASQUER, COMMENTER, MODIFIER, SUPPRIMER******************   -->
                            <div class="row mt-2">
                                <div class="col"><a class="recherche_buttom btn-success btn rounded-pill"
                                        onclick="document.getElementById('formulairecommentaire{{ $post->id }}').style.display = 'block'">Commenter
                                    </a>
                                </div>
                                <!-- si l'utilisateur connecté a posté le post, il peut le modifier et le supprimer-->
                                @if ($post->user_id == Auth::user()->id)
                                    <div class="col">
                                        <a href="{{ route('posts.edit', $post) }}">
                                            <button class="btn btn-secondary">Modifier</button>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger rounded-pill">Supprimer</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- **********************************************AJOUTER UN COMMENTAIRE**********************************************-->
                    <form style="display:none;" id="formulairecommentaire{{ $post->id }}" class="col-12 mx-auto mb-2"
                        action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="content">Tapez votre message</label>
                            <textarea required class="container-fluid" type="text" name="content" id="content"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4 form-group">
                                <label for="nom">image (facultatif)</label>
                                <input type="text" class="form-control" name="image" id="image">
                            </div>
                            <input class="form-control" type="hidden" id="post_id" name="post_id"
                                value="{{ $post->id }}">
                        </div>
                        <button class="btn btn-danger"
                            onclick="document.getElementById('formulairecommentaire{{ $post->id }}').style.display = 'none'">
                            Annuler
                        </button>
                        <button type="submit" class="btn btn-warning">Valider</button>
                    </form>


                    <!-- ********************************************* AFFICHER LES COMMENTAIRES **********************************************-->

                    @foreach ($post->comments as $comment)
                        <div class="container">
                            <div class="card mb-2 rounded-4">
                                <div class="card-header text-light rounded-top-4">
                                    <div class="row">
                                        <div class="col">{{ $comment->user->pseudo }}</div>
                                        <div class="col">posté le {{ $comment->created_at }}</div>
                                    </div>
                                </div>
                                <div class="card-body">{{ $comment->content }}
                                    @if ($post->user_id === Auth::id() || $comment->user_id === Auth::id())
                                        <!--            si l'utilisateur connecté est l'auteur du post ou du commentaire, il peut supprimer le commentaire -->
                                        <form action="{{ route('comments.destroy', $comment) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mt-3 rounted-pill">Supprimer</button>
                                        </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
