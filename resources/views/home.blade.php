@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @include('includes.message')
        
        @foreach($images as $image)<?php //$images viene del controlador HomeController ?>
        <div class="card pub_image">
            
        
        @include('includes.image',['image'=>$image])<?php //me traigo el include donde esta el codigo de esta tarjeta pasandole el parametro de la variable del foreach ['image'=>$image] llevo el parametro $image para poder utilizarlo en el include?>
                  

                   <div class="comments m-2">
                        <a href="{{ route('image.detail', ['id' => $image->id])}}" class="btn btn-sm btn-warning btn-comments">
                            Comentarios ({{count($image->comments)}})
                        </a>
		           </div>

                
            </div>
            @endforeach

            {{ $images->render() }}
        </div>
    </div>
</div>
@endsection
