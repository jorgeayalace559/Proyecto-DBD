<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
        <title>Estado de Vuelo</title>

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
        <div class="container">
            <form>
              <div class="form-group">
                <label for="numeroVuelo">Vuelo</label>
                <input type="number" class="form-control" id="numeroVuelo" aria-describedby="emailHelp" placeholder="Ejemplo: 1515">
                <small id="emailHelp" class="form-text text-muted">El numero lo puedes encontrar en el boleto.</small>
              </div>
              <div class="form-group">
                <label for="numeroVuelo">Fecha</label>
                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                 </div>
              <button type="submit" class="btn btn-primary">Ver estado del vuelo</button>
            </form>
                <script>
                    $(document).ready(function(){
                      var date_input=$('input[name="date"]'); //our date input has the name "date"
                      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                      var options={
                        format: 'mm/dd/yyyy',
                        container: container,
                        todayHighlight: true,
                        autoclose: true,
                      };
                      date_input.datepicker(options);
                    })
                </script>
    </div>
</div>
    </body>
</html>