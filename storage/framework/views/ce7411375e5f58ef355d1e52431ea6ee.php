<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $__env->make('components.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="bg-soft-blue">
    <section class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card border-0">
                    <div class="card-body py-5 px-5">
                        <div class="bg-soft-blue rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width: 60px; height: 60px">
                            <i class='bx bx-check text-primary fs-1'></i>
                        </div>
                        <h5 class="text-center fw-semibold mb-4">Transaksi Sukses</h5>

                        <p class="mb-1 text-secondary text-uppercase fw-medium fs-7">Detail Produk</p>
                        <?php
                            $subtotal = 0;
                        ?>
                        <?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mt-2">
                                <div class="col-7">
                                    <p class="mb-0 text-dark fw-semibold"><?php echo e($item->menu->name); ?></p>
                                    <p class="mb-0 text-secondary fs-7">Rp. <?php echo e(number_format($item->price)); ?></p>
                                </div>
                                <div class="col-5">
                                    <p class="mb-0 text-dark text-end fw-semibold">Rp.
                                        <?php echo e(number_format($item->price * $item->quantity)); ?></p>
                                    <p class="mb-0 text-secondary text-end fs-7"><?php echo e($item->quantity); ?>x</p>
                                </div>
                            </div>
                            <?php
                                $subtotal += $item->price * $item->quantity;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <hr class="my-4" style="border-style: dashed;">
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="mb-0 text-secondary">Subtotal</p>
                            <p class="mb-0 text-dark fw-semibold">Rp. <?php echo e(number_format($subtotal)); ?></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="mb-0 text-secondary">Pajak</p>
                            <p class="mb-0 text-dark fw-semibold">Rp. 12,000</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="mb-0 text-secondary">Total</p>
                            <p class="mb-0 text-dark fw-semibold">Rp. <?php echo e(number_format($transaction->total)); ?></p>
                        </div>
                        <hr class="my-4" style="border-style: dashed;">
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="mb-0 text-secondary">Cash</p>
                            <p class="mb-0 text-dark fw-semibold">Rp. <?php echo e(number_format($transaction->pay)); ?></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="mb-0 text-secondary">Kembali</p>
                            <p class="mb-0 text-dark fw-semibold">Rp. <?php echo e(number_format($transaction->return)); ?></p>
                        </div>

                        <a href="<?php echo e(route('cashier.dashboard')); ?>" class="btn btn-primary d-block mt-5">
                            Kembali ke Kasir
                        </a>
                        <a href="<?php echo e(route('cashier.cetak', $transaction->id)); ?>" target="_blank"
                            class="btn btn-secondary d-block mt-2">
                            <i class="bx bx-printer"></i> Cetak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\POS\POS\resources\views/pages/cashier/success.blade.php ENDPATH**/ ?>