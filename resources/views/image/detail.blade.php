@extends('layouts.app')

@section('content')
<br>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
			@include('includes.message')

			<div class="card pub_image pub_image_detail">

				@include('includes.image')

				@if(Auth::user() && Auth::user()->id == $image->user->id)
					<div class="actions">


						<a href="{{route('image.edit',['id'=>$image->id])}}" class="btn btn-sm btn-primary m-2">Actualizar</a>

                        <?php //ESTE CODIGO ESTA HECHO POR BOOSTRAP 5 SE LLAMA MODAL?>
						<!-- Button to Open the Modal -->
						<button type="button" class="btn btn-danger btn-sm m-2" data-bs-toggle="modal" data-bs-target="#myModal">
							Eliminar
						</button>
						
						<!-- The Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						
							<div class="modal-dialog">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										Si se elimina esta imagen nunca podrás recuperarla, ¿estas seguro de querer borrarla?
									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
										<a href="{{route('image.delete',['id'=>$image->id])}}" class="btn btn-danger">Borrar definitivamente</a>
									</div>

								</div>
							</div>
						</div>
						
					</div>
				@endif

				<!--COMENTARIOS-->
				<div class="comments">

					<h2>Comentarios ({{count($image->comments)}})</h2>
					<hr>

					<form method="POST" action="{{ route('comment.save') }}" class="m-2">
						@csrf

						<input type="hidden" name="image_id" value="{{$image->id}}" />
						<p>
							<textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content"></textarea>
							@if($errors->has('content'))
							<span class="invalid-feedback" role="alert"><?php //invalid-feedback clase de boostrap ?>
								<strong>{{ $errors->first('content') }}</strong><?php //$errors->first muestro el error ?>
							</span>
							@endif
						</p>
						<button type="submit" class="btn btn-success m-2">
							Enviar
						</button>
					</form>

					<hr>
					<?php //muestro lista de los comentarios ?>

					@foreach($image->comments as $comment)
					<div class="comment">

						<span class="nickname">{{'@'.$comment->user->nick}} </span><?php //gracias a la ORM LO Q HACEMOS ACA ES LLAMAR AL METODO user de Image ?>
						<?php //utilizo HELPERS FormatTime::LongTimeFilte es la clase y el metodo q estan en app/Helpers?>
						<span class="nickname date">{{' | '.\FormatTime::LongTimeFilter($comment->created_at)}}</span>
						<?php ////////////////////////////////////////////////////////////////////////////////////////// ?>
						<p>{{$comment->content}}<br/><?php //muestro el comentario ?>
						<?php   //Auth::check() me saca si estoy identificado?>
							@if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
							<a href="{{ route('comment.delete', ['id' => $comment->id]) }}" class="btn btn-sm btn-danger">
								Eliminar
							</a>
							@endif
						</p>
					</div>


					@endforeach

				</div>
				<!--FIN DE COMENTARIOS-->
				
			</div>


        </div>

    </div>
</div>
@endsection