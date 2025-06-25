

<?php $__env->startSection('content'); ?>
<br>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
			<?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<div class="card pub_image pub_image_detail">

				<?php echo $__env->make('includes.image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<?php if(Auth::user() && Auth::user()->id == $image->user->id): ?>
					<div class="actions">


						<a href="<?php echo e(route('image.edit',['id'=>$image->id])); ?>" class="btn btn-sm btn-primary m-2">Actualizar</a>

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
										<a href="<?php echo e(route('image.delete',['id'=>$image->id])); ?>" class="btn btn-danger">Borrar definitivamente</a>
									</div>

								</div>
							</div>
						</div>
						
					</div>
				<?php endif; ?>

				<!--COMENTARIOS-->
				<div class="comments">

					<h2>Comentarios (<?php echo e(count($image->comments)); ?>)</h2>
					<hr>

					<form method="POST" action="<?php echo e(route('comment.save')); ?>" class="m-2">
						<?php echo csrf_field(); ?>

						<input type="hidden" name="image_id" value="<?php echo e($image->id); ?>" />
						<p>
							<textarea class="form-control <?php echo e($errors->has('content') ? 'is-invalid' : ''); ?>" name="content"></textarea>
							<?php if($errors->has('content')): ?>
							<span class="invalid-feedback" role="alert"><?php //invalid-feedback clase de boostrap ?>
								<strong><?php echo e($errors->first('content')); ?></strong><?php //$errors->first muestro el error ?>
							</span>
							<?php endif; ?>
						</p>
						<button type="submit" class="btn btn-success m-2">
							Enviar
						</button>
					</form>

					<hr>
					<?php //muestro lista de los comentarios ?>

					<?php $__currentLoopData = $image->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="comment">

						<span class="nickname"><?php echo e('@'.$comment->user->nick); ?> </span><?php //gracias a la ORM LO Q HACEMOS ACA ES LLAMAR AL METODO user de Image ?>
						<?php //utilizo HELPERS FormatTime::LongTimeFilte es la clase y el metodo q estan en app/Helpers?>
						<span class="nickname date"><?php echo e(' | '.\FormatTime::LongTimeFilter($comment->created_at)); ?></span>
						<?php ////////////////////////////////////////////////////////////////////////////////////////// ?>
						<p><?php echo e($comment->content); ?><br/><?php //muestro el comentario ?>
						<?php   //Auth::check() me saca si estoy identificado?>
							<?php if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id)): ?>
							<a href="<?php echo e(route('comment.delete', ['id' => $comment->id])); ?>" class="btn btn-sm btn-danger">
								Eliminar
							</a>
							<?php endif; ?>
						</p>
					</div>


					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
				<!--FIN DE COMENTARIOS-->
				
			</div>


        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/image/detail.blade.php ENDPATH**/ ?>