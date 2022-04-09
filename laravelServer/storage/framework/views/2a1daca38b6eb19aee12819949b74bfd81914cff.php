<!doctype html>
<html lang="<?php echo e(str_replace('_','-',app()->getLocale())); ?>">
<head>
    <title>سامانه کاریابی در گردشگری - کاراول</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="theme-color" content="#4281f5" />

    <meta name="theme-color" content="#4281f5">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#4281f5">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#4281f5">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/jpg" href="/images/karavel-ico.jpg" />
    <base href="<?php echo e(url('/')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body id="p2" class="rtl">

<div id="app">
    <notifications-app></notifications-app>
    <router-view></router-view>
</div>
<script>
    window.Laravel = {};
    window.Laravel.Auth = ('<?php echo e(Auth::check()); ?>' !== '');
    window.Laravel.csrfToken = '<?php echo e(csrf_token()); ?>';
</script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>


</body>
</html>
<?php /**PATH E:\job\resources\views/layout.blade.php ENDPATH**/ ?>