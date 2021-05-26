@extends('layouts.hotel')
@section('title',(auth('hotel')->user()->restaurant == null ? 'Rooms' : 'Tables'))

@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('room.create')}}">add new {{auth('hotel')->user()->restaurant == null ? 'room' : 'table'}}</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-header">{{ Auth('hotel')->user()->name }} {{auth('hotel')->user()->restaurant == null ? 'Rooms' : 'Tables'}}</div>

                    <div class="card-body">
                        {{--                    @if(count($hotels) > 0 )--}}
                        <div style="position: relative; height: 100%; width: 100%;">
                            <div class="">

                            </div>
                            <div class="row">
                                @foreach($rooms as $room)
                                    <div class="card card-header m-2 {{$room->client_id ? 'border border-danger' :''}}">
                                        <a class="btn" href="{{route('room.show',$room->id)}}"><p>{{$room->name}}</p></a>
                                        <p class="badge badge-secondary">{{$room->RoomType->name}}</p>
                                        <p class="{{$room->client_id ? 'badge badge-danger' : ''}}">{{$room->client_id ? 'reserved' : ''}}</p>
                                        <a href="{{route('room.edit',$room->id)}}" class="btn btn-outline-warning m-auto"><i class="fa fa-edit"></i></a>
                                        <form class="m-auto" method="post" action="{{route('room.destroy',$room->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-dark"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--                    @endif--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
