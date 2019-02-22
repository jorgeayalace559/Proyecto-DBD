@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="col-sm-11">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">settings
                    <a class="nav-link active mb-1" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Reserva tu Vuelo</a>
                    <a class="nav-link active mb-1" id="v-pills-check-in-tab" data-toggle="pill" href="#v-pills-check-in" role="tab" aria-controls="v-pills-check-in" aria-selected="false">Check-In</a>
                    <a class="nav-link active mb-1" id="v-pills-viajes-tab" data-toggle="pill" href="#v-pills-viajes" role="tab" aria-controls="v-pills-viajes" aria-selected="false">Mis Viajes</a>
                    <a class="nav-link active mb-1" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Estado del Vuelo</a>
                    <a class="nav-link active" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Vuelo, Hotel y Auto</a>
                </div>
            </div>
        </div>

        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">


<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <form action="{{ route('Flight.search') }}" method="POST">
                        @csrf
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="RecogidaVehiculo">Ciudad de Origen:</label>
                                    <select class="form-control" name="origin_id">
                                      @foreach ($cities->all() as $citie)
                                        <option value="{{$citie->name}}">{{$citie->name}}</option>
                                      @endforeach 
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="RecogidaVehiculo">Ciudad de Origen:</label>
                                    <select class="form-control" name="destination_id">
                                        @foreach ($cities->all() as $citie)
                                            <option value="{{$citie->name}}">{{$citie->name}}</option>
                                        @endforeach  
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="form-group col">
                                <br><br>
                                    <label for="Ida">Ida:</label>
                                    <input type="date" class="form-control" name="FechaIda" placeholder="Ciudad Destino">
                                </div>
                                <div class="form-group col">
                                <br><br>
                                    <label for="Salida">Vuelta:</label>
                                    <input type="date" class="form-control" name="FechaVuelta"placeholder="Ciudad Destino">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="form-group col">
                                <br><br>
                                    <label for="Pasajeros">Cantidad de Pasajeros:</label>
                                    <select class="form-control custom-select mr-sm-2" name="Pasajeros">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>   
                                </div>
                                <div class="form-group col">
                                <br><br>
                                    <label for="Asiento">Tipo de Asiento:</label>
                                    <select class="form-control custom-select mr-sm-2" name="Asiento">
                                        <option selected>Tipo De Asiento</option>
                                        <option value="Economy">Economy</option>
                                        <option value="Premium Economy">Premium Economy</option>
                                        <option value="Premium Business">Premium Business</option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <button class="btn btn-primary" type="submit"> Buscar Vuelo</button>
                        </div>
                    </form>
                </div>



<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


                <div class="tab-pane fade" id="v-pills-check-in" role="tabpanel" aria-labelledby="v-pills-check-in-tab">
                    <form>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col">
                                    <label for="RecogidaVehiculo">Codigo de Reserva:</label>
                                    <input type="text" class="form-control" placeholder="Codigo de Reserva">
                                </div>
                                <div class="col">
                                    <label for="RecogidaVehiculo">Apellido del Pasajero:</label>
                                    <input type="text" class="form-control" placeholder="Apellido del Pasajero">
                                </div>
                            </div>
                            <br><br>
                            <button class="btn btn-primary" type="submit"> Comienza tu Check-In</button>
                        </div>
                    </form>
                </div>



<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


                <div class="tab-pane fade" id="v-pills-viajes" role="tabpanel" aria-labelledby="v-pills-viajes-tab">
                    <form>
                        <h5>¿Que puedes hacer en Mis Viajes?</h5>
                        <div class="col-sm-11">
                            
                            <div class="row">
                                <div class="col">
                                    <h6>Agregar Asientos y Maletas</h6>
                                </div>
                                <div class="col">
                                    <h6>Cambiar tu Pasaje</h6>
                                </div>
                                <div class="col">
                                    <h6>Asociar Tu Viaje a Tu Cuenta</h6>
                                </div>
                                <div class="col">
                                    <h6>Revisar Itinerario</h6>
                                </div>
                            </div>

                            <br><br>
                            <div class="row">
                                <div class="col">
                                    <label for="RecogidaVehiculo">Codigo de Reserva:</label>
                                    <input type="text" class="form-control" placeholder="Codigo de Reserva">
                                </div>
                                <div class="col">
                                    <label for="RecogidaVehiculo">Apellido del Pasajero:</label>
                                    <input type="text" class="form-control" placeholder="Apellido del Pasajero">
                                </div>
                            </div>
                            <br><br>
                            <button class="btn btn-primary" type="submit"> Administra tu Viaje</button>
                        </div>
                    <form>
                </div>


