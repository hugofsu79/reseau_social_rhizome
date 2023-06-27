@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">

        <h1>Mon compte</h1>

        <h3 class="pb-3">Modifier mon poste</h3>
        <div class="row">

            <form class="col-4 mx-auto" action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="pseudo">Nouveau texte</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="comment"
                        value="{{ $user->comment }}" id="comment">
                </div>

                <div class="form-group">
                    <label for="pseudo">Nouveau image</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="image"
                        value="{{ $user->image }}" id="image">
                </div>

                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
            <form action="{{ route('users.destroy', $user) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">supprimer le compte</button>
            </form>
        </div>
    </main>
@endsection
