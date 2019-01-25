<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
        <title>MIATAM</title> 

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!doctype html>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

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
    <div class="row">
        <div class="col-3">
            <div class="col-sm-11">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Reserva tu Vuelo</a>
                    <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Check-In</a>
                    <a class="nav-link active" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Estado del Vuelo</a>
                    <a class="nav-link active" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Vuelo, Hotel y Auto</a>
                </div>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                
                    <form>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col">
                                    <label for="RecogidaVehiculo">Ciudad de Origen:</label>
                                    <input type="text" class="form-control" placeholder="Ciudad Origen">
                                </div>
                                <div class="col">
                                    <label for="RecogidaVehiculo">Ciudad de Destino:</label>
                                    <input type="text" class="form-control" placeholder="Ciudad Destino">
                                </div>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <form>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col">
                                <br><br>
                                    <label for="Ida">Ida:</label>
                                    <input type="date" class="form-control" placeholder="Ciudad Destino">
                                </div>
                                <div class="col">
                                <br><br>
                                    <label for="Salida">Salida:</label>
                                    <input type="date" class="form-control" placeholder="Ciudad Destino">
                                </div>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <form>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col">
                                <br><br>
                                    <label for="RecogidaVehiculo">Cantidad de Pasajeros:</label>
                                    <input type="text" class="form-control" id="CodigoVueloID" placeholder="Costo...">    
                                </div>
                                <div class="col">
                                <br><br>
                                    <label for="RecogidaVehiculo">Tipo de Asiento:</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Tipo De Asiento</option>
                                        <option value="1">Economy</option>
                                        <option value="2">Premium Economy</option>
                                        <option value="3">Premium Business</option>
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
                
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col">
                            <br><br>
                                <label for="Ida">Numero del Vuelo:</label>
                                <input type="text" class="form-control" placeholder="Ciudad Destino">
                            </div>
                            <div class="col">
                            <br><br>
                                <label for="Salida">Fecha:</label>
                                <input type="date" class="form-control" placeholder="Ciudad Destino">
                            </div>
                        </div>
                        <br><br>
                        <button class="btn btn-primary" type="submit"> Ver Estado de Vuelo</button>
                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                
                
                
                </div>
            </div>
        </div>
    </div>
</body>