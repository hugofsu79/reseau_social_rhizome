@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="register_formulaire card">
                    <h3 class="card-header text-white">{{ __('Register') }}</h3>

                    <div class="ccard-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mt-3 mb-3">
                                <label for="pseudo" class="col-md-4 col-form-label text-md-end">{{ __('pseudo') }}</label>

                                <div class="col-md-6">
                                    <input id="pseudo" type="text"
                                        class="form-control @error('pseudo') is-invalid @enderror" name="pseudo"
                                        value="{{ old('pseudo') }}" required autocomplete="pseudo" autofocus>

                                    @error('pseudo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="image"
                                        class="bouton_ajout_image form-control rounded-pill">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">e-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">mot de passe</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">confirmez le mot
                                    de passe</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="submit btn btn-success mb-2 rounded-pill">
                                        Valider
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
