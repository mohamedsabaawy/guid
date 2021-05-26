@extends('layouts.hotel')
{{--@section('title','All Hotels')--}}

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-header">{{ Auth('hotel')->user()->name }}</div>
                    <div class="card-body">
                        <table class="table table-active table-responsive">
                            <tr>
                                <td>#</td>
                                <td>room number</td>
                                <td>client name</td>
                                <td>start at</td>
                                <td>end at</td>
                                <td>status</td>
                                <td>number of days</td>
                                <td>price</td>
                                <td>actions</td>
                            </tr>
                            @foreach(auth('hotel')->user()->Rooms as $items)
                                @php
                                    $clients = $items->clients;
                                @endphp
                                @foreach($clients as $client)
                                    @if($client->pivot->status == 0)
                                        @php
                                            $status = 'waiting';
                                            if ($client->pivot->status == 1){
                                                $status ='accepted';
                                            }elseif ($client->pivot->status == 2){
                                                $status = 'rejected';
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{$loop->index}}</td>
                                            <td>{{$items->name}}</td>
                                            <td>{{$client->name}}</td>
                                            <td>{{$client->pivot->start_at}}</td>
                                            <td>{{$client->pivot->end_at}}</td>
                                            <td>{{$status}}</td>
                                            <td>{{(strtotime($client->pivot->end_at) - strtotime($client->pivot->start_at)) / 86400}}</td>
                                            <td>{{$client->pivot->price}}</td>
                                            {{--                                        {{$client}}--}}
                                            <td>
                                                @if($client->pivot->status == 0)
                                                    <a href="{{route('hotel.reserve.accept',$client->pivot->id)}}"
                                                       class="btn btn-info">Accept</a>
                                                    <a href="{{route('hotel.reserve.reject',$client->pivot->id)}}"
                                                       class="btn btn-primary m-2">reject</a>
                                                @elseif($client->pivot->status == 1)
                                                    <a href="{{route('hotel.reserve.reject',$client->pivot->id)}}"
                                                       class="btn btn-primary m-2">reject</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
