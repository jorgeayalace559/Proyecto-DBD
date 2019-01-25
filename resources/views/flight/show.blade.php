
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
        <title>Vuelos</title> 

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
                    <div>
                        <h3>{{$origin->name}} a {{$destination->name}}</h3>
                        <button type="button" id="mybtn"class="btn btn-secondary" onclick="myFunction()">Cambiar Búsqueda</button>
                        <div id="text" style="display:none" class="container">
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
                    <h1 align="center">VUELOS DISPONIBLES</h1>
                    <div class="container">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Horario Salida</th>
                                    <th>Horario llegada</th>
                                    <th>Plataforma</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($flights)>0)
                                    @foreach($flights->all() as $flight)
                                        <tr>
                                            <th scope="row">{{ $flight->id}}</th>
                                            <td>{{ $flight->begin_date }}</td>
                                            <td>{{ $flight->end_date }}</td>
                                            <td>{{ $flight->platform }}</td>
                                            <td><button type="button" class="btn btn-primary">Seleccionar</button></td>
                                        </tr>
                                    @endforeach        
                                @endif
                            </tbody>
                        </table>        
                    </div>
                </body> 
            </html>



<!--
<p>Display some text when the checkbox is checked:</p>
Checkbox: <input type="checkbox" id="myCheck"  onclick="myFunction()">
<p id="texto" style="display:none">Checkbox is CHECKED!</p>
-->
<script>
function myFunction() {
  var mybtn = document.getElementById("mybtn");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
