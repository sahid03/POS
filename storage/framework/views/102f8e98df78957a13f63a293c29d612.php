<?php $__env->startSection('content'); ?>
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Menu</h2>
        <a href="<?php echo e(route('menu.create')); ?>" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Menu
        </a>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <?php if($menus->count() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Menu</th>
                                <th>Kategori Menu</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="align-middle">
                                    <td>
                                        <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt=""
                                            class="rounded object-fit-cover" width="40">
                                    </td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->category); ?></td>
                                    <td>Rp. <?php echo e(number_format($item->price)); ?></td>
                                    <td>
                                        <div class="d-flex justify-content-end gap-1">
                                            <a href="<?php echo e(route('menu.edit', $item->id)); ?>"
                                                class="btn btn-warning btn-sm py-1 px-3 rounded-1 text-white">
                                                <i class="bx bx-edit"></i> Edit
                                            </a>
                                            <form action="<?php echo e(route('menu.destroy', $item->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-light btn-sm py-1 px-3 rounded-1" type="submit"
                                                    onclick="return confirm('Kamu yakin?')">
                                                    <i class="bx bx-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="mb-0 text-center text-secondary">Menu masih kosong</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\POS\POS\resources\views/pages/admin/menus/index.blade.php ENDPATH**/ ?>