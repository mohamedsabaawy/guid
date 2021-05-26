@extends('layouts.app')
@section('title','All Hotels')
@section('content')
<div class="container">

    <div class="mb-2">
        <a class="btn btn-outline-primary"  href="{{route('restaurant.create')}}">Add new Restaurant</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Hotels</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($restaurants) > 0 )
                        <div style="position: relative; height: 100%; width: 100%;">
                            <div class="">
                                <table class="table table-bordered table-hover">
                                    <tr class="j">
                                        <th class="" style="width: 10px;">#</th>
                                        <th class="" style="width: 5px;">Name</th>
                                        <th class="" style="width: 5px;">City Name</th>
                                        <th class="" style="width: 5px;">Email</th>
                                        <th class="" style="width: 5px;">Action</th>
                                    </tr>
                                    @foreach( $restaurants as $restaurant)
                                    <tr class="jsgrid-filter-row">
                                            <td class="" style="">{{$loop->index}}</td>
                                            <td class="" style="">{{$restaurant->name}}</td>
                                            <td class="" style="">{{$restaurant->City->name}}</td>
                                            <td class="" style="">{{$restaurant->email}}</td>
                                            <td class="" style="">
                                                <form action="{{route('restaurant.destroy',$restaurant->id)}}" method="post" class="float-right  ml-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"> <i class="fa fa-trash"></i>delete</button>
                                                </form>
                                                <a class="btn btn-warning float-right ml-2" href="{{route('restaurant.edit',$restaurant->id)}}"><i class="fa fa-edit "> Edit</i></a>

                                            </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
