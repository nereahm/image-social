<?php if(session('message')): ?><?php //si existe la session del mensaje ?>
<div class="alert alert-success">
	<?php echo e(session('message')); ?>

</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/includes/message.blade.php ENDPATH**/ ?>