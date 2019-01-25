<body>
    <div class="content">
        <div class="title m-b-md">
            Reserva de Seguros
        </div>
        <br> <br>
        <form action="/action_page.php">
            ¿Cuando Viajas?:
            <input type="date" name="fecha">
        </form>
        <br> <br>
        ¿A donde viajas?
        @if(count($cities)>0)
            <select class="custom-select">
                <option selected></option>         
                @foreach($cities->all() as $citie)
                    <option name="ciudadOrigen" value="{{ $citie->name }}">{{ $citie->name }}</option>
                @endforeach        
            </select>
        @endif
    <br><br>
        <br> <br>
        <div style="width:400px;">
            <div style="float: left; width: 130px"> 
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Tipo De Seguro</option>
                    <option value="1">Individual</option>
                    <option value="2">Grupal</option>
                </select>
            </div>
            <br> <br>
            <br> <br>   
            <div style="float: right; width: 22<div class="form-check">
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
            </div>
        </div>
        <br> <br>
        <form action="/action_page.php">
            Edad de los pasajeros:
            <input name="age" type="text">
        </form>
        <br> <br>
        <form action="/action_page.php">
            Costo del Viaje:
            <input name="cost" type="text">
        </form>
        <br> <br>
        <form action="/action_page.php">
            <input type="submit" value="Cotizar">
        <form>
    </div>
<body>