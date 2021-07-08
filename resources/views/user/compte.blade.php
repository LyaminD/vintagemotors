@extends('layouts.app')

@section('content')
<h3 class="text-center mt-3">Enregistre tes adresses de livraison !</h3>
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
        
         @if(count($user->adresses) < 2) 
        
        <form method="POST" action="{{ route('adresse.create') }}">
        @csrf
            <div class="card justify-content-center">
                <div class="card-header">{{ __('Adresse de livraison') }}</div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">Adresse</label>
                    <input name="adresse" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St\">
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
            @endif
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection