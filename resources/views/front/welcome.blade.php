@extends('layouts.front')
@section('content')
<div class="text">
    <h1>Cairo</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
        laborum.</p>
</div>

<div class="weather">
    <div class="location">
        <h1 class="location-timezone">Current Weather</h1>

    </div>
    <div class="temperature">
        <div class="degree-section">
            <h2 class="temperature-degree">0</h2>
            <span>C</span>
        </div>
        <div class="temperature-description">Unavailable</div>
    </div>
</div>
@stop
@push('script')
    <script>
        window.addEventListener("load",()=>{
            let long;
            let lat;
            let temperatureDescription = document.querySelector(".temperature-description");
            let temperatureDegree = document.querySelector(".temperature-degree");



            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(position => {
                    long = position.coords.longitude;
                    lat = position.coords.latitude;

                    const api = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${long}&appid=d4cba2c6ed8c20a3211d35c25c970d95`

                    fetch(api)
                        .then(response =>{
                            return response.json();
                        })
                        .then(data =>{
                            console.log(data);
                            const temp = data.main.temp;
                            const description = data.weather[0].description;

                            temperatureDegree.textContent = Math.round(temp - 273.15);
                            temperatureDescription.textContent = description;

                        });
                });


            };
        });
    </script>
@endpush
