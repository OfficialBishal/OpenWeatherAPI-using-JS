<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fidenz Weather App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <meta name="theme-color" content="#712cf9">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
</head>

<body class="text-white bg-dark">
    <div class="cover-container d-flex w-100 p-3 mx-auto flex-column">

        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">OpenWeather API App</h3>
            </div>
        </header>

        <main class="px-3">

            <br>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm"></div>
                    <div class="col-sm">
                        <button id="toggle" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Fetch City
                            Codes</button>
                        <button id="toggle2" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Fetch
                            Weather Details</button>
                    </div>
                    <div class="col-sm"></div>
                </div>
            </div>
            <br>

            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div>
                            <h3 class="custombot">City Name and CityCodes</h3>
                        </div>
                        <br>
                        <div id="myData"></div>
                    </div>

                    <br>
                    <div class="col-sm">
                        <div>
                            <h3 class="custombot">Weather Details</h3>
                        </div>
                        <br>
                        <div id="status"></div>
                        <br>
                        <div id="container"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer class="footer">
        <p>Done by <a href="https://www.linkedin.com/in/ofclbishal/" class="text-white">Bishal Shrestha</a>, <a href="https://github.com/OfficialBishal" class="text-white">@Github</a></p>
    </footer>

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
                    limit = initialTime + 1000 * 60 ;
                    appendStatus(
                        '<span class="greener">Starting</span>, <span class="cyaner">Retrieving new data...</span>'
                    );
                } else if (timestamp > limit) {
                    const initialTime = timestamp;
                    limit = initialTime + 1000 * 60 ;
                    appendStatus(
                        '<span class="statusExceed">Time Limit Exceeded</span> - <span class="cyaner">Retrieving new data again...</span>'
                    );
                    counter = 0;
                }

                result = [];

                for (var i = 0; i < CityCodes.length; i++) {
                    const apiKey = '076ac7ca46c11b522b3f0708c8a36f03';
                    const cityId = CityCodes[i];
                    var url = "https://api.openweathermap.org/data/2.5/weather?id=" + cityId + "&appid=" + apiKey +
                        "&units=metric";
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
                appendStatus(
                    '<span class="statusNotExceed">Time Limit Not Exceeded</span> - <span class="cyaner">Retrieveing the cached data...</span>'
                );
                var min = (~~((limit - timestamp) / (1000 * 60)));
                var sec = ~~((((limit - timestamp))/1000) % 60);
                appendStatus('Time before new retrieval: ' + min + ' min ' + sec + ' sec');
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
                var result_output = '<ul><li>Name: ' + data[0] + '</li><li>Id: ' + data[1] + '</li><li>Temp: ' +
                    data[2] + '</li><li>Description: ' + data[3] + '</li></ul>';
                div.innerHTML = result_output;
                mainContainer.appendChild(div);
            }

            function diplayWeatherDataCache(data) {
                var mainContainer = document.getElementById("container");
                var div = document.createElement("div");
                var result_output = '<ul><li>Name: ' + data[0] + '</li><li>Id: ' + data[1] + '</li><li>Temp: ' +
                    data[2] + '</li><li>Description: ' + data[3] + '</li></ul>';
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>