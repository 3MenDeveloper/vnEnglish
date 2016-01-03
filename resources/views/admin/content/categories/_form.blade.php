<div class="box-body">
	<div class="form-group">
		{!! Form::label('title', 'Tên Kĩ Năng', ['class' => 'control-label']) !!}
		{!! Form::text('title', null, [ 'id' => 'title', 'class' => 'form-control', 'placeholder' => 'Điền tên kĩ năng' ]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('exp', 'Điểm kinh nghiệm', ['class' => 'control-label']) !!}
		{!! Form::text('exp', null, [ 'id' => 'exp', 'class' => 'form-control', 'placeholder' => 'Điền số điểm kinh nghiệm User mới có thể mở' ]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('image', 'Hình Ảnh', ['class' => 'control-label']) !!}
		{!! Form::file('image', [ 'id' => 'image', 'onchange' => 'loadFile(event)' ]) !!}

		<img src="{{ isset($category->image) ? '/upload/categories/'.$category->image : null }}" alt="" id="output" class="thumbnail" style="width:200px">
	</div>
</div>
<div class="box-footer">
	{!! Form::submit($submit, ['class' => 'btn btn-primary']) !!}
</div>

@section('js')
	<script type="text/javascript">
		var loadFile = function(event) {
		    var reader = new FileReader();
		    reader.onload = function(){
		      var output = document.getElementById('output');
		      output.src = reader.result;
		    };
		    reader.readAsDataURL(event.target.files[0]);
		};
	</script>
@stop