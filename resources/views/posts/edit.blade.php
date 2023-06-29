@extends ('layouts.app')

@section('title')
    Rhizome - Modifier mon poste
@endsection

@section('content')
    <main class="container p-5">

        <h1 class="mb-5 pt-5">Modifier mon poste</h1>
        <div class="row text-center">

            <form class="formulaire col-4 mx-auto" action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group p-4">
                    <label for="content" class="text-white">Nouveau texte</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="content"
                        value="{{ $post->content }}" id="content">
                </div>

                <div class="form-group p-4">
                    <label for="image"class="text-white">nouvelle image</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="image"
                        value="{{ $post->image }}" id="image">
                </div>

                <div class="form-group p-4">
                    <label for="tags"class="text-white">Tags</label>
                    <input required type="text" class="form-control" placeholder="#calamondin" name="tags"
                        value="{{ $post->tags }}" id="tags">
                </div>

                <button type="submit" class="btn btn-primary m-4">Valider</button>
            </form>
        </div>
    </main>
@endsection
