@extends('layouts.hotel')
@section('title',(auth('hotel')->user()->restaurant == null ? 'create room' : 'create table'))

@section('content')
    <div class="container">

        <div class="col-sm card">
            <form class="form-group" action="{{route('room.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="form-group"> {{auth('hotel')->user()->restaurant == null ? 'Room' : 'Table'}} Number</label>
                    <input type='number' name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-group"> {{auth('hotel')->user()->restaurant == null ? 'Room' : 'Table'}} Type</label>
                    <select class="form-control" name="type_id">
                        <option></option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary form-control">add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
