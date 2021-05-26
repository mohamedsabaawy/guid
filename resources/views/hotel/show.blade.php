@extends('layouts.hotel')
@section('title',auth('hotel')->user()->name)

@section('content')
<div class="container">

{{--    <div class="mb-2">--}}
{{--        <a class="btn btn-outline-primary"  href="{{route('hotel.create')}}">Add new Hotel</a>--}}
{{--    </div>--}}
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
{{--                    @if(count($hotels) > 0 )--}}
                        <div style="position: relative; height: 100%; width: 100%;">
                            <div class="">
                                {{$hotel->details}}
                            </div>
                            <div class="col-sm">
                                <img src="{{asset(STORAGE.$hotel->cover)}}">
                            </div>
                        </div>
{{--                    @endif--}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
