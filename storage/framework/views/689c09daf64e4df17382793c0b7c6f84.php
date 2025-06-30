

<?php $__env->startSection('content'); ?>
    <div class="row g-4">
        <h2 class="text-dark fw-bold mb-4">Order List</h2>
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-4">
                    <i class='bx bxs-food-menu fs-1 text-primary'></i>
                    <h4 class="text-dark mb-0 mt-3"><?php echo e($products); ?> Menu</h4>
                    <p class="text-secondary mb-0">Jumlah Menu Yang Ada</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-4">
                    <i class='bx bx-money fs-1 text-primary'></i>
                    <h4 class="text-dark mb-0 mt-3">Rp. <?php echo e(number_format($income)); ?></h4>
                    <p class="text-secondary mb-0">Pendapatan Hari Ini</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-4">
                    <i class='bx bx-male-female fs-1 text-primary'></i>
                    <h4 class="text-dark mb-0 mt-3"><?php echo e(number_format($transaction)); ?> Order</h4>
                    <p class="text-secondary mb-0">Order Hari Ini</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-4">
                    <i class='bx bxs-user-pin fs-1 text-primary'></i>
                    <h4 class="text-dark mb-0 mt-3"><?php echo e($cashiers); ?> Kasir</h4>
                    <p class="text-secondary mb-0">Jumlah Kasir</p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\POS\resources\views/pages/admin/dashboard.blade.php ENDPATH**/ ?>