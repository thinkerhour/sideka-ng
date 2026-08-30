<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>SIDeKa-NG - Kabupaten Bandung Barat</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/user.css')); ?>?v=<?php echo e(time()); ?>">
</head>
<body>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- Custom JS -->
    <script src="<?php echo e(asset('js/user.js')); ?>?v=<?php echo e(time()); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\User\sideka-ng\resources\views/layouts/app.blade.php ENDPATH**/ ?>