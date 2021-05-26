
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