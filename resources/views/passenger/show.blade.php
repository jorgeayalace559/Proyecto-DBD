<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!doctype html>

<form>
    <div class = "container">
        <h2>Pasajero Adulto</h2>
        <br>
        <div class = "row">
            <div class = "col">
                <b><label for="NombrePasajero">Nombre* </label></b>
                <br>
                <input type="text" class="form-control" placeholder="NombrePasajero">
            </div>
            <div class = "col">
                <b><label for="ApellidoPasajero">Apellido* </label></b>
                <br>
                <input type="text" class="form-control" placeholder="ApellidoPasajero">
            </div>
        </div>
        <br>
        <b><label for="RecogidaVehiculo">Documento de Identificación* </label></b>
        <br>
        <div class = "row">
            <div class = "col">
                <br><br>
                <input type="radio" name="radioB" value="CDI" onclick = "show(this)" checked = "checked" ;"> Cédula de Identidad <br>
            </div>
            <div class = "col">
                <br><br>
                <input type="radio" name="radioB" value="P" onclick = "show(this);"> Pasaporte <br>
            </div>
<!--> <!-->
            <div class = "col">
                <b><label for="NombrePasajero">Número* </label></b>
                <br>
                <input type="text" class="form-control" placeholder="Numero">
            </div>
            <div class="form-group col">
                <b><label for="RecogidaVehiculo">Pais de Emision*</label></b>
                <select class="form-control" name="destination_id">
                    @foreach ($countries->all() as $countrie)
                        <option value="{{$countrie->name}}">{{$countrie->name}}</option>
                    @endforeach  
                </select>
            </div>
        </div>
        <br>
        <b><label for="RecogidaVehiculo">Asistencia </label></b>
        <div class = "row">
            <div class = "col">
                <br>
                <input type="radio" name="radioAvisoB" value="M" onclick = "show(this);"> Soy menor de edad y viajo sin la compañia de un mayor <br>
            </div>
            <div class = "col">
                <br>
                <input type="radio" name="radioAvisoB" value="A" onclick = "show(this);"> Necesito asistencia especial <br>
            </div>
        </div>
        <br><br>
        <h2>Programa Pasajero Frecuente</h2>
        <div class = "row">
            <div class = "col">
                <label for="Aerolinea">Aerolinea </label>
                <br>
                <input type="text" class="form-control" placeholder="Aerolinea">
            </div>
            <div class = "col">
                <label for="Numero">Numero </label>
                <br>
                <input type="text" class="form-control" placeholder="Numero">
            </div>
        </div>
    </div>
</form>