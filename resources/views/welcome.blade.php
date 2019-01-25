<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
        <title>MIATAM</title> 

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!doctype html>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

       <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="/">MIATAM</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Principal <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Reserva Tu Vuelo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/check-in">Check-In</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/state">Estado del Vuelo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Vuelo, Hotel y Auto</a>
                  </li>
                  
                </ul>
              </div>
            </nav>
    </head>
    <body>  
        <br><br>
        <div class="col-sm-11">
            <div class="row">
                <div class="col-3">
                    <div style="width:200px;">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            
                            <ul class="nav nav-tabs">
                            <li><a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a></li>
                            <br></br>
                            <li><a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a></li>
                            <br></br>
                            <li><a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a></li>
                            <br></br>
                            <li><a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a></li>
                            <br></br>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">a</div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">b</div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">c</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">d</div>
                    </div>
                </div>
            </div>
        </div>
    </body>

<!--
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MIATAM</title>
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!doctype html>
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">MIATAM</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="title m-b-md">
                    MIATAM
                </div>
                <form action="{{ route('buscarVuelo') }}" method="POST">
                    @method('GET')

                    <div class="row">
                        <div>
                            @if (count($cities)>0)
                            <select class="custom-select">
                                <option selected>Ciudad Origen</option>         
                                    @foreach($cities->all() as $citie)
                                    <option type="text" name="origin_id" class="form-control" value="{{ $citie->name }}">{{ $citie->name }}</option>
                                    @endforeach        
                            </select>
                            <br> <br>
                            <select class="custom-select">
                                <option selected>Ciudad Destino</option>         
                                    @foreach($cities->all() as $citie)
                                    <option type="text" name="destination_id" class="form-control" value="{{ $citie->name }}">{{ $citie->name }}</option>
                                    @endforeach        
                            </select>
                            @endif
                        </div>
                        <div name="tipo-viaje" class="form-check">
                          <input class="form-check-input" type="radio" name="ida"  value="ida" checked>
                          <label class="form-check-label" for="exampleRadios1">
                            Solo Ida
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ida-vuelta"  value="ida-vuelta">
                          <label class="form-check-label" for="exampleRadios2">
                            Ida y Vuelta
                          </label>
                        </div>
                        <div>
                            <select class="custom-select mr-sm-2" name="pasajeros">
                                <option selected>Número Pasajeros</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <br> <br>
                            <select class="custom-select mr-sm-2" name="clase">
                                <option selected value="Economy">Economy</option>
                                <option value="Premium Economy">Premium Economy</option>
                                <option value="Premium Business">Premium Business</option>
                            </select>
                            <br> <br>
                            <button type="submit" class="btn btn-primary">BUSCAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
</body>
    Scripts
<script src="{{ asset('js/app.js') }}"></script>
-->