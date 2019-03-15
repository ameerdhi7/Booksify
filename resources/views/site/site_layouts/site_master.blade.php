<!--========= master layouts for home =========-->
<!doctype html>
<html lang="en" class=" h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booksify</title>
    <!-- =======   material-kit.min.css is a minify bootsrap 4 material design ========  -->
    <link rel="stylesheet" href="/css/material-kit.min.css">
    <!-- =======   helper.css is a additional css classes i collected ============  -->
    <link rel="stylesheet" href="/css/helper.css">
    <!-- =======    Fonts and icons   =========  -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="shortcut icon" href="/images/1.png"/>
    <!-- ======= wow css for animation ======== -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- ======== wow js =========-->
    <script src="js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
</head>
@include("site.site_layouts.site_nav")
<body class="bg-dark  vector3 h-100">
<div class="rgba-black-strong  rgba">
@yield("content")
<!-- =======   JS Files for  material kit ============  -->
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/popper.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap-material-design.js" type="text/javascript"></script>
    <script src="/js/nouislider.min.js" type="text/javascript"></script>
    {{--<script src="/js/bootstrap-tagsinput.js"></script>--}}
    <script src="/js/jasny-bootstrap.min.js" type="text/javascript"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="/js/material-kit.js?v=2.1.1" type="text/javascript"></script>
    <!--  ==========  vue and axios ===========  -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @yield("scripts")

</div>
</body>
</html>