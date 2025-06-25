

<?php $__env->startSection('content'); ?>
<br>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h1>Mis imagenes favoritas</h1>
			<hr/>

			<?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card pub_image">
				<?php echo $__env->make('includes.image',['image'=>$like->image], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php //aca incluyo el include de la tarjeta q utilice en home.blade.php y el parametro es el de la variable del foreach ?>
                       <div class="comments m-2">
                            <a href="<?php echo e(route('image.detail', ['id' => $like->image->id])); ?>" class="btn btn-sm btn-warning btn-comments">
                                Comentarios (<?php echo e(count($like->image->comments)); ?>)
                            </a>
                       </div> 
            </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<!-- PAGINACION -->
			<div class="clearfix"></div>
			<?php echo e($likes->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/like/index.blade.php ENDPATH**/ ?>