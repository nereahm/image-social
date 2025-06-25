
<?php if(Auth::user()->image): ?>
<div class="container-avatar">
		<img src="<?php echo e(route('user.avatar',['filename'=>Auth::user()->image])); ?>" alt="" class="avatar">
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/includes/avatar.blade.php ENDPATH**/ ?>