@extends('layouts.front')
@section('title' , $hotel->name)
@section('content')
    <section class="gallery">
        <div class="container">
            @if (session('status'))
                <div style="color: white">
                    <h1>{{ session('status') }}</h1>
                </div>
            @endif
            <div class="hotel-info">
                <img id="pic" src="{{asset(STORAGE.$hotel->cover)}}">
                <h2 style="color:white">{{$hotel->name}}</h2>
                <p style="color:white">{{$hotel->details}}</p>


                <div class="img-scroll">

                    @foreach($hotel->Photos as $photo)
                        <img src="{{asset(STORAGE.$photo->name)}}">
                    @endforeach


                </div>

                @auth('client')
                    <div>
                        <form action="{{route('room1')}}" method="post" style="color: white">
                            @csrf
                            <label>start day</label><br>
                            <input type="date" name="start_at"><br>

                            <label>end day</label><br>
                            <input type="date" name="end_at"><br>

{{--                            <label>number of days</label>--}}
{{--                            <input type="number" name="days">--}}

                            <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                            <label>chose room type</label><br>
                            <select name="type_id">
                                <option>select</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="send">
                        </form>
                    </div>
                @else
                    <h3 style="color: white">please login to reserve room</h3>
                @endauth


            </div>
        </div>
    </section>
@stop
