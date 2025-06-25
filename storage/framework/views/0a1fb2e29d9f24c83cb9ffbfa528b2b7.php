<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php //$images viene del controlador HomeController ?>
        <div class="card pub_image">
            
        
        <?php echo $__env->make('includes.image',['image'=>$image], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php //me traigo el include donde esta el codigo de esta tarjeta pasandole el parametro de la variable del foreach ['image'=>$image] llevo el parametro $image para poder utilizarlo en el include?>
                  

                   <div class="comments m-2">
                        <a href="<?php echo e(route('image.detail', ['id' => $image->id])); ?>" class="btn btn-sm btn-warning btn-comments">
                            Comentarios (<?php echo e(count($image->comments)); ?>)
                        </a>
		           </div>

                
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php echo e($images->render()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/home.blade.php ENDPATH**/ ?>