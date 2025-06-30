<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @media print {
            @page {
                margin: 0;
                size: 58mm auto;
            }

            body {
                margin: 0;
                padding: 5px;
                font-size: 10px;
                width: 100%;
            }

            .logo img {
                max-width: 100px;
            }

            p {
                font-size: 10px;
                margin: 0;
                padding: 0;
            }

            .row {
                display: flex;
                justify-content: space-between;
                width: 100%;
            }

            hr {
                border: 1px dashed black;
            }
        }

        body {
            font-family: Arial, sans-serif;
        }

        .logo {
            text-align: center;
        }

        .details {
            margin-top: 10px;
        }

        .d-flex {
            display: flex;
            justify-content: space-between;
        }

        .text-right {
            text-align: right;
        }

        .fw-semibold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="<?php echo e(url('assets/images/logo.png')); ?>" alt="Logo">
        <p>JagoPos</p>
    </div>

    <p class=" text-uppercase fw-semibold">Detail Produk</p>

    <?php
        $subtotal = 0;
    ?>
    <?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="details">
            <div class="row">
                <div class="left">
                    <p class="fw-semibold"><?php echo e($item->menu->name); ?></p>
                    <p class="">Rp. <?php echo e(number_format($item->price)); ?></p>
                </div>
                <div class="right text-right">
                    <p class="fw-semibold">Rp. <?php echo e(number_format($item->price * $item->quantity)); ?></p>
                    <p class=""><?php echo e($item->quantity); ?>x</p>
                </div>
            </div>
            <?php
                $subtotal += $item->price * $item->quantity;
            ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <hr>

    <div class="d-flex">
        <p class="">Subtotal</p>
        <p class="fw-semibold">Rp. <?php echo e(number_format($subtotal)); ?></p>
    </div>
    <div class="d-flex">
        <p class="">Pajak</p>
        <p class="fw-semibold">Rp. 12,000</p>
    </div>
    <div class="d-flex">
        <p class="">Total</p>
        <p class="fw-semibold">Rp. <?php echo e(number_format($transaction->total)); ?></p>
    </div>

    <hr>

    <div class="d-flex">
        <p class="">Cash</p>
        <p class="fw-semibold">Rp. <?php echo e(number_format($transaction->pay)); ?></p>
    </div>
    <div class="d-flex">
        <p class="">Kembali</p>
        <p class="fw-semibold">Rp. <?php echo e(number_format($transaction->return)); ?></p>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\POS\resources\views/pages/cashier/print.blade.php ENDPATH**/ ?>