@extends('airplanes.layout')

@section('content')

<h1 class="text-center">Aviones</h1>

<div class="container">

	<a class="btn btn-info mb-3" href="{{route('airplanes.create')}}">Agregar avion</a>	

	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Capacidad</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($airplanes as $airplane)
    <tr>
      <th scope="row">{{$airplane->id}}</th>
      <td>{{$airplane->capacity}}</td>
      <td><a class="btn btn-info" href="{{route('airplanes.edit',$airplane->id)}}">Editar</a>
      	<form action="{{route('airplanes.destroy',$airplane->id)}}" method="POST">
      		@csrf
      		@method('DELETE')
      	 <button type="submit" class="btn-sm btn-danger mt-3">Borrar</button>
      	</form>
      </td>
  </tr>
  @endforeach
  </tbody>
</table>

{{$airplanes->links()}}

</div>

@endsection