@extends('layouts.app')

@section('content')
<h3 class="text-center mt-3">Bonjour {{$user->prenom}}, modifie ici tes informations !</h3>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifiez vos informations') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateaccount') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{$user->nom}}" required autocomplete="nom" autofocus>
                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>
                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{$user->prenom}}" required autocomplete="prenom" autofocus>
                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<h3 class="text-center mt-3">Modifie tes adresses de livraison !</h3>
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
        <form method="POST" action="{{ route('adresse.edit') }}">
        @csrf
            <div class="card justify-content-center">
                <div class="card-header">{{ __('Adresse de livraison') }}</div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">Adresse</label>
                    <input name="adresse" value="" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St\">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Ville</label>
                    <input name="ville" type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Code Postal</label>
                    <input name="code_postal" type="text" class="form-control">
                </div>
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection