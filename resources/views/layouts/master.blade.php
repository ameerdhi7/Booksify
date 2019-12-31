<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booksify</title>
    <link rel="stylesheet" href="/css/material-kit.min.css">
    <!-- helper.css is a additional css classes such as colors -->
    <link rel="stylesheet" href="/css/helper.css">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- icon for title bar-->

    <link rel="shortcut icon" href="/images/1.png"/>
</head>
@auth("admin")@include("layouts.nav")
@endauth
<body class="bg-light vector">
<div class="container">
@yield("content")
</div>

<!-- =======   JS Files for material kit============  -->
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/popper.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap-material-design.js" type="text/javascript"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/js/jasny-bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/material-kit.js?v=2.1.1" type="text/javascript"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    @yield("scripts")
</body>
</html>
