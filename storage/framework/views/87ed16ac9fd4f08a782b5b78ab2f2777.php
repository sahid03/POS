<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php echo $__env->make('components.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="bg-soft-blue">
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container-fluid">
            <a href="." class="navbar-brand logo">
                <img src="<?php echo e(url('assets/images/logo.png')); ?>" alt=""> JagoPos
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto gap-2">
                    <li class="nav-item">
                        <a href="." class="nav-link px-4 <?php echo e(request()->is('/') ? 'active' : ''); ?>">Kasir</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('cashier.order-list')); ?>"
                            class="nav-link px-4  <?php echo e(request()->is('order-list') ? 'active' : ''); ?>">
                            Order List
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo e(Auth::user()->name); ?>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>">
                                    <?php echo e(Auth::user()->role); ?>

                                </a>
                            </li>
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container-fluid py-5 px-0 px-md-5">
        <?php echo $__env->yieldContent('content'); ?>
    </section>

    <footer class="pt-5 pb-4">
        <div class="container">
            <p class="mb-0 text-center text-secondary fs-7">
                2025 &copy; Created By Saeful Ammar.
            </p>
        </div>
    </footer>

    <?php echo $__env->make('components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        document.getElementById('checkoutModal').addEventListener('shown.bs.modal', function() {
            document.getElementById('name').focus();
        });
    </script>
</body>

</html>
<?php /**PATH C:\Users\Gilang Cendana Awari\Documents\POS\resources\views/layouts/cashier.blade.php ENDPATH**/ ?>