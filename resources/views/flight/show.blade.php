@extends('layouts.app')

@section('content') 
  <div class="container">
      <h3>{{$origin->name}} a {{$destination->name}}</h3>
      <button type="button" id="mybtn"class="btn btn-secondary" onclick="myFunction()">Cambiar Búsqueda</button>
      <div id="text" style="display:none" class="container">
          <form action="{{ route('Flight.search') }}" method="POST">
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
@endsection
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
