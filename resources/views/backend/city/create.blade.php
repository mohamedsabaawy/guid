@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add new city</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('city.store')}}" method="post">
                        @csrf
                        <div class="card-body ">
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">City Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="Name" value="{{old('name')}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">

                            @if(count($countries)>0)
                                <div class="form-group row">
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Country Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control @error('country_id') is-invalid @enderror" name="country_id">
                                            @foreach($countries as $country)
                                                <option class="form-control-file" value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary form-control">Add</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
