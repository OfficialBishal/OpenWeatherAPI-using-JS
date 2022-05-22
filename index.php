<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fidenz Weather App</title>

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
            <br><br><br>
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

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>