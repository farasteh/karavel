
<!doctype html>
<html lang="<?php echo e(str_replace('_','-',app()->getLocale())); ?>">
<head>
    <title>استخدام آژانس هواپیمایی و مسافرتی - کاراول</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="theme-color" content="#4281f5" />

    <meta name="theme-color" content="#4281f5">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#4281f5">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#4281f5">



    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/jpg" href="/images/karavel-ico.jpg" />
    <base href="<?php echo e(url('/')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <script>
        !function (t, e, n) {
            t.yektanetAnalyticsObject = n, t[n] = t[n] || function () {
                t[n].q.push(arguments)
            }, t[n].q = t[n].q || [];
            var a = new Date, r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(),
                c = e.getElementsByTagName("script")[0], s = e.createElement("script");
            s.id = "ua-script-nczo4y1y"; s.dataset.analyticsobject = n;
            s.async = 1; s.type = "text/javascript";
            s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v3/nczo4y1y/rg.complete.js?v=" + r, c.parentNode.insertBefore(s, c)
        }(window, document, "yektanet");
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y547467TVF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-Y547467TVF');
    </script>

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
<?php /**PATH /home/karaveli/laravelServer/resources/views/layout.blade.php ENDPATH**/ ?>