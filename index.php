<!DOCTYPE html>
<html>

<body>

    <div id="first">
        <h1>Weather Update</h1>
    </div>
    <br>
    <div>
        <button id="toggle">Fetch City Codes</button>
    </div>
    <div>
        <button id="toggle2">Fetch Weather Details</button>
    </div>
    <br>

    <div>
        <h3><u>City Name and CityCodes</u></h3>
    </div>
    <br>
    <div id="myData"></div>
    <br>

    <div>
        <h3><u>Weather Details</u></h3>
    </div>
    <br>
    <div id="status"></div>
    <br>
    <div id="container"></div>


    <script>
        const btn = document.getElementById("toggle");
        const btn2 = document.getElementById("toggle2");
        btn2.style.display = "none";

        const Cities = [];
        const CityCodes = [];

        // Fetch City Code (cities.json)
        btn.onclick = function() {

            fetch('cities.json')
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    appendData(data);
                })
                .catch(function(err) {
                    console.log('error: ' + err);
                });

            function appendData(data) {
                var mainContainer = document.getElementById("myData");
                for (var i = 0; i < data.List.length; i++) {
                    Cities.push(data.List[i]);
                    CityCodes.push(data.List[i].CityCode);
                }
                for (var i = 0; i < CityCodes.length; i++) {
                    var div = document.createElement("div");
                    div.innerHTML = Cities[i].CityName + ': ' + CityCodes[i];
                    // div.innerHTML = Cities[i].CityName + ': ' + Cities[i].CityCode;
                    mainContainer.appendChild(div);
                }
            }
            btn.style.display = "none";
            btn2.style.display = "block";
        };

        // Fetch API
        // btn2.onclick = function () {
        //     var result =[]
        //     for (var i = 0; i < CityCodes.length; i++){
        //         const apiKey = '076ac7ca46c11b522b3f0708c8a36f03';
        //         const cityId = CityCodes[i];
        //         var url = "https://api.openweathermap.org/data/2.5/weather?id=" + cityId + "&appid=" + apiKey + "&units=metric";
        //         fetch(url)
        //             .then(function (response) {
        //                 return response.json();
        //             })
        //             .then(function (data) {
        //                 appendData(data);
        //             })
        //             .catch(function (err) {
        //                 console.log('error: ' + err);
        //             });
        //         function appendData(data) {
        //             var mainContainer2 = document.getElementById("myData2");
        //             var div = document.createElement("div");
        //             const { main, name, id, weather } = data;
        //             var temp = [name, id, main.temp, weather[0].description];
        //             result.push(temp);

        //             var result_output = '<ul><li>Name: '+ name +'</li><li>Id: '+ id +'</li><li>Temp: '+ main.temp +'</li><li>Description: '+ weather[0].description + '</li></ul>';
        //             div.innerHTML = result_output;
        //             mainContainer2.appendChild(div);
        //         }
        //     }
        // };


        // Fetch API : Cache implemented
        var counter = 0;
        var currentDate = new Date();
        var timestamp = currentDate.getTime();
        var limit = 0;
        var result = [];

        btn2.onclick = function() {

            timestamp = (new Date()).getTime();
            clearContainer();

            if (counter == 0 || timestamp > limit) {

                document.getElementById("status").innerHTML = '';

                if (counter == 0) {
                    const initialTime = timestamp;
                    limit = initialTime + 1000 * 5;
                    appendStatus('Starting, Retrieving new data...');
                } else if (timestamp > limit) {
                    const initialTime = timestamp;
                    limit = initialTime + 1000 * 5;
                    appendStatus('Time Limit Exceeded - Retrieving new data again...');
                    counter = 0;
                }

                for (var i = 0; i < CityCodes.length; i++) {
                    const apiKey = '076ac7ca46c11b522b3f0708c8a36f03';
                    const cityId = CityCodes[i];
                    var url = "https://api.openweathermap.org/data/2.5/weather?id=" + cityId + "&appid=" + apiKey + "&units=metric";
                    fetch(url)
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(data) {
                            storeData(data);
                        })
                        .catch(function(err) {
                            console.log('error: ' + err);
                        });

                    function storeData(data) {
                        const {
                            main,
                            name,
                            id,
                            weather
                        } = data;
                        var tempData = [name, id, main.temp, weather[0].description];
                        // console.log(tempData);
                        result.push(tempData);

                        //Store these lists to single object/variable
                        diplayWeatherData(tempData);
                    }
                }


                counter += 1;
            } else if (timestamp <= limit) {
                // Display cached
                document.getElementById("status").innerHTML = '';
                appendStatus('Time Limit Not Exceeded - Retrieveing the cached data...');
                for (var i = 0; i < CityCodes.length; i++) {
                    diplayWeatherData(result[i]);
                }
                // diplayWeatherData(result);
                // console.log(result[1]);
            }

            function appendStatus(data) {
                var mainContainer2 = document.getElementById("status");
                var div = document.createElement("div");
                div.innerHTML = data;
                mainContainer2.appendChild(div);
            }

            function diplayWeatherData(data) {
                var mainContainer = document.getElementById("container");
                var div = document.createElement("div");
                var result_output = '<ul><li>Name: ' + data[0] + '</li><li>Id: ' + data[1] + '</li><li>Temp: ' + data[2] + '</li><li>Description: ' + data[3] + '</li></ul>';
                div.innerHTML = result_output;
                mainContainer.appendChild(div);
            }

            function diplayWeatherDataCache(data) {
                var mainContainer = document.getElementById("container");
                var div = document.createElement("div");
                var result_output = '<ul><li>Name: ' + data[0] + '</li><li>Id: ' + data[1] + '</li><li>Temp: ' + data[2] + '</li><li>Description: ' + data[3] + '</li></ul>';
                div.innerHTML = result_output;
                mainContainer.appendChild(div);
            }

            function clearContainer() {
                document.getElementById("container").innerHTML = '';
            }

        };
    </script>

    <script>
        function loadJSON(callback) {
            var xobj = new XMLHttpRequest();
            xobj.overrideMimeType("application/json");
            xobj.open('GET', 'cities.json', true); // Replace 'appDataServices' with the path to your file
            xobj.onreadystatechange = function() {
                if (xobj.readyState == 4 && xobj.status == "200") {
                    // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
                    callback(xobj.responseText);
                }
            };
            xobj.send(null);
        }
    </script>


</body>

</html>