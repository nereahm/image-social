<?php //el header?>
<?php $__env->startSection('content'); ?>
<br>
<?php //COPIE EL MISMO FORMATO DE REGISTER.BLADE.PHP Q YA LO HABIA AUTO-HECHO LARAVEL ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
     <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php //muestro el mensaje creado en el controlador?>
            <div class="card">
                <div class="card-header">configuracion de mi cuenta</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('user.update')); ?>" enctype="multipart/form-data" aria-label="Configuracion de mi cuenta"><?php //enctype="multipart/form-data" esto es porqe van a pasar imagenes ?>
                        <?php echo csrf_field(); ?>  <?php //esto es lo q da seguridad con los formularios se pone si o si laravel simplifica el codigo ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(Auth::user()->name); ?>" required autofocus><?php //Auth::user()->name con esto ya tengo el dato gracias a laravel Auth::porqe es estatic y user es el metodo q tiene los datos ,la clase el metodo lo hizo laravel ?>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Surname')); ?></label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control<?php echo e($errors->has('surname') ? ' is-invalid' : ''); ?>" name="surname" value="<?php echo e(Auth::user()->surname); ?>" required autofocus>

                                <?php if($errors->has('surname')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('surname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nick')); ?></label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control<?php echo e($errors->has('nick') ? ' is-invalid' : ''); ?>" name="nick" value="<?php echo e(Auth::user()->nick); ?>" required autofocus>

                                <?php if($errors->has('nick')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('nick')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(Auth::user()->email); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Avatar')); ?></label>

                            <div class="col-md-6">

                            <?php echo $__env->make('includes.avatar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php //aca hago un include del codigo q me muestra la imagen ?>
                                
                            <input id="image_path" type="file" class="form-control<?php echo e($errors->has('image_path') ? ' is-invalid' : ''); ?>" name="image_path">

                                <?php if($errors->has('image_path')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('image_path')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mt-1">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/user/config.blade.php ENDPATH**/ ?>