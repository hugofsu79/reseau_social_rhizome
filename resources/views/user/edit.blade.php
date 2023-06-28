@extends ('layouts.app')

@section('title')
    Rhizome - Modifier mes informations
@endsection

@section('content')
    <main class="container">

        <h1 class="pt-4">Modifier mes informations</h1>

        <div class="row">

            <form class="col-4 mx-auto" action="{{ route('users.update', $user) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="pseudo">Nouveau message</label>
                    <input required type="text" class="form-control" name="content" value="{{ $user->content }}"
                        id="content">
                </div>

                <div class="form-group">
                    {{-- uploade image --}}
                    <label for="pseudo">Uploade ton image ici</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="image"
                        value="{{ $user->image }}" id="image">
                </div>

                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
            <form action="{{ route('users.destroy', $user) }}" method="post">
                @csrf
                @method('delete')
            </form>
        </div>
    </main>
@endsection

@section('content')
    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-center">
                {{-- @if (Route::currentRouteName) == 'search'
                    <h1 class="m-5">Résultats de laa recherche</h1>
                @else --}}

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
