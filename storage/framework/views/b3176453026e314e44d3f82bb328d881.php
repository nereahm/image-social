<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/main.js')); ?>" defer></script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="<?php echo e(url('/')); ?>">
                    Social-Image 
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?> <!-- guest significa invitado-->
                            <?php if(Route::has('login')): ?><!--verifica si el nombre de la ruta es una ruta registrada.-->
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>

                        <!--enlaces agregados-->
                           <li class="nav-item">
                             <a class="nav-link text-white" href="<?php echo e(route('home')); ?>">Inicio</a>
                           </li>
                           <li class="nav-item">
                             <a class="nav-link text-white" href="<?php echo e(route('user.index')); ?>">Gente</a>
                           </li>
                           <li class="nav-item">
                             <a class="nav-link text-white" href="<?php echo e(route('likes')); ?>">Favoritas</a>
                           </li>
                           <li class="nav-item">
                             <a class="nav-link text-white" href="<?php echo e(route('image.create')); ?>">Subir imagen</a>
                           </li>

                           <li class="nav-item">
                             <a class="nav-link text-white" href="#"><?php echo $__env->make('includes.avatar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php //aca hago un include del codigo q me muestra la imagen ?></a>
                           </li>
                           <!--fin de enlaces agregados-->

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end text-white" aria-labelledby="navbarDropdown">

                               <!--enlaces agregados-->
                                <a class="dropdown-item" href="">
                                     Mi perfil
                                  </a>
                                  <a class="dropdown-item" href="<?php echo e(route('config')); ?>">
                                     Configuracion
                                  </a>
                                <!--fin de enlaces agregados-->

                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\curso-php\imageSocial\resources\views/layouts/app.blade.php ENDPATH**/ ?>