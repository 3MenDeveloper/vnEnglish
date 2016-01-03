@extends('member.master')
@section ('title', 'Home')
@section ('js')
<script src="{{ asset('assets/js/strongpassword.js') }}" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript">
$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Randum password
    $('document').ready(function(){
        $('.password').hide();
            $('.addpass').on('click', function(){
            $('.password').toggle('slow');
        });
    });

    // Ranger Process pass
    function printValue(sliderID, textbox) {
        var x = document.getElementById(textbox);
        var y = document.getElementById(sliderID);
        x.value = y.value;
    }
    window.onload = function() { printValue('slider1', 'pass-len');}

    // Gọi password ngẫu nhiên
    $('#generatePassword').on('click', function(){
      $('#ngaunhien').strongPassword();
      $('#ngaunhien').parent().append('<h5 class="text-danger">Lưu mật khẩu ra bên ngoài trước khi bấm chọn.</h5>');
    });

    // Lấy giá trị password ngẫu nhiên
    $('#addPass').click( function() {
        var val = $('#ngaunhien').val();
        $('input[type=password]').val(val);
    });



    // Validation and Ajax Form
    $("#updateinfo").submit(function(event) {
        event.preventDefault();
        // Ajax send form
        var $form = $( this );
        term = {
            '_token' : $form.find( "input[name='_token']" ).val(),
            'name' : $form.find( "input[name='name']" ).val(),
            'email' : $form.find( "input[name='email']" ).val(),
            'gender' : $form.find( "input[name='gender']" ).val(),
            'dateOfBirth' : $form.find( "input[name='dateOfBirth']" ).val(),
            'placeOfBirth' : $form.find( "input[name='placeOfBirth']" ).val(),

        };
        if($form.find( "input[name='password']" ).val()){
            term.password = $form.find( "input[name='password']" ).val();
        }
        // Send the data using post
        var posting = $.post( "/member/info", term );
        // Put the results in a div
        posting.done(function( data ) {
            if (data == 'success') {
                window.location.reload();
            } else {
                var output = '';
                output += '<div class="alert alert-success">';
                    output += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    output += '<strong>Cập nhật thất bại! Vui lòng cung cấp thông tin đầy đủ!!!</strong>';
                output += '</div>';
                $(".alert").remove();
                $(".modal-body").prepend(output);
            }
            //alert(data);
        });
        posting.fail(function(error) {
            // alert(error.responseJSON);
            $('.alert').remove();
            jQuery.each(error.responseJSON, function(key, value) {
                // console.log(value);
                $(".modal-body").prepend('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error! ' +value+ '</strong></div>');
            });
            //console.log(data);
        });
    });


    // Change Avatar
    $('.changeAvatar').hover(function() {
        $(this).children('img').fadeTo(500,0.2);
        $(this).css({
            'background-image': "url('/auth/img/capture.png')",
            'background-position': 'center',
            'background-repeat': 'no-repeat',
            'background-size': '80px'
        });
    }, function() {
        $(this).children('img').fadeTo(500,1);
    });

    $('.changeAvatar').children('img').click(function(){
        $('#avatarchange').modal();
    });

    $('.choiceAvatar').click(function(event) {
        var image = $(this).attr('src');
        $('#avatar').attr('src', image);

        $('.choiceAvatar').parent().removeAttr('style');
        $(this).parent().css('border', '1px solid blue');
    });

    // Đông ý thay đổi avatar
    $("#thaydoi").click(function(event) {
        image = $('#avatar').attr('src');
        image = image.substr(image.lastIndexOf('/')+1);

        // Ajax
        term = {
            'avatar': image
        };
        posting = $.post( "/member/info/avatar", term );
        posting.done(function(data){
            if (data == 'success') {
                window.location.reload();
            } else {
                var output = '';
                output += '<div class="alert alert-success">';
                    output += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    output += '<strong>Cập nhật thất bại! Vui lòng cung cấp thông tin đầy đủ!!!</strong>';
                output += '</div>';
                $("#avatarchange .modal-body").prepend(output);
            }
        });
    });

});
</script>
@stop
@section ('content')
<!-- Content -->
<div class="col-lg-9 main-chart">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="showback">
                <div class="row centered">
                    <div class="changeAvatar">
                        @if (Auth::user()->avatar)
                            <img src="/upload/avatar/{{ Auth::user()->avatar }}" class="img-circle" width="150">
                        @else
                            <img src="/auth/img/avatar.png" class="img-circle" width="150">
                        @endif
                    </div>
                        <h3>{{ Auth::user()->name }}</h3>
                        <p>{{ Auth::user()->email }}</p>
                        <h3>{{ Auth::user()->userExp }} Exp</h3>
                        <h3>Level {{ Auth::user()->userLevel }}</h3>
                    @if(Auth::user()->genger == 1)
                        <p>Nam</p>
                    @else
                        <p>Nữ</p>
                    @endif
                        <p>{{ Auth::user()->dateOfBirth }}</p>
                        <p>{{ Auth::user()->placeOfBirth }}</p>

                <a class="btn btn-primary" data-toggle="modal" href='#changeinfo'>Chỉnh Sửa Thông Tin</a>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Change Info -->
