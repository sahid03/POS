

<?php $__env->startSection('content'); ?>
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Kasir</h2>
        <a href="<?php echo e(route('kasir.create')); ?>" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Kasir
        </a>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Total Penjualan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $cashiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="align-middle">
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->username); ?></td>
                                <td>40 Penjualan</td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="<?php echo e(route('kasir.edit', $item->id)); ?>"
                                            class="btn btn-warning btn-sm py-1 px-3 rounded-1 text-white">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <form action="<?php echo e(route('kasir.destroy', $item->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-light btn-sm py-1 px-3 rounded-1"
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\POS\POS\resources\views/pages/admin/cashiers/index.blade.php ENDPATH**/ ?>