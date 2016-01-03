@extends('member.master')
@section ('title', 'Home')
@section ('css')
    <style type="text/css" media="screen">
        .radio_img{
            display: none;
        }

        .label_img img:hover{
            border:1px solid blue;
        }

        /* Modal overlay styling */
        #overlay {
            display: none;
            z-index: 5;
            position: fixed;
            top: 0px;
            left: 0px;
            width:100%;
            height:100%;
        }
        #screen {
            width:100%;
            height:100%;
            background-color: #000;
            opacity: 0.5;
        }
        .dialog {
            z-index: 10;
            display: none;
            position: absolute;
            margin: auto;
            top: 0; right: 0; bottom: 0; left: 0;
            height: 350px;
            width: 500px;
            background-color: #DEF0A5;
            border-radius:10px;
        }

    </style>
@stop

@section ('js')
<script  type="text/javascript" charset="utf-8" async defer>

    // Lấy Dữ liệu options
    var questions = <?php if(isset($questions)) echo json_encode($questions); else echo 'Default'; ?>;
</script>
<script src="{{ asset('auth/js/options.js') }}" type="text/javascript" charset="utf-8" async defer></script>

@stop


@section ('content')
<!-- Content -->

    <div class="col-lg-9 main-chart">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="showback">

                    

                </div>
            </div>

        </div>
    </div>

    

@stop