<div class="modal fade" id="changeinfo">
    <div class="modal-dialog">
        <div class="modal-content">

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(isset($success))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Success!</strong> Cập nhật thành công ...
            </div>
            @endif

            <form id="updateinfo" action="" method="POST" role="form">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Sửa</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input name="name" type="text" class="form-control" id="" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input readonly="readonly" name="email" type="text" class="form-control" id="" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Giới Tính</label>
                        <!-- <input name="gender" type="radio" class="form-control" id="" value="{{ Auth::user()->genger }}"> -->
                        <input type="radio" name="gender" value="1" placeholder="Nam" {{ (Auth::user()->genger == 1) ? 'checked' : '' }}> Nam
                        <input type="radio" name="gender" value="0" placeholder="Nữ" {{ (Auth::user()->genger == 0) ? 'checked' : '' }}> Nữ
                    </div>
                    <div class="form-group">
                        <label for="">Ngày Sinh (yyy-mm-dd)</label>
                        <input name="dateOfBirth" type="text" class="form-control" id="" value="{{ Auth::user()->dateOfBirth }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nơi Sinh</label>
                        <input name="placeOfBirth" type="text" class="form-control" id="" value="{{ Auth::user()->placeOfBirth }}" />
                    </div>
                    <a title="" class="addpass btn btn-success">Mật Khẩu</a>
                    <a href="#ramdum" data-toggle="modal" title="" class="password btn btn-warning">Ngẫu Nhiên</a>
                    <div class="form-group password">
                        {!! Form::label('password', 'Mật khẩu', ['class' => 'control-label']) !!}
                        {!! Form::password('password', [ 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Điền mật khẩu' ]) !!}
                    </div>
                    <div class="form-group password">
                        {!! Form::label('password_confirmation', 'Điền Lại Mật khẩu', ['class' => 'control-label']) !!}
                        {!! Form::password('password_confirmation', [ 'id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Điền mật khẩu' ]) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Đổi mật khẩu -->
<div class="modal fade" id="ramdum">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Đặt Password Ngẫu Nhiên</h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pass-len" class="col-sm-2 control-label">Độ Dài: </label>
                        <input id="slider1" type="range" min="8" max="20" step="1" onchange="printValue('slider1','pass-len')">
                        <input type="number" name="len" id="pass-len" value="8" class="form-control">
                    </div>
                    <div class="form-group">
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapsepassword" aria-expanded="false" aria-controls="collapsepassword">Nâng Cao</a>
                    </div>
                    <div id="collapsepassword" class="form-group collapse">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="digits" id="pass-digits" checked> Thêm số
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="symbol" id="pass-symbols" checked> Thêm kí tự đặc biệt
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="similar" id="pass-lower" checked> Thêm chữ viết thường ( abcde )
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="upper" id="pass-upper" checked> Thêm chữ viết hoa ( ABCDE )
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="similar" id="pass-similar"> Tránh kí tự giống nhau (1, i, I, l, L, !, |), and (0, o, O)
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ngaunhien" class="col-sm-2 control-label">Mật khẩu:</label>
                        <input type="text" name="ngaunhien" id="ngaunhien" value="" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" name="generate" id="generatePassword" value="Tạo Mật Khẩu" class="btn btn-danger">
                    <input type="button" name="addPass" id="addPass" value="Chọn" class="btn btn-success" data-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Change Avatar -->

<div class="modal fade bs-example-modal-lg" id="avatarchange">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Sửa Ảnh</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="centered">
                        <img id="avatar" width="215" src="/upload/avatar/{{ (Auth::user()->avatar)? Auth::user()->avatar : 'noavatar.png' }}" alt="">
                    </div>
                    <div style="margin-top:50px; height:150px;background: #F5F5F5; overflow-y: scroll;">
                        <div style="margin-top:10px">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <a href="#" class="thumbnail">
                                    <img class="choiceAvatar" src="{{ asset('upload/avatar/avatar.png') }}" alt="" width="100">
                                </a>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <a href="#" class="thumbnail">
                                    <img class="choiceAvatar" src="{{ asset('upload/avatar/avatar2.png') }}" alt="" width="100">
                                </a>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <a href="#" class="thumbnail">
                                    <img class="choiceAvatar" src="{{ asset('upload/avatar/avatar3.png') }}" alt="" width="100">
                                </a>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <a href="#" class="thumbnail">
                                    <img class="choiceAvatar" src="{{ asset('upload/avatar/avatar4.png') }}" alt="" width="100">
                                </a>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <a href="#" class="thumbnail">
                                    <img class="choiceAvatar" src="{{ asset('upload/avatar/avatar5.png') }}" alt="" width="100">
                                </a>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <a href="#" class="thumbnail">
                                    <img class="choiceAvatar" src="{{ asset('upload/avatar/noavatar.png') }}" alt="" width="100">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button id="thaydoi" type="button" class="btn btn-primary">Thay Đổi</button>
            </div>
        </div>
    </div>
</div>


@stop