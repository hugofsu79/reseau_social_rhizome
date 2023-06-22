@extends('home.app')

@section('content')
    <div class="card-body">
        <div class="container">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="text-center">
                    <input type="text" name="content" placeholder="De quelle plante veux-tu parler ?">
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit">Partager</button>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="photo">&#128190; Uploade ton image ici (max 2 Mo)</label>
                        </div>
                        <div class="col-md-4">
                            <input type="file" name="photo" id="photo" style="display: none;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="hashtags" placeholder="Ajoutez des hashtags">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success rounded-pill"
                                onclick="document.getElementById('photo').click();">Parcourir</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>

@endsection
