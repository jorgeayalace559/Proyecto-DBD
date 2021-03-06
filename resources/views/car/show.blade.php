<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
        <title>Reservación de Auto</title>

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
                <label for="RecogidaVehiculo">Lugar de Recogida:</label>
                <small id="recogidaVehiculo" class="form-text text-muted">Debe escoger la ciudad en la cual efectuará el retiro del vehiculo.</small>
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
                            <label for="RecogidaVehiculo">Recogida:</label>
                            <input type="date" name="fecha">
                        </div>
                        <div class="col">
                            <label for="RecogidaVehiculo">Entrega:</label>
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
    </center>
    </body>
</html>