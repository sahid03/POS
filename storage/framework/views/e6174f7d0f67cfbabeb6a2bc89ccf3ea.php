

<?php $__env->startSection('content'); ?>
    <div class="row g-4">
        <h2 class="text-dark fw-bold mb-4">Order List</h2>

        <?php if(session('status')): ?>
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                <?php echo e(session('status')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-lg-3">
                <div class="card" type="button" data-bs-toggle="modal" data-bs-target="#changeStatus<?php echo e($item->id); ?>">
                    <div class="card-body">
                        <p class="mb-0 text-secondary text-end fs-7">#<?php echo e($item->id); ?></p>
                        <h5 class="text-dark mb-0"><?php echo e($item->customer_name); ?></h5>
                        <p class="mb-2 text-secondary fs-8">
                            <?php echo e(number_format($item->details->count())); ?> Items
                        </p>
                        <?php if($item->status == 'Waiting'): ?>
                            <span class="badge bg-warning"><?php echo e($item->status); ?></span>
                        <?php elseif($item->status == 'Completed'): ?>
                            <span class="badge bg-primary"><?php echo e($item->status); ?></span>
                        <?php else: ?>
                            <span class="badge bg-danger"><?php echo e($item->status); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="changeStatus<?php echo e($item->id); ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title">Pesanan #<?php echo e($item->id); ?></h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo e(route('cashier.order-list.status')); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="transaction_id" value="<?php echo e($item->id); ?>">
                                <div class="mb-3">
                                    <label for="status">Ubah Status</label>
                                    <select id="status" name="status" class="form-select">
                                        <option value="Waiting">Waiting</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cashier', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilang Cendana Awari\Documents\POS\resources\views/pages/cashier/order-list.blade.php ENDPATH**/ ?>