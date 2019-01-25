
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MIATAM</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!doctype html>
        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">MIATAM</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    MIATAM
                </div>
                <form>
                    @if (count($cities)>0)
                    <select class="custom-select">
                        <option selected>Ciudad Origen</option>         
                            @foreach($cities->all() as $citie)
                            <option name="ciudadOrigen" value="{{ $citie->name }}">{{ $citie->name }}</option>
                            @endforeach        
                    </select>
                    <br> <br>
                    <select class="custom-select">
                        <option selected>Ciudad Destino</option>         
                            @foreach($cities->all() as $citie)
                            <option value="1">{{ $citie->name }}</option>
                            @endforeach        
                    </select>
                    @endif
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                      <label class="form-check-label" for="exampleRadios1">
                        Solo Ida
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                      <label class="form-check-label" for="exampleRadios2">
                        Ida y Vuelta
                      </label>
                    </div>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Número Pasajeros</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <br> <br>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Clase</option>
                        <option value="Economy">Economy</option>
                        <option value="Premium Economy">Premium Economy</option>
                        <option value="Premium Business">Premium Business</option>
                    </select>
                    <br> <br>
                    <button type="button" class="btn btn-primary">Buscar Vuelo</button>
                </form>
            </div>
        </div>
    </body>
</html>



</body>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
