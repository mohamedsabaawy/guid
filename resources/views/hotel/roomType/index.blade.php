@extends('layouts.hotel')
@section('title',(auth('hotel')->user()->restaurant == null ? 'Room types' : 'Table types'))

@section('content')
    <div class="container">
<a class="btn btn-primary" href="{{route('type.create')}}"> add new {{auth('hotel')->user()->restaurant == null ? 'room' : 'table'}} type</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-header">{{ Auth('hotel')->user()->name }} rooms types</div>

                    <div class="card-body">
                        {{--                    @if(count($hotels) > 0 )--}}
                        <div style="position: relative; height: 100%; width: 100%;">
                            <div class="">

                            </div>
                            <div class="row">
                                @foreach($types as $type)
                                    <div class="card card-header m-2 {{$type->client_id ? 'border border-danger' :''}}">
                                        <p>{{$type->name}}</p>
                                        <p>price : {{$type->price}}</p>
                                        <p class="{{$type->client_id ? 'badge badge-danger' : ''}}">{{$type->client_id ? 'reserved' : ''}}</p>
                                        <a href="{{route('type.edit',$type->id)}}" class="btn btn-outline-warning m-auto"><i class="fa fa-edit"></i></a>
                                        <form class="m-auto" method="post" action="{{route('type.destroy',$type->id)}}">
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
