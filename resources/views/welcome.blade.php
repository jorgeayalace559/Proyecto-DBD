@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="col-sm-11">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active mb-1" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Reserva tu Vuelo</a>
                    <a class="nav-link active mb-1" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Check-In</a>
                    <a class="nav-link active mb-1" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Estado del Vuelo</a>
                    <a class="nav-link active" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Vuelo, Hotel y Auto</a>
                </div>
                </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">

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
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                
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
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection