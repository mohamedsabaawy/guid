@extends('layouts.front')
@section('title' , 'Hotels')
@section('content')
    <section class="gallery">
        <div class="container">

            <ol class="image-list grid-view">
                @if($hotels)
                    @foreach($hotels as $hotel)
                        <li>
                            <figure>
                                <a href="{{route('front.hotel.show',$hotel->id)}}"><img src="{{asset(STORAGE.$hotel->cover)}}" alt=""></a>
                                <figcaption>
                                    <a href="{{route('front.hotel.show',$hotel->id)}}"><p>{{$hotel->name}}</p></a>
                                    <p>{{strlen($hotel->details) > 50 ? substr($hotel->details,0,50).'........' : $hotel->details}}</p>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                @else
                    <h1>no hotel</h1>
                @endif
            </ol>
        </div>
    </section>
@stop
