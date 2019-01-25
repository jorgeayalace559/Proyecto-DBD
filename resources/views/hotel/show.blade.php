<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
        <title>Hotel</title> 

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!doctype html>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">MIATAM</a>
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
                        <a class="nav-link" href="#">Check-In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Estado del Vuelo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vuelo, Hotel y Auto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </head>
    <body>
        <form>
            <div class="form-group">
            <div style="width:400px;">
            <div class="col-sm-11">
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
                            <label for="RecogidaVehiculo">Llegada:</label>
                            <input type="date" name="fecha">
                        </div>
                        <div class="col">
                            <label for="RecogidaVehiculo">Salida:</label>
                            <br>
                            <input type="date" name="fecha">
                        </div>
                    </div>
                </form>
                <br><br>
                <form action="/action_page.php">
                    <button class="btn btn-primary" type="submit"> Buscar</button>
                <form>
            </div>
        </form>
    </body>
</html>