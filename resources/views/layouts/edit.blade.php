@extends ('layouts.app')

@section('title')
    Rhizome - Modifier mon commentaire
@endsection

@section('content')
    <main class="container">

        <h1 class="pb-5">Modifier mon commentaire</h1>

        
        <div class="row">

            <form class="col-4 mx-auto" action="{{ route('comment.update', $post) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="content">Nouveau texte</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="content"
                        value="{{ $post->content }}" id="content">
                </div>

                <div class="form-group">
                    <label for="image">nouvelle image</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="image"
                        value="{{ $post->image }}" id="image">
                </div>

                <div class="form-group">
                    <label for="tags">Tags</label>
                    <input required type="text" class="form-control" placeholder="#calamondin" name="tags"
                        value="{{ $post->tags }}" id="tags">
                </div>

                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </main>
@endsection