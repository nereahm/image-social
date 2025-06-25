<div class="card-body">
                   <?php if($image->user->image): ?>
                    <div class="container-avatar">
                        <!--  <img src="<?php echo e(url('/user/avatar/'.Auth::user()->image)); ?>" alt=""/> --><?php //puede ser asi tambien ?>
                        <img src="<?php echo e(route('user.avatar',['filename'=>$image->user->image])); ?>" class="avatar" />
                    </div>
                    <?php endif; ?>
                    <div class="data-user"><!--// con style de css lo modifiqe  -->
                        <a href="">
                            <?php echo e($image->user->name.' '.$image->user->surname); ?>

                            <span class="nickname">
                                <?php echo e(' | @'.$image->user->nick); ?>

                            </span>
                        </a>
		            </div>
                    <div class="image-container">
			          <img src="<?php echo e(route('image.file',['filename' => $image->image_path])); ?>" />
		           </div>

                   <div class="description">
                    <span class="nickname"><?php echo e('@'.$image->user->nick); ?> </span>
                    <span class="nickname date"><?php echo e(' | '.\FormatTime::LongTimeFilter($image->created_at)); ?></span>
                    <p><?php echo e($image->description); ?></p>
		           </div>

                   <div class="likes">
                            <!-- Comprobar si el usuario le dio like a la imagen -->
                            <?php $user_like = false; ?>
                            <?php $__currentLoopData = $image->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($like->user->id == Auth::user()->id): ?><?php //si el id del usuario de la tabla likes es igual al id del usuario identificado ?>
                            <?php $user_like = true; ?>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($user_like): ?><?php //si es true el usuario le dio like ?>
                            <img src="<?php echo e(asset('img/heart-red.png')); ?>" data-id="<?php echo e($image->id); ?>" class="btn-dislike"/><?php //muestra el corazon rojo ?>
                            <?php else: ?>      
                            <img src="<?php echo e(asset('img/heart-black.png')); ?>" data-id="<?php echo e($image->id); ?>" class="btn-like"/>
                            <?php endif; ?>

                        <span class="number_likes"><?php echo e(count($image->likes)); ?></span> <?php //me muestra el numero de los likes ?>   
                        
                   </div>
            </div><?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/includes/image.blade.php ENDPATH**/ ?>