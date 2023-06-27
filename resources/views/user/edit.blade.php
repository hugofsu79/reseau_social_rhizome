@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">

        <h1>Modifier mes informations</h1>

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
