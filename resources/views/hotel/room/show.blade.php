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

                    <div class="card-header">room number : {{$room->name}}</div>

                    <div class="card-body">
                        @if($last !== null)
                        <div class="card">
                            <div class="card-header">
                                <h2></h2>
                            </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                name
                                            </td>
                                            <td>
                                                {{$last->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                start at
                                            </td>
                                            <td>
                                                {{$last->pivot->start_at}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                end at
                                            </td>
                                            <td>
                                                {{$last->pivot->end_at}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                price
                                            </td>
                                            <td>
                                                {{$last->pivot->price}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                        </div>
                        @else
                            <div class="row justify-content-center">
                                <h3 class="">no data</h3>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
