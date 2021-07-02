@extends('layouts.app')

@section('content')

<h3>Découvrez toutes nos promos !</h3>
@foreach ($promotions as $promotion)
<h3>{{$promotion->nom}}</h3>
<div class="container mydiv bg-white">
    <h1>Du {{$promotion->date_debut}} au {{$promotion->date_fin}}</h1>
    <div class="row">

        @foreach ($promotion->articles as $article)

        <div class="col-md-4">
            <!-- bbb_deals -->
            <div class="bbb_deals">
                <div class="ribbon ribbon-top-right"><span>- {{$promotion->reduction}} %</span></div>
                <div class="bbb_deals_title">{{$promotion->nom}}</div>
                <div class="bbb_deals_slider_container">
                    <div class=" bbb_deals_item">
                        <div class="bbb_deals_image"><img src="{{ asset("images/$article->image") }}" alt="MotoEnPromo"></div>
                        <div class="bbb_deals_content">
                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                <div class="bbb_deals_item_category"><a href="#">Moto</a></div>
                                <div class="bbb_deals_item_price_a ml-auto"><strike>{{$article->prix}} Euros</strike></div>
                            </div>
                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                <div class="bbb_deals_item_name">{{$article->nom}}</div>
                                <div class="bbb_deals_item_price ml-auto">{{$article->prix - ($article->prix *$promotion->reduction / 100)}} Euros !!!</div>
                            </div>
                            <div class="available">
                                <div class="available_line d-flex flex-row justify-content-start">
                                    <div class="available_title">Stock: <span>{{$article->stock}}</span></div>
                                </div>
                                <div class="available_bar"><span style="width:17%"></span></div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm">Achetez</button>
                            <button type="button" class="btn btn-secondary btn-sm">Plus de détails</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>
</div>
@endsection