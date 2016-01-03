<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VnEnglish</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/freelancer.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    @include('intro.nav')

    <!-- Header -->
    @include('intro.header')

    <!-- Portfolio Grid Section -->
    @include('intro.section')

    <!-- Footer -->
    @include('intro.footer')



    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{ asset('assets/js/classie.js') }}"></script>
    <script src="{{ asset('assets/js/cbpAnimatedHeader.js') }}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{ asset('assets/js/jqBootstrapValidation.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/js/freelancer.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // login


            $("#login").submit(function(event) {
                event.preventDefault();


                // Ajax send form
                var $form = $( this ),
                term = {
                    '_token' : $form.find( "input[name='_token']" ).val(),
                    'email' : $form.find( "input[name='email']" ).val(),
                    'password' : $form.find( "input[name='password']" ).val(),
                };

                // Send the data using post
                var posting = $.post( "/auth/login", term );

                // Put the results in a div
                posting.done(function( data ) {
                    window.location = 'home';
                });
                posting.fail(function() {
                    $('.alert').remove();
                    $(".modal-body").prepend('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Lỗi! Email hoặc password không đúng</strong></div>');
                });

            });
        });


            $("#register").submit(function(event) {

                var errMessage = "";
                $("#register").find(".text-danger").remove();
                // Check Name
                if($("#register input[name='name']").val().length === 0) {
                    errMessage = "<div class='text-danger'>Tên không được bỏ trống!</div>";
                    $("#register input[name='name']").after(errMessage);
                } else {
                    if ($("#register input[name='name']").val().length < 6) {
                        errMessage = "<div class='text-danger'>Tên nhập vào không phù hợp!</div>";
                        $("#register input[name='name']").after(errMessage);
                    }
                }

                // Check Email
                if($("#register input[name='email']").val().length === 0) {
                    errMessage = "<div class='text-danger'>Email không được bỏ trống!</div>";
                    $("#register input[name='email']").after(errMessage);
                } else {
                    var patt = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
                    if (!patt.test($("#register input[name='email']").val())) {
                        errMessage = "<div class='text-danger'>Email nhập vào không phù hợp!</div>";
                        $("#register input[name='email']").after(errMessage);
                    }
                }

                // Check  Password
                if($("#register input[name='password']").val().length === 0) {
                    errMessage = "<div class='text-danger'>Mật khẩu không được bỏ trống!</div>";
                    $("#register input[name='password']").after(errMessage);
                } else {
                    var patt = /^[a-zA-Z]\w{7,31}$/; // password bắt đầu bởi chữ cái, theo sau là kí tự, số hoặc dấu '_'
                    if (!patt.test($("#register input[name='password']").val())) {
                        errMessage = "<div class='text-danger'>Mật khẩu nhập vào không phù hợp!<br />Password ít nhất 8 kí tự, bao gồm (chữ, số, _) bắt đầu phải là kí tự chữ!</div>";
                        $("#register input[name='password']").after(errMessage);
                    }
                }

                // Check confirm password
                if($("#register input[name='password_confirmation']").val().length === 0) {
                    errMessage = "<div class='text-danger'>Mật khẩu nhập lại không được bỏ trống!</div>";
                    $("#register input[name='password_confirmation']").after(errMessage);
                } else {
                        if ($("#register input[name='password_confirmation']").val() !== $("#register input[name='password']").val()) {
                            errMessage = "<div class='text-danger'>Mật khẩu nhập vào không khớp!</div>";
                            $("#register input[name='password_confirmation']").after(errMessage);
                        }
                }

                if(errMessage){
                    event.preventDefault();
                }

            });

    </script>

</body>

</html>