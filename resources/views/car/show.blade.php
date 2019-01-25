<body>
<div class="content">
    <div class="title m-b-md">
        Reserva de Vehiculo
    </div>
    <br><br>
    <form>
    Ciudad de Origen:
    @if(count($cities)>0)
        <select class="custom-select">
            <option selected></option>         
            @foreach($cities->all() as $citie)
                <option name="ciudadOrigen" value="{{ $citie->name }}">{{ $citie->name }}</option>
            @endforeach        
        </select>
    @endif
    <br><br>
    <div style="width:400px;">
        <div style="float: left; width: 130px"> 
            <form action="/action_page.php">
                Recogida:
                <br> <br>
                <input type="date" name="fecha">
            </form>
        <br> <br>
        </div>
            <div style="float: right; width: 225px"> 
            <form action="/action_page.php">
                Entrega:
                <br> <br>
                <input type="date" name="fecha">
            </form>
        </div>
        <br><br>
        <form action="/action_page.php">
            <input type="submit" value="Buscar">
        <form>
    </div>
<body>