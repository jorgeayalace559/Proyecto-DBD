<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
        <title>Seguro</title>

            <!--  jQuery -->
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

            <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
            <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

            <!-- Bootstrap Date-Picker Plugin -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <!doctype html>
        

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="/">MIATAM</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
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
        <center>
            <form>
                <div class="form-group">
                <div style="width:400px;">
                <div class="col-sm-11">
                    <label for="RecogidaVehiculo">¿Cuando viajas?:</label>
                    <input type="date" name="fecha">
                    <br><br>
                    <label for="RecogidaVehiculo">¿A donde viajas?:</label>
                    <small id="recogidaVehiculo" class="form-text text-muted">Debe escoger la ciudad en la cual te hospedaras.</small>
                    @if(count($cities)>0)
                        <select class="custom-select">
                            <option selected></option>         
                            @foreach($cities->all() as $citie)
                                <option name="ciudadOrigen" value="{{ $citie->name }}">{{ $citie->name }}</option>
                            @endforeach        
                        </select>
                    @endif
                    <br><br>
                    <form>
                        <div class="form-row">
                            <div class="col">
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>Tipo De Seguro</option>
                                    <option value="1">Individual</option>
                                    <option value="2">Grupal</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <br>
                            <label for="tipoSeguro">El viaje será:</label>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Solo Ida
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">
                                            Ida y Vuelta
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div>
                            <label for="RecogidaVehiculo">Edad de los pasajeros:</label>
                            <small id="recogidaVehiculo" class="form-text text-muted">En caso de ser más de un pasajero, separar la edad por comas.</small>
                            <input type="text" class="form-control" id="CodigoVueloID" placeholder="Edad/es...">
                            <label for="RecogidaVehiculo">Costo del Viaje:</label>
                            <input type="text" class="form-control" id="CodigoVueloID" placeholder="Costo...">    
                        </div>
                        <br>
                    <form action="/action_page.php">
                        <button class="btn btn-primary" type="submit"> Cotizar</button>
                    <form>
                </div>
            </form>
        </center>
    </body>
</html>

<!--
<body>
    <div class="content">
        <div class="title m-b-md">
            Reserva de Seguros
        </div>
        <br> <br>
        <form action="/action_page.php">
            ¿Cuando Viajas?:
            <input type="date" name="fecha">
        </form>
        <br> <br>
        ¿A donde viajas?
        @if(count($cities)>0)
            <select class="custom-select">
                <option selected></option>         
                @foreach($cities->all() as $citie)
                    <option name="ciudadOrigen" value="{{ $citie->name }}">{{ $citie->name }}</option>
                @endforeach        
            </select>
        @endif
    <br><br>
        <br> <br>
        <div style="width:400px;">
            <div style="float: left; width: 130px"> 
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Tipo De Seguro</option>
                    <option value="1">Individual</option>
                    <option value="2">Grupal</option>
                </select>
            </div>
            <br> <br>
            <br> <br>   
            <div style="float: right; width: 22<div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                    Solo Ida
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Ida y Vuelta
                    </label>
                </div>
            </div>
        </div>
        <br> <br>
        <form action="/action_page.php">
            Edad de los pasajeros:
            <input name="age" type="text">
        </form>
        <br> <br>
        <form action="/action_page.php">
            Costo del Viaje:
            <input name="cost" type="text">
        </form>
        <br> <br>
        <form action="/action_page.php">
            <input type="submit" value="Cotizar">
        <form>
    </div>
<body> -->