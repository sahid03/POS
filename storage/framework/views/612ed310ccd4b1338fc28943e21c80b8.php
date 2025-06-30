<div>
    <div class="row g-4">
        <div class="col-md-7">
            <h2 class="text-dark fw-bold mb-4">Kasir</h2>

            <ul class="nav nav-pills gap-1 pb-3 mb-4 border-bottom">
                <li class="nav-item">
                    <a class="nav-link <?php echo e($category == 'Semua' ? 'active' : ''); ?>" role="button"
                        wire:click="filter('Semua')">Semua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($category == 'Makanan' ? 'active' : ''); ?>" role="button"
                        wire:click="filter('Makanan')">Makanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($category == 'Minuman' ? 'active' : ''); ?>" role="button"
                        wire:click="filter('Minuman')">Minuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($category == 'Snack' ? 'active' : ''); ?>" role="button"
                        wire:click="filter('Snack')">Snack</a>
                </li>
            </ul>

            <div class="row g-3">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-lg-4">
                        <div class="card" style="cursor: pointer;" wire:click="addToCart(<?php echo e($item->id); ?>)">
                            <div class="card-body p-4">
                                <img src="<?php echo e(url('storage/' . $item->image)); ?>" class="w-75 d-block mx-auto"
                                    alt="Dish 01">
                                <h4 class="card-title mt-4 mb-2"><?php echo e($item->name); ?></h4>
                                <div
                                    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-1">
                                    <p class="mb-0 text-secondary fs-7"><?php echo e($item->category); ?></p>
                                    <p class="mb-0 text-primary fw-semibold">Rp. <?php echo e(number_format($item->price)); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
        <div class="col-md-5">
            <div class="card border-0">
                <div class="card-body px-4">
                    <h4 class="text-dark fw-semibold mb-3">Order #003</h4>

                    <!--[if BLOCK]><![endif]--><?php if($transaction != null): ?>
                        <?php
                            $subtotal = 0;
                        ?>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row align-items-center g-3 mt-3">
                                <div class="col-3 col-lg-2">
                                    <img src="<?php echo e(url('storage/' . $item->menu->image)); ?>" alt=""
                                        class="rounded-2">
                                </div>
                                <div class="col-9 col-lg-4">
                                    <p class="mb-0 fw-semibold text-dark"><?php echo e($item->menu->name); ?></p>
                                    <p class="mb-0 fw-semibold text-secondary fs-7">
                                        Rp. <?php echo e(number_format($item->menu->price)); ?>

                                    </p>
                                </div>
                                <div class="col-4 col-lg-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn btn-sm btn-quantity rounded-circle"
                                            wire:click="quantity_minus(<?php echo e($item->id); ?>)">
                                            <i class="bx bx-minus"></i>
                                        </button>
                                        <p class="mb-0 text-dark">
                                            <?php echo e($item->quantity); ?>

                                        </p>
                                        <button class="btn btn-sm btn-quantity rounded-circle"
                                            wire:click="addToCart(<?php echo e($item->menu->id); ?>)">
                                            <i class="bx bx-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <p class="mb-0 text-dark fw-bold text-end">Rp.
                                        <?php echo e(number_format($item->price * $item->quantity)); ?></p>
                                </div>
                                <div class="col-2 col-lg-1">
                                    <button class="btn btn-sm btn-light btn-delete" type="button"
                                        wire:click="delete_detail(<?php echo e($item->id); ?>)">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <?php
                                $price = $item->price * $item->quantity;
                                $subtotal += $price;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                        <hr class="mt-5 mb-4">

                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p class="mb-0 text-secondary">Subtotal</p>
                            <p class="mb-0 text-dark fw-bold">Rp. <?php echo e(number_format($subtotal)); ?></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 text-secondary">Pajak</p>
                            <p class="mb-0 text-dark fw-bold">Rp. 12,000</p>
                        </div>

                        <hr class="my-4" style="border-style: dashed;">

                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <p class="mb-0 text-secondary">Total</p>
                            <p class="mb-0 text-dark fw-bold fs-5">Rp. <?php echo e(number_format($subtotal + 12000)); ?></p>
                        </div>

                        <button class="btn btn-primary rounded-3 d-block py-3 w-100" type="button"
                            data-bs-toggle="modal" data-bs-target="#checkoutModal">
                            Checkout
                        </button>
                    <?php else: ?>
                        <p class="text-secondary">Belum ada menu yang dipilih</p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>

        <!--[if BLOCK]><![endif]--><?php if($transaction != null): ?>
            <div class="modal fade" id="checkoutModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title">Checkout</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit="checkout" method="post">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="customer_name"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="name"
                                        wire:model="customer_name">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="nominalInput">Rp.</span>
                                    <input type="text" class="form-control" wire:model="pay">
                                </div>
                                <p class="mb-3"><?php echo e($alert); ?></p>

                                <button class="btn btn-primary w-100" type="submit">Proses</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH D:\ONLENKAN\WEBINAR\04 Laravel 11 Livewire POS\POS\resources\views/livewire/cashier.blade.php ENDPATH**/ ?>