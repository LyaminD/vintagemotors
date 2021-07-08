@extends('layouts.app')

@section('content')

<body>
<div class="text-center"> <a href="{{ route('adminarticle') }}" class="lgbtn green">Gestion des articles</a> 
 <a href="{{ route('adminpromo') }}" class="lgbtn green">Gestion des promotions</a> 
 <a href="{{ route('admingammes') }}" class="lgbtn green">Gestion des gammes</a> 
 <a href="{{ route('adminclient') }}" class="lgbtn green">Gestion des clients</a> </div>
</body>
@endsection