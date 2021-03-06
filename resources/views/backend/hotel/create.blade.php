@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">Add new hotel</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        {!! Form::model($hotel,[
                            'route' => 'hotel.store',
                            'method' => 'POST'
                        ]) !!}
                        <div class="form-group row">
                            {!! Form::label('name', 'Hotel Name', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name' ,null,['class' => 'form-control ' .($errors->has('name') ? 'is-invalid' : null) , 'placeholder' =>'Enter Hotel Name' ]) !!}

                                @error('name')
                                <span class="invalid-feedback " style="display: block;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>
                        <div class="form-group row">
                            {!! Form::label('email', 'Hotel Email', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::email('email' ,null,['class' => 'form-control ' .($errors->has('email') ? 'is-invalid' : null), 'placeholder' =>'Enter Hotel Email' ]) !!}

                                @error('email')
                                <span class="invalid-feedback " style="display: block;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{--                            <span class="invalid-feedback">{{$errors->has('email')? 'is-invalid':''}}</span>--}}
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password', 'Hotel Password', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::password('password',['class' => 'form-control '  .($errors->has('password') ? 'is-invalid' : null), 'placeholder' =>'Enter Hotel Password' ]) !!}
                            </div>
                        </div>
                        <div class="form-group row ">
                            {!! Form::label('Countries', 'Country', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('country_id',$countries,null,[
                                    'class' => 'form-control ' .($errors->has('city_id') ? 'is-invalid' : null) ,
                                    'id'=>'country',
                                    'placeholder' => 'choice country'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row ">
                            {!! Form::label('cities', 'City', ['class' => 'col-sm-2 col-form-label', 'placeholder' => 'City']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('city_id',[],null,[
                                'class' => 'form-control ' .($errors->has('city_id') ? 'is-invalid' : null),
                                'placeholder' => 'choice city',
                                'id' => 'cities'
                                ]) !!}
                            </div>
                        </div>
                        {!! Form::submit('Add',['class' => 'btn btn-primary form-control' ,]) !!}
                        {!! Form::close() !!}
                    </div>
                    {{--                    <form action="{{route('hotel.store')}}" method="post">--}}
                    {{--                        @csrf--}}
                    {{--                        <div class="card-body">--}}
                    {{--                            <div class="form-group row">--}}
                    {{--                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Hotel Name</label>--}}
                    {{--                                <div class="col-sm-10">--}}
                    {{--                                    <input name="name" type="text"--}}
                    {{--                                           class="form-control @error('name') is-invalid @enderror" id="inputEmail3"--}}
                    {{--                                           placeholder="Name" value="{{old('name')}}">--}}
                    {{--                                    @error('name')--}}
                    {{--                                    <span class="invalid-feedback" role="alert">--}}
                    {{--                                        <strong>{{ $message }}</strong>--}}
                    {{--                                    </span>--}}
                    {{--                                    @enderror--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="form-group row">--}}
                    {{--                                <label for="inputEmail3" class="col-sm-2 col-form-label">Hotel Email</label>--}}
                    {{--                                <div class="col-sm-10">--}}
                    {{--                                    <input name="email" type="email"--}}
                    {{--                                           class="form-control @error('email') is-invalid @enderror" id="inputEmail3"--}}
                    {{--                                           placeholder="Email" value="{{old('email')}}">--}}
                    {{--                                    @error('email')--}}
                    {{--                                    <span class="invalid-feedback" role="alert">--}}
                    {{--                                        <strong>{{ $message }}</strong>--}}
                    {{--                                    </span>--}}
                    {{--                                    @enderror--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="form-group row">--}}
                    {{--                                <label for="inputEmail3" class="col-sm-2 col-form-label">Hotel Password</label>--}}
                    {{--                                <div class="col-sm-10">--}}
                    {{--                                    <input name="password" type="password"--}}
                    {{--                                           class="form-control @error('password') is-invalid @enderror" id="inputEmail3"--}}
                    {{--                                           placeholder="password" value="{{old('password')}}">--}}
                    {{--                                    @error('password')--}}
                    {{--                                    <span class="invalid-feedback" role="alert">--}}
                    {{--                                        <strong>{{ $message }}</strong>--}}
                    {{--                                    </span>--}}
                    {{--                                    @enderror--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">--}}

                    {{--                            @if(count($cities)>0)--}}
                    {{--                                <div class="form-group row">--}}
                    {{--                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">City Name</label>--}}
                    {{--                                    <div class="col-sm-10">--}}
                    {{--                                        <select class="form-control" name="city_id">--}}
                    {{--                                            <option>select city</option>--}}
                    {{--                                            @foreach($cities as $city)--}}
                    {{--                                                <option class="" value="{{$city->id}}">{{$city->name}}</option>--}}
                    {{--                                            @endforeach--}}
                    {{--                                        </select>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            @endif--}}

                    {{--                            <div id="map" style="width:1000px; height: 400px;"></div>--}}
                    {{--                            <div class="card-footer">--}}
                    {{--                                <button type="submit" class="btn btn-primary form-control">Add</button>--}}
                    {{--                            </div>--}}
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $('#country').change(function (e) {
            e.preventDefault();
            var country_id = $('#country').val();
            if(country_id){
                $.ajax({
                    url: '{{url('api/v1/city?country_id=')}}' + country_id,
                    type:'post',
                    success:function (data) {
                        if (data.status == 1){

                            $('#cities').empty();
                            $('#cities').append('<option>choice city</option>');
                            $.each(data.data,function (index, city) {
                                $('#cities').append('<option value="'+city.id+'">'+city.name+'</option>')
                            })
                        }
                    },
                })
            }else{
                $('#cities').empty();
                $('#cities').append('<option>choice city</option>');
            }
        });
    </script>

{{--    <script>--}}
{{--        $("#pac-input").focusin(function () {--}}
{{--            $(this).val('');--}}
{{--        });--}}
{{--        $('#latitude').val('');--}}
{{--        $('#longitude').val('');--}}
{{--        // This example adds a search box to a map, using the Google Place Autocomplete--}}
{{--        // feature. People can enter geographical searches. The search box will return a--}}
{{--        // pick list containing a mix of places and predicted search terms.--}}
{{--        // This example requires the Places library. Include the libraries=places--}}
{{--        // parameter when you first load the API. For example:--}}
{{--        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">--}}
{{--        function initAutocomplete() {--}}
{{--            var map = new google.maps.Map(document.getElementById('map'), {--}}
{{--                center: {lat: 24.740691, lng: 46.6528521},--}}
{{--                zoom: 13,--}}
{{--                mapTypeId: 'roadmap'--}}
{{--            });--}}
{{--            // move pin and current location--}}
{{--            infoWindow = new google.maps.InfoWindow;--}}
{{--            geocoder = new google.maps.Geocoder();--}}
{{--            if (navigator.geolocation) {--}}
{{--                navigator.geolocation.getCurrentPosition(function (position) {--}}
{{--                    var pos = {--}}
{{--                        lat: position.coords.latitude,--}}
{{--                        lng: position.coords.longitude--}}
{{--                    };--}}
{{--                    map.setCenter(pos);--}}
{{--                    var marker = new google.maps.Marker({--}}
{{--                        position: new google.maps.LatLng(pos),--}}
{{--                        map: map,--}}
{{--                        title: '?????????? ????????????'--}}
{{--                    });--}}
{{--                    markers.push(marker);--}}
{{--                    marker.addListener('click', function () {--}}
{{--                        geocodeLatLng(geocoder, map, infoWindow, marker);--}}
{{--                    });--}}
{{--                    // to get current position address on load--}}
{{--                    google.maps.event.trigger(marker, 'click');--}}
{{--                }, function () {--}}
{{--                    handleLocationError(true, infoWindow, map.getCenter());--}}
{{--                });--}}
{{--            } else {--}}
{{--                // Browser doesn't support Geolocation--}}
{{--                console.log('dsdsdsdsddsd');--}}
{{--                handleLocationError(false, infoWindow, map.getCenter());--}}
{{--            }--}}
{{--            var geocoder = new google.maps.Geocoder();--}}
{{--            google.maps.event.addListener(map, 'click', function (event) {--}}
{{--                SelectedLatLng = event.latLng;--}}
{{--                geocoder.geocode({--}}
{{--                    'latLng': event.latLng--}}
{{--                }, function (results, status) {--}}
{{--                    if (status == google.maps.GeocoderStatus.OK) {--}}
{{--                        if (results[0]) {--}}
{{--                            deleteMarkers();--}}
{{--                            addMarkerRunTime(event.latLng);--}}
{{--                            SelectedLocation = results[0].formatted_address;--}}
{{--                            console.log(results[0].formatted_address);--}}
{{--                            splitLatLng(String(event.latLng));--}}
{{--                            $("#pac-input").val(results[0].formatted_address);--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {--}}
{{--                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};--}}
{{--                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/--}}
{{--                $('#latitude').val(markerCurrent.position.lat());--}}
{{--                $('#longitude').val(markerCurrent.position.lng());--}}
{{--                geocoder.geocode({'location': latlng}, function (results, status) {--}}
{{--                    if (status === 'OK') {--}}
{{--                        if (results[0]) {--}}
{{--                            map.setZoom(8);--}}
{{--                            var marker = new google.maps.Marker({--}}
{{--                                position: latlng,--}}
{{--                                map: map--}}
{{--                            });--}}
{{--                            markers.push(marker);--}}
{{--                            infowindow.setContent(results[0].formatted_address);--}}
{{--                            SelectedLocation = results[0].formatted_address;--}}
{{--                            $("#pac-input").val(results[0].formatted_address);--}}
{{--                            infowindow.open(map, marker);--}}
{{--                        } else {--}}
{{--                            window.alert('No results found');--}}
{{--                        }--}}
{{--                    } else {--}}
{{--                        window.alert('Geocoder failed due to: ' + status);--}}
{{--                    }--}}
{{--                });--}}
{{--                SelectedLatLng = (markerCurrent.position.lat(), markerCurrent.position.lng());--}}
{{--            }--}}

{{--            function addMarkerRunTime(location) {--}}
{{--                var marker = new google.maps.Marker({--}}
{{--                    position: location,--}}
{{--                    map: map--}}
{{--                });--}}
{{--                markers.push(marker);--}}
{{--            }--}}

{{--            function setMapOnAll(map) {--}}
{{--                for (var i = 0; i < markers.length; i++) {--}}
{{--                    markers[i].setMap(map);--}}
{{--                }--}}
{{--            }--}}

{{--            function clearMarkers() {--}}
{{--                setMapOnAll(null);--}}
{{--            }--}}

{{--            function deleteMarkers() {--}}
{{--                clearMarkers();--}}
{{--                markers = [];--}}
{{--            }--}}

{{--            // Create the search box and link it to the UI element.--}}
{{--            var input = document.getElementById('pac-input');--}}
{{--            $("#pac-input").val("???????? ?????? ");--}}
{{--            var searchBox = new google.maps.places.SearchBox(input);--}}
{{--            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);--}}
{{--            // Bias the SearchBox results towards current map's viewport.--}}
{{--            map.addListener('bounds_changed', function () {--}}
{{--                searchBox.setBounds(map.getBounds());--}}
{{--            });--}}
{{--            var markers = [];--}}
{{--            // Listen for the event fired when the user selects a prediction and retrieve--}}
{{--            // more details for that place.--}}
{{--            searchBox.addListener('places_changed', function () {--}}
{{--                var places = searchBox.getPlaces();--}}
{{--                if (places.length == 0) {--}}
{{--                    return;--}}
{{--                }--}}
{{--                // Clear out the old markers.--}}
{{--                markers.forEach(function (marker) {--}}
{{--                    marker.setMap(null);--}}
{{--                });--}}
{{--                markers = [];--}}
{{--                // For each place, get the icon, name and location.--}}
{{--                var bounds = new google.maps.LatLngBounds();--}}
{{--                places.forEach(function (place) {--}}
{{--                    if (!place.geometry) {--}}
{{--                        console.log("Returned place contains no geometry");--}}
{{--                        return;--}}
{{--                    }--}}
{{--                    var icon = {--}}
{{--                        url: place.icon,--}}
{{--                        size: new google.maps.Size(100, 100),--}}
{{--                        origin: new google.maps.Point(0, 0),--}}
{{--                        anchor: new google.maps.Point(17, 34),--}}
{{--                        scaledSize: new google.maps.Size(25, 25)--}}
{{--                    };--}}
{{--                    // Create a marker for each place.--}}
{{--                    markers.push(new google.maps.Marker({--}}
{{--                        map: map,--}}
{{--                        icon: icon,--}}
{{--                        title: place.name,--}}
{{--                        position: place.geometry.location--}}
{{--                    }));--}}
{{--                    $('#latitude').val(place.geometry.location.lat());--}}
{{--                    $('#longitude').val(place.geometry.location.lng());--}}
{{--                    if (place.geometry.viewport) {--}}
{{--                        // Only geocodes have viewport.--}}
{{--                        bounds.union(place.geometry.viewport);--}}
{{--                    } else {--}}
{{--                        bounds.extend(place.geometry.location);--}}
{{--                    }--}}
{{--                });--}}
{{--                map.fitBounds(bounds);--}}
{{--            });--}}
{{--        }--}}

{{--        function handleLocationError(browserHasGeolocation, infoWindow, pos) {--}}
{{--            infoWindow.setPosition(pos);--}}
{{--            infoWindow.setContent(browserHasGeolocation ?--}}
{{--                'Error: The Geolocation service failed.' :--}}
{{--                'Error: Your browser doesn\'t support geolocation.');--}}
{{--            infoWindow.open(map);--}}
{{--        }--}}

{{--        function splitLatLng(latLng) {--}}
{{--            var newString = latLng.substring(0, latLng.length - 1);--}}
{{--            var newString2 = newString.substring(1);--}}
{{--            var trainindIdArray = newString2.split(',');--}}
{{--            var lat = trainindIdArray[0];--}}
{{--            var Lng = trainindIdArray[1];--}}
{{--            $("#latitude").val(lat);--}}
{{--            $("#longitude").val(Lng);--}}
{{--        }--}}
{{--    </script>--}}
{{--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHseH1hDol3zB8Lp0_CRpzgQ3kgnINDok&libraries=places&callback=initAutocomplete&language=ar&region=EG--}}
{{--             async defer"></script>--}}
@stop
