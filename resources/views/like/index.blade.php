@extends('layouts.app')

@section('content')
<br>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h1>Mis imagenes favoritas</h1>
			<hr/>

			@foreach($likes as $like)
            <div class="card pub_image">
				@include('includes.image',['image'=>$like->image])<?php //aca incluyo el include de la tarjeta q utilice en home.blade.php y el parametro es el de la variable del foreach ?>
                       <div class="comments m-2">
                            <a href="{{ route('image.detail', ['id' => $like->image->id])}}" class="btn btn-sm btn-warning btn-comments">
                                Comentarios ({{count($like->image->comments)}})
                            </a>
                       </div> 
            </div>
                @endforeach

			<!-- PAGINACION -->
			{{$likes->links()}}
        </div>
    </div>
</div>
@endsection
