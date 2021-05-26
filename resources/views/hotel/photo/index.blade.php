@extends('layouts.hotel')
@section('title',"Photo")

@section('content')
    <div class="container">

            <div class="col-sm card">
                <form class="form-group" action="{{route('photo.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-group">Upload Photos</label>
                        <input type="file" name="photos[]" multiple class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary form-control">Upload</button>
                    </div>
                </form>
            </div>
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

                            </div>
                            <div class="row m-auto">
                                @foreach($photos as $photo)
                                    <div class="card card-header m-2 p-1">
                                        <img class="mb-1" width="150px"  src="{{asset(STORAGE.$photo->name)}}">
                                        <form class="m-auto" method="post" action="{{route('photo.destroy',$photo->id)}}">
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
