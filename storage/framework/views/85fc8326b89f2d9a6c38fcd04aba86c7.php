

<?php $__env->startSection('content'); ?>
<br>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div class="card">
				<div class="card-header">Editar mi imagen</div>


				<div class="card-body">
          <?php //formulario para editar la imagen ?>

					<form method="POST" action="<?php echo e(route('image.update')); ?>" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<input type="hidden" name="image_id" value="<?php echo e($image->id); ?>" />

						<div class="form-group row">
							<label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
							<div class="col-md-7">
								<?php if($image->image_path): ?>
								<div class="container-avatar">
									<img src="<?php echo e(route('image.file',['filename' => $image->image_path])); ?>" class="avatar"/>
								</div>
								<?php endif; ?>
								<input id="image_path" type="file" name="image_path" class="form-control <?php echo e($errors->has('image_path') ? 'is-invalid' : ''); ?>" />

								<?php if($errors->has('image_path')): ?>
								<span class="invalid-feedback" role="alert">
									<strong><?php echo e($errors->first('image_path')); ?></strong>
								</span>
								<?php endif; ?>
							</div>
						</div>

						<div class="form-group row">
							<label for="description" class="col-md-3 col-form-label text-md-right">Descripción</label>
							<div class="col-md-7 m-2">
								<textarea id="description" name="description" class="form-control <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>" required><?php echo e($image->description); ?></textarea>

								<?php if($errors->has('description')): ?>
								<span class="invalid-feedback" role="alert">
									<strong><?php echo e($errors->first('description')); ?></strong>
								</span>
								<?php endif; ?>
							</div>
						</div>

						<div class="form-group row">

							<div class="col-md-6 offset-md-3">
								<input type="submit" class="btn btn-primary" value="Actualizar imagen">
							</div>
						</div>


					</form>

				</div>
			</div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/image/edit.blade.php ENDPATH**/ ?>