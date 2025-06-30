

<?php $__env->startSection('content'); ?>
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Tambah Menu</h2>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <form action="<?php echo e(route('menu.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label for="name">Nama Menu</label>
                    <input type="text" name="name" class="form-control" id="name" autofocus>
                </div>
                <div class="mb-3">
                    <label for="category">Kategori</label>
                    <select id="category" name="category" class="form-select">
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Snack">Snack</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price">Harga Produk</label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="image">Gambar Produk</label>
                    <input type="file" name="image" accept="image/*" id="image" class="form-control">
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary" type="submit">
                        <i class="bx bx-save"></i> Simpan Baru
                    </button>
                    <a href="<?php echo e(route('menu.index')); ?>" class="btn btn-light">
                        <i class="bx bx-arrow-back"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\POS\POS\resources\views/pages/admin/menus/create.blade.php ENDPATH**/ ?>