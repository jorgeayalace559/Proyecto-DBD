<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
        <title>Mi perfil</title>

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
	    	<div class="card" style="width: 18rem;">
			  <img src="perfil.jpg" alt="" height="150">
			  <div class="card-body">
			    <h5 class="card-title">Mi perfil</h5>
			    <p class="card-text">Nombre: Jorge Ayala</p>
			    <p class="card-text">Millas: 100</p>
			    <p class="card-text">Correo: jorgecito@usach.cl</p>
			    <p class="card-text">Numero de telefono: +56 9 56423587</p>
			    <a href="/user-update" class="btn btn-primary">Actualizar mis datos</a>
			  </div>
			</div>
		</center>

    	<div class="container">
	    	<div class="list-group">
	    		<label for="numeroVuelo">Mis ultimos movimientos</label>
			  <a href="#" class="list-group-item list-group-item-action active">
			    <div class="d-flex w-100 justify-content-between">
			      <h5 class="mb-1">Movimiento 3</h5>
			      <small>Ayer</small>
			    </div>
			    <p class="mb-1">Compre un pasaje a Temuco</p>
			    <small>$50.000</small>
			  </a>
			  <a href="#" class="list-group-item list-group-item-action">
			    <div class="d-flex w-100 justify-content-between">
			      <h5 class="mb-1">Movimiento 2</h5>
			      <small class="text-muted">Hace 1 dia</small>
			    </div>
			    <p class="mb-1">Compre dos boletos a Cancun</p>
			    <small class="text-muted">$800.000</small>
			  </a>
			  <a href="#" class="list-group-item list-group-item-action">
			    <div class="d-flex w-100 justify-content-between">
			      <h5 class="mb-1">Movimiento 1</h5>
			      <small class="text-muted">Hace 3 dias</small>
			    </div>
			    <p class="mb-1">Compre un pasaje a Isla de Pascua</p>
			    <small class="text-muted">$200.000</small>
			  </a>
			</div>
		</div>
    </body>
</html>