

<?php $__env->startSection('content'); ?>
<br>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div class="card">
        <div class="card-header">Subir nueva imagen</div><?php //card-header clases de boostrap me hace como una peqeña caja ?>



				<div class="card-body"><?php //me lo encierra todo en una caja ?>

					<form method="POST" action="<?php echo e(route('image.save')); ?>" enctype="multipart/form-data">
						<?php echo csrf_field(); ?> <?php //para seguridad  ?>

						<div class="form-group row">
							<label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label><?php //col-md-3 le da un tamaño a la caja col-form-label esto lo estiriza text-md-right me mueve el texto a la derecha?>
							<div class="col-md-7"><?php //col-md-7 el tamaño de la caja para q entre el texto ?>
								<input id="image_path" type="file" name="image_path" class="form-control <?php echo e($errors->has('image_path') ? 'is-invalid' : ''); ?>" required/><?php //class="form-control para q este mejor esterilizado con boostrap ?>

								<?php if($errors->has('image_path')): ?><?php //$errors->has si me da error la validacion de laravel, este metodo ya fue creado por laravel?>
								<span class="invalid-feedback" role="alert"><?php //class="invalid-feedback" clases de boostrap ?>
									<strong><?php echo e($errors->first('image_path')); ?></strong><?php //first saca el primer error generado ?>
								</span>
								<?php endif; ?>
							</div>
						</div>

						<div class="form-group row">
							<label for="description" class="col-md-3 col-form-label text-md-right">Descripción</label>
							<div class="col-md-7">
								<textarea id="description" name="description" class="form-control <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>" required></textarea>

								<?php if($errors->has('description')): ?>
								<span class="invalid-feedback" role="alert">
									<strong><?php echo e($errors->first('description')); ?></strong>
								</span>
								<?php endif; ?>
							</div>
						</div>

						<div class="form-group row">

							<div class="col-md-6 offset-md-3"><?php //offset-md-3 me centra el elemento o lo ajusta hacia un lado ?>
								<input type="submit" class="btn btn-primary" value="Subir imagen">
							</div>
						</div>


					</form>

				</div>
			</div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/image/create.blade.php ENDPATH**/ ?>