<div class="box-body">
	<div class="form-group">
		{!! Form::label('title', 'Tên Thẻ', ['class' => 'control-label']) !!}
		{!! Form::text('title', null, [ 'id' => 'title', 'class' => 'form-control', 'placeholder' => 'Điền tên kĩ năng' ]) !!}
	</div>

	<div class="form-group">
	    <label>Thuộc bài trắc nghiệm</label>
	    <select name="quizID" class="form-control select2" style="width: 100%;">
          @foreach ($quizs as $quiz)
          	<option value="{{ $quiz->quizID }}" {{ (isset($tag->quizID) && $tag->quizID==$quiz->quizID)? 'selected="selected"':'' }}>{{ $quiz->title }}</option>
          @endforeach
        </select>
	</div>
</div>
<div class="box-footer">
	{!! Form::submit($submit, ['class' => 'btn btn-primary']) !!}
</div>