

<?php $__env->startSection('content'); ?>
<br>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div class="profile-user">

				<?php if($user->image): ?>
					<div class="container-avatar">
						<img src="<?php echo e(route('user.avatar',['filename'=>$user->image])); ?>" class="avatar" />
						
					</div>
				<?php endif; ?>

				<div class="user-info">
					<h1><?php echo e('@'.$user->nick); ?></h1>
					<h2><?php echo e($user->name .' '. $user->surname); ?></h2>
					<p><?php echo e('Se unió: '.\FormatTime::LongTimeFilter($user->created_at)); ?></p><?php //muestra la fecha  ?>
				</div>

				<div class="clearfix"></div><?php //(limpiar flotados)  ?>
				<hr>
			</div>

			
            <?php //lista de mis imgenes///////////////// ?>
			<?php $__currentLoopData = $user->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card pub_image">
            <?php echo $__env->make('includes.image',['image'=>$image], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                       <div class="comments m-2">
                            <a href="<?php echo e(route('image.detail', ['id' => $image->id])); ?>" class="btn btn-sm btn-warning btn-comments">
                                Comentarios (<?php echo e(count($image->comments)); ?>)
                            </a>
                       </div>   
                    
            </div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/user/profile.blade.php ENDPATH**/ ?>