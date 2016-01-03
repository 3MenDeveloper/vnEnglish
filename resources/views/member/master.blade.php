<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="3WedDeveloper">
    <meta name="keyword" content="học tiếng anh, tiếng anh online, learn english, english study">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('auth/css/bootstrap.css') }}">
    <!--external css-->
    <link rel="stylesheet" href="{{ asset('auth/font-awesome/css/font-awesome.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/style-responsive.css') }}">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/js/gritter/css/jquery.gritter.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/lineicons/style.css') }}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/style-responsive.css') }}">

    <style type="text/css">
      .showback{
          border-radius: 10px
      }
      .answers{
        max-height: 100px;
        min-height: 40px;
        font-family: tahoma;
      }
      .ans{
          padding-top:25px;
      }
      .sp-title{
        font-family: tahoma;
      }
      .wrapper{
        min-height: 575px;
      }

    </style>

    @yield('css')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <section id="container">

        <!--header start-->
        @include('member.partials.header')
        <!--header end-->

        <!--sidebar start-->
        @include('member.partials.sidebar')
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
          <section class="wrapper">
            @yield('content')
            @include('member.partials.rsidebar')
          </section>
        </section>
        <!--main content end-->

        <!--footer start-->
        @include('member.partials.footer')
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('auth/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('auth/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('auth/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('auth/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('auth/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('auth/js/jquery.nicescroll.js') }}" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="{{ asset('auth/js/common-scripts.js') }}"></script>

    <!--script for this page-->
    <script type="text/javascript" src="{{ asset('auth/js/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('auth/js/gritter-conf.js') }}"></script>
    <!--script for this page-->
    @if (Session::has('success'))
      <script type="text/javascript">

              $(document).ready(function () {
                  var unique_id = $.gritter.add({
                          // (string | mandatory) the heading of the notification
                          title: 'Xin chào <?php echo Auth::user()->name ?>!',
                          // (string | mandatory) the text inside the notification
                          text: 'Chào mừng bạn đến với website học Tiếng Anh Online <a href="vnenglish.com" target="_blank" style="color:#ffd777">vnenglish.com</a>. Chúc bạn có khoảng thời gian học tập vui vẻ.',
                          // (string | optional) the image to display on the left
                          image: '{{ (Auth::user()->avatar)? "/upload/avatar/". Auth::user()->avatar : "/auth/img/avatar.png" }}',
                          // (bool | optional) if you want it to fade out on its own or just sit there
                          sticky: true,
                          // (int | optional) the time you want it to be alive for before fading out
                          time: '',
                          // (string | optional) the class name you want to apply to that specific message
                          class_name: 'my-sticky-class'
                      });
                  if(typeof expires == undefined){

                      setCookie(1);
                      function setCookie(exdays) {
                          var d = new Date();
                          d.setTime(d.getTime() + (exdays*24));
                          var expires = "expires="+d.toUTCString();
                          document.cookie = 'expires=expires;' + expires;
                      }
                  }

                  return false;
              });
      </script>
      <?php Session::forget('success'); ?>
    @endif

    @yield('js')

  </body>
</html>
