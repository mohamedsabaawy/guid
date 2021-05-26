@extends('layouts.hotel')
{{--@section('title','All Hotels')--}}

@section('content')
    <div class="container">

        <div class="col-sm card">
            <form class="form-group" action="{{route('room.update',$room->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-group"> Room Number</label>
                    <input type='number' name="name" class="form-control" value="{{$room->name}}">
                </div>

                <div class="form-group">
                    <label class="form-group"> Room Type</label>
                    <select class="form-control" name="type_id">
                        <option></option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}" {{$type->id == $room->type_id ? 'selected' :''}}>{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary form-control">update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
