@extends ('layouts.app')

@section('title')
    Rhizome - Modifier mes informations
@endsection

@section('content')
    <main class="container">

        <h1 class="pt-4">Modifier mes informations</h1>

        <div class="row p-5">

            <form class="formulaire col-4 mx-auto text-center" action="{{ route('users.update', $user) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group pt-5 pb-5">
                    <label for="pseudo" class="text-white">Nouveau message</label>
                    <input required type="text" class="form-control" name="content" value="{{ $user->content }}"
                        id="content">
                </div>

                <div class="form-group pb-5">
                    {{-- uploade image --}}
                    <label for="pseudo" class="text-white">Uploade ton image ici</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="image"
                        value="{{ $user->image }}" id="image">
                </div>

                <button type="submit" class="btn btn-primary mb-5">Valider</button>
            </form>
            <form action="{{ route('users.destroy', $user) }}" method="post">
                @csrf
                @method('delete')
            </form>
        </div>
    </main>
@endsection