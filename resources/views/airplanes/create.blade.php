@extends('airplanes.layout')

@section('content')

<h1 class="text-center">Agregar avion</h1>

<div class="container">
  <form action="{{ route('airplanes.store') }}" method="POST">
    @csrf
  
     <div class="row">
        
        <div class="col-md-12">
            <div class="form-group">
                <strong>Capacidad</strong>
                <textarea class="form-control"  name="capacity" placeholder="Ingresar cantidad"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>ID_Vuelo</strong>
                <textarea class="form-control"  name="flight_id" placeholder="Ingresar id vuelo"></textarea>
            </div>
        </div>
        <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </div>
   
</form>
</div>

@endsection