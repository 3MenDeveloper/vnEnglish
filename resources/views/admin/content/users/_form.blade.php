<div class="box-body">
    <div class="form-group">
        {!! Form::label('name', 'Tên Thành Viên', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, [ 'id' => 'name', 'class' => 'form-control', 'placeholder' => 'Điền tên thành viên' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
        {!! Form::text('email', null, [ 'id' => 'email', 'class' => 'form-control', 'placeholder' => 'Điền email' ]) !!}
    </div>
    <!-- Password -->
    <a title="" class="addpass btn btn-success">{{ $submit }} Mật Khẩu</a>
    <a href="#ramdum" data-toggle="modal" title="" class="password btn btn-warning">Ngẫu nhiên</a>
    <div class="form-group password">
        {!! Form::label('password', 'Mật khẩu', ['class' => 'control-label']) !!}
        {!! Form::password('password', [ 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Điền mật khẩu' ]) !!}
    </div>
    <div class="form-group password">
        {!! Form::label('password_confirmation', 'Điền Lại Mật khẩu', ['class' => 'control-label']) !!}
        {!! Form::password('password_confirmation', [ 'id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Điền mật khẩu' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('userExp', 'Điểm kinh nghiệm', ['class' => 'control-label']) !!}
        {!! Form::text('userExp', null, [ 'id' => 'userExp', 'class' => 'form-control', 'placeholder' => 'Điền số điểm kinh nghiệm User mới có thể mở' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('genger', 'Giới tính', ['class' => 'control-label']) !!}
        {!! Form::radio('genger', 1, true) !!} Nam
        {!! Form::radio('genger', 0,false) !!} Nữ
    </div>
    <div class="form-group">
        {!! Form::label('active', 'Ẩn/Hiện', ['class' => 'control-label']) !!}
        {!! Form::radio('active', 1, true) !!} Hiện
        {!! Form::radio('active', 0,false) !!} Ẩn
    </div>
    <div class="form-group">
        {!! Form::label('role', 'Quyền', ['class' => 'control-label']) !!}
        {!! Form::select('role', ['2' => 'Thành Viên', '1' => 'Quản trị'], null, ['class' => 'form-control select2']) !!}
    </div>
</div>
<div class="box-footer">
    {!! Form::submit($submit, ['class' => 'btn btn-primary']) !!}
</div>


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
                        <label for="ngaunhien" class="col-sm-2 control-label">Password:</label>
                        <input type="text" name="ngaunhien" id="ngaunhien" value="" class="form-control">
                    </div>
				</div>
				<div class="modal-footer">
					<input type="button" name="generate" id="generatePassword" value="Generate Password" class="btn btn-danger">
	                <input type="button" name="addPass" id="addPass" value="Chọn" class="btn btn-success" data-dismiss="modal">
				</div>
			</form>
		</div>
	</div>
</div>


@section ('js')
<script src="{{ asset('assets/js/strongpassword.js') }}" type="text/javascript" charset="utf-8" async defer></script>
<script>
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
    });

    // Lấy giá trị password ngẫu nhiên
    $('#addPass').click( function() {
        var val = $('#ngaunhien').val();
        $('input[type=password]').val(val);
    });


</script>
@endsection

@section ('css')
<style type="text/css" media="screen">
	.sauron {
	position : absolute;
	cursor : pointer;
	display : block;
	background-image : url('/assets/img/sauron.svg');
	background-size : cover;
}

.sauron-show {
	background-image : url('/assets/img/sauron_inverted.svg');
}
</style>

@endsection