<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <form>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col">
                                <br><br>
                                    <label for="Ida">Numero del Vuelo:</label>
                                    <input type="text" class="form-control" placeholder="Vuelo">
                                </div>
                                <div class="col">
                                <br><br>
                                    <label for="Salida">Fecha:</label>
                                    <input type="date" class="form-control" placeholder="Fecha">
                                </div>
                            </div>
                            <br><br>
                            <button class="btn btn-primary" type="submit"> Ver Estado de Vuelo</button>
                        </div>
                    </form>
                </div>


<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"> 
                    <form>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col">
                                    <input type="radio" name="radioB" value="VH" onclick = "show(this);"> Vuelo + Hotel <br>
                                </div>
                                <div class="col">
                                    <input type="radio" name="radioB" value="P" onclick = "show(this);"> Paquetes <br>
                                </div>
                                <div class="col">
                                    <input type="radio" name="radioB" value="VHA" onclick = "show(this);"> Vuelo + Hotel + Auto <br>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="radio" name="radioB" value="S" onclick = "show(this);"> Seguro de Viaje <br>
                                </div>
                                <div class="col">
                                    <input type="radio" name="radioB" value="H" onclick = "show(this);"> Hotel <br>
                                </div>
                                <div class="col">
                                    <input type="radio" name="radioB" value="A" onclick = "show(this);"> Auto <br>
                                </div>
                            </div>
                            <br><br>

<!-- |--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->                            
                            
                            <div id="item1" style="display:none" class="col-sm-11">
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="RecogidaVehiculo">Ciudad de Origen:</label>
                                        <select class="form-control" name="origin_id">
                                        @foreach ($cities->all() as $citie)
                                            <option value="{{$citie->name}}">{{$citie->name}}</option>
                                        @endforeach 
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <label for="RecogidaVehiculo">Ciudad de Origen:</label>
                                        <select class="form-control" name="destination_id">
                                        @foreach ($cities->all() as $citie)
                                            <option value="{{$citie->name}}">{{$citie->name}}</option>
                                        @endforeach  
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col">
                                        <br>
                                        <label for="Ida">Ida:</label>
                                        <input type="date" class="form-control" name="FechaIda" placeholder="Ciudad Destino">
                                    </div>
                                    <div class="form-group col">
                                        <br>
                                        <label for="Salida">Vuelta:</label>
                                        <input type="date" class="form-control" name="FechaVuelta"placeholder="Ciudad Destino">
                                    </div>
                                </div>                        
                                <br>
                                <div class="row">
                                    <div class="form-group col">
                                    <br>
                                        <label for="Pasajeros">Cantidad de Pasajeros:</label>
                                        <select class="form-control custom-select mr-sm-2" name="Pasajeros">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>   
                                    </div>
                                    <div class="form-group col">
                                    <br>
                                        <label for="Asiento">Tipo de Asiento:</label>
                                        <select class="form-control custom-select mr-sm-2" name="Asiento">
                                            <option selected>Tipo De Asiento</option>
                                            <option value="Economy">Economy</option>
                                            <option value="Premium Economy">Premium Economy</option>
                                            <option value="Premium Business">Premium Business</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                    <br>
                                        <label for="Pasajeros">Habitaciones:</label>
                                        <select class="form-control custom-select mr-sm-2" name="Pasajeros">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>   
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-primary" type="submit"> Buscar Vuelo </button>                    
                            </div>

<!-- |--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                            <div id="item2" style="display:none">
                            <br>
                            <button class="btn btn-primary" type="submit"> Reserva tu Paquete </button>
                            </div>

