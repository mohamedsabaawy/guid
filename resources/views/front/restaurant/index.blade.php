@extends('layouts.front')
@section('title' , 'Restaurants')
@section('content')
    <section class="gallery">
        <div class="container">

            <ol class="image-list grid-view">
                @if($restaurants)
                    @foreach($restaurants as $restaurant)
                        <li>
                            <figure>
                                <a href="{{route('front.restaurant.show',$restaurant->id)}}"><img src="{{asset(STORAGE.$restaurant->cover)}}" alt=""></a>
                                <figcaption>
                                    <a href="{{route('front.restaurant.show',$restaurant->id)}}"><p>{{$restaurant->name}}</p></a>
                                    <p>{{strlen($restaurant->details) > 50 ? substr($restaurant->details,0,50).'........' : $restaurant->details}}</p>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                @else
                    <h1>no restaurant</h1>
                @endif
            </ol>
        </div>
    </section>
@stop
