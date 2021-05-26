@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Edit hotel</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('hotel.update',$hotel->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Hotel Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="inputEmail3" value="{{$hotel->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Hotel Email</label>
                                <div class="col-sm-10">
                                    <input name="email" type="email" class="form-control" id="inputEmail3" value="{{$hotel->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Hotel Password</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control" id="inputEmail3" placeholder="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">City Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="city_id">
                                        <option>select city</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}" {{$hotel->City->id == $city->id ?'selected' : ''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}" name="user_id">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary form-control">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