<!-- |--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                            <div id="item3" style="display:none" class="col-sm-11">
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="RecogidaVehiculo">Ciudad de Origen:</label>
                                        <select class="form-control" name="origin_id">
                                        @foreach ($cities->all() as $citie)
                                            <option value="{{$citie->name}}">{{$citie->name}}</option>
                                        @endforeach 
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <label for="RecogidaVehiculo">Ciudad de Origen:</label>
                                        <select class="form-control" name="destination_id">
                                        @foreach ($cities->all() as $citie)
                                            <option value="{{$citie->name}}">{{$citie->name}}</option>
                                        @endforeach  
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col">
                                        <br>
                                        <label for="Ida">Ida:</label>
                                        <input type="date" class="form-control" name="FechaIda" placeholder="Ciudad Destino">
                                    </div>
                                    <div class="form-group col">
                                        <br>
                                        <label for="Salida">Vuelta:</label>
                                        <input type="date" class="form-control" name="FechaVuelta"placeholder="Ciudad Destino">
                                    </div>
                                </div>                        
                                <br>
                                <div class="row">
                                    <div class="form-group col">
                                    <br>
                                        <label for="Pasajeros">Cantidad de Pasajeros:</label>
                                        <select class="form-control custom-select mr-sm-2" name="Pasajeros">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>   
                                    </div>
                                    <div class="form-group col">
                                    <br>
                                        <label for="Asiento">Tipo de Asiento:</label>
                                        <select class="form-control custom-select mr-sm-2" name="Asiento">
                                            <option selected>Tipo De Asiento</option>
                                            <option value="Economy">Economy</option>
                                            <option value="Premium Economy">Premium Economy</option>
                                            <option value="Premium Business">Premium Business</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                    <br>
                                        <label for="Pasajeros">Habitaciones:</label>
                                        <select class="form-control custom-select mr-sm-2" name="Pasajeros">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>   
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-primary" type="submit"> Buscar Paquete </button>                    
                            </div>

<!-- |--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                            <div id="item4" style="display:none">
                            <br>
                            <button class="btn btn-primary" type="submit"> Cotiza tu Seguro </button>
                            </div>

<!-- |--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                            <div id="item5" style="display:none">
                            <br>
                            <button class="btn btn-primary" type="submit"> Reserva Ahora </button>
                            </div>

<!-- |--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                            
                            <div id="item6" style="display:none">
                            <br>
                            <button class="btn btn-primary" type="submit"> Reserva un Auto </button>
                            </div>
                            
<!-- |--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                        </div>   
                    </form>
                </div>


<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function show(obj) {
    
        if(obj.value == 'VH'){

            document.getElementById('item1').style.display='block';
            obj.value='Hide';
            document.getElementById('item2').style.display='none';
            obj.value='Show';
            document.getElementById('item3').style.display='none';
            obj.value='Show';
            document.getElementById('item4').style.display='none';
            obj.value='Show';
            document.getElementById('item5').style.display='none';
            obj.value='Show';
            document.getElementById('item6').style.display='none';
            obj.value='Show';
        }
        if(obj.value == 'P'){

            document.getElementById('item1').style.display='none';
            obj.value='Show';
            document.getElementById('item2').style.display='block';
            obj.value='Hide';
            document.getElementById('item3').style.display='none';
            obj.value='Show';
            document.getElementById('item4').style.display='none';
            obj.value='Show';
            document.getElementById('item5').style.display='none';
            obj.value='Show';
            document.getElementById('item6').style.display='none';
            obj.value='Show';

        }
        if(obj.value == 'VHA'){
            
            document.getElementById('item1').style.display='none';
            obj.value='Show';
            document.getElementById('item2').style.display='none';
            obj.value='Show';
            document.getElementById('item3').style.display='block';
            obj.value='Hide';
            document.getElementById('item4').style.display='none';
            obj.value='Show';
            document.getElementById('item5').style.display='none';
            obj.value='Show';
            document.getElementById('item6').style.display='none';
            obj.value='Show';

        }
        if(obj.value == 'S'){
            
            document.getElementById('item1').style.display='none';
            obj.value='Show';
            document.getElementById('item2').style.display='none';
            obj.value='Show';
            document.getElementById('item3').style.display='none';
            obj.value='Show';
            document.getElementById('item4').style.display='block';
            obj.value='Hide';
            document.getElementById('item5').style.display='none';
            obj.value='Show';
            document.getElementById('item6').style.display='none';
            obj.value='Show';

        }
        if(obj.value == 'H'){
            
            document.getElementById('item1').style.display='none';
            obj.value='Show';
            document.getElementById('item2').style.display='none';
            obj.value='Show';
            document.getElementById('item3').style.display='none';
            obj.value='Show';
            document.getElementById('item4').style.display='none';
            obj.value='Show';
            document.getElementById('item5').style.display='block';
            obj.value='Hide';
            document.getElementById('item6').style.display='none';
            obj.value='Show';

        }
        if(obj.value == 'A'){
           
            document.getElementById('item1').style.display='none';
            obj.value='Show';
            document.getElementById('item2').style.display='none';
            obj.value='Show';
            document.getElementById('item3').style.display='none';
            obj.value='Show';
            document.getElementById('item4').style.display='none';
            obj.value='Show';
            document.getElementById('item5').style.display='none';
            obj.value='Show';
            document.getElementById('item6').style.display='block';
            obj.value='Hide';

        }
    }

</script>

@endsection