<div class="box-body">
	<div class="form-group">
		{!! Form::label('ask', 'Câu Hỏi', ['class' => 'control-label']) !!}
		{!! Form::textarea('ask', null, [ 'id' => 'editor1', 'rows'=>'10', 'cols'=>'80', 'class' => 'form-control', 'placeholder' => 'Điền câu hỏi' ]) !!}
	</div>

    <!-- Tùy Chọn -->
    <div class="form-group">
        <label>Loại tùy chọn</label>
            {!! Form::radio('type', 0, true) !!} Đơn giản
            {!! Form::radio('type', 1) !!} Hình
            <!-- <input type="radio" name="type" value="1" checked="checked" > Đơn giản
            <input type="radio" name="type" value="0" > Hình -->
    </div>

    <div class="form-group input_fields_wrap">
        <label>Tùy Chọn</label><br>
        <button class="btn btn-success add_field_button">Thêm Tùy Chọn</button><br>

    </div>

    <div class="form-group">
        {!! Form::label('rightAnswerNote', 'Chú thích đáp án', ['class' => 'control-label']) !!}
        {!! Form::textarea('rightAnswerNote', null, [ 'id' => 'rightAnswerNote', 'rows'=>'10', 'cols'=>'80', 'class' => 'form-control', 'placeholder' => 'Điền chứ thích câu trả lời đúng' ]) !!}
    </div>

    <div class="form-group">
		{!! Form::label('active', 'Ẩn/Hiện', ['class' => 'control-label']) !!}
		{!! Form::radio('active', 1, true, ['class' => 'minimal']) !!} Hiện
		{!! Form::radio('active', 0,false, ['class' => 'minimal']) !!} Ẩn
	</div>

    <div class="form-group">
        <label>Thuộc Thẻ</label>
        <select name="tag[]" class="form-control select2" multiple="multiple" data-placeholder="Thuộc thẻ" style="width: 100%;">
                <?php
                    if (isset($question)){ // Lấy danh sách tags liên kết trong question
                        $selectTags = DB::table('tags')
                            ->join('questiontag', 'tags.tagID', '=', 'questiontag.tagID')
                            ->join('questions', 'questions.questionID', '=', 'questiontag.questionID')
                            ->where('questions.questionID', '=', "$question->questionID")
                            ->select('tags.tagID')
                            ->distinct()
                            ->get();

                    }

                    $tags = App\Tag::all();

                    foreach ($tags as $tag){
                        $selected = '';
                        if (!empty($selectTags)){

                            foreach ($selectTags as $selectTag){
                                if ($selectTag->tagID == $tag->tagID) {
                                    $selected = 'selected="selected"';
                                    break;
                                }

                            }
                        }
                        echo '<option value="'.$tag->tagID.'" '. $selected .'>'.$tag->title.'</option>';
                    }

                ?>


        </select>
    </div>

	<div class="form-group">
	    <label>Thuộc Thể loại</label>
	    <select name="categoryID" class="form-control select2" style="width: 100%;">
          @foreach ($categories as $category)
          	<option value="{{ $category->categoryID }}" {{ (isset($question->categoryID) && $question->categoryID==$category->categoryID)? 'selected="selected"':'' }}>{{ $category->title }}</option>
          @endforeach
        </select>
	</div>


</div>
<div class="box-footer">
	{!! Form::submit($submit, ['class' => 'btn btn-primary']) !!}
</div>



@section ('css')
	<!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
    <style type="text/css">
        .option{
            margin:5px 0;
            width:50%;
            border: 1px solid #d2d6de;
            height:30px;
            padding:5px;
        }
    </style>
@stop

@section ('js')
	<!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>

    <!-- CK Editor -->
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>

    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

      });


		// Autoload Image
		var loadFile = function(event) {
		    var reader = new FileReader();
		    reader.onload = function(){
		      var output = document.getElementById('output');
		      output.src = reader.result;
		    };
		    reader.readAsDataURL(event.target.files[0]);
		};

        // Tạo cdkeditor
        CKEDITOR.replace('editor1');


    </script>


    <!-- // Tùy chọn -->
    <?php
    // Lấy mảng rightAnswer trùng với option
        if(isset($question)){
            $valueOption = explode('--', $question->option);
            $rightAnswer = explode('--', $question->rightAnswer);
            $connect = array_intersect($valueOption, $rightAnswer);
        }
    ?>
    <script>
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        if(pgurl == 'edit'){
            var valueOption = "{!! $question->option or 'Default' !!}"; // Gán giá trị opiton (array)
            var rightAnswer = <?php if(isset($connect)) echo json_encode($connect); else echo 'Default'; ?>; // Gán giá trị rightAnswer (json)
        }
    </script>
    <script src="{{ asset('assets/js/options.js') }}" type="text/javascript" charset="utf-8" async defer></script>

@stop