

<?php $__env->startSection('content'); ?>
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Tambah Kasir</h2>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <form action="<?php echo e(route('kasir.store')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" id="name" autofocus>
                </div>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary" type="submit">
                        <i class="bx bx-save"></i> Simpan Baru
                    </button>
                    <a href="<?php echo e(route('kasir.index')); ?>" class="btn btn-light">
                        <i class="bx bx-arrow-back"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilang Cendana Awari\Documents\POS\resources\views/pages/admin/cashiers/create.blade.php ENDPATH**/ ?>