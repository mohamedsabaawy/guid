@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Edit city</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('city.update',$city->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">City Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="inputEmail3" value="{{$city->name}}">
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">

                            @if(count($countries)>0)
                                <div class="form-group row">
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Country Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="country_id">
                                            <option>select country</option>
                                            @foreach($countries as $country)
                                                <option class="form-control-file" value="{{$country->id}}" {{$city->country->id == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary form-control">update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
