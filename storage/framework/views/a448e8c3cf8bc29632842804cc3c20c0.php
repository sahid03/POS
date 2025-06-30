<?php $__env->startSection('content'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cashier', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2072993348-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cashier', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ONLENKAN\WEBINAR\04 Laravel 11 Livewire POS\POS\resources\views/pages/cashier/dashboard.blade.php ENDPATH**/ ?>