@extends ('layouts.app')

@section('title')
    Rhizome - Modifier mes informations
@endsection

@section('content')
    <main class="container mx-auto">

        <h1 class="pt-4">Modifier mes informations</h1>

        <div class="row pt-5 pb-5">

            <form class="formulaire col-4 mx-auto text-center" action="{{ route('users.update', $user) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group pt-5 pb-5">
                    <label for="pseudo" class="text-white">Nouveau message</label>
                    <input required type="text" class="form-control" name="content" value="{{ $user->content }}"
                        id="content">
                </div>

                <div class="col pb-5">
                    <input type="file" name="image" class="bouton_ajout_image form-control rounded-pill">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success  mb-5">Valider</button>
            </form>
            <form action="{{ route('users.destroy', $user) }}" method="post">
                @csrf
                @method('delete')
            </form>
        </div>
    </main>
@endsection
