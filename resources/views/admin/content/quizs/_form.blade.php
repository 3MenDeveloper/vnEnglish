<div class="box-body">
	<div class="form-group">
		{!! Form::label('title', 'Tên Trắc Nghiệm', ['class' => 'control-label']) !!}
		{!! Form::text('title', null, [ 'id' => 'title', 'class' => 'form-control', 'placeholder' => 'Điền tên trắc nghiệm' ]) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Mật khẩu', ['class' => 'control-label']) !!}
		{!! Form::password('password', [ 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Điền mật khẩu' ]) !!}
	</div>

	<div class="form-group">
		{!! Form::label('duration', 'Thời gian (tính bằng giây)', ['class' => 'control-label']) !!}
		<div class="input-group">
	      	<div class="input-group-addon">
	        	<i class="fa fa-clock-o"></i>
	      	</div>
	      {!! Form::text('duration', null, [ 'id' => 'duration', 'class' => 'form-control', 'placeholder' => 'Điền số thời gian (giây)' ]) !!}
	    </div>
    </div>

    <div class="form-group">
		{!! Form::label('active', 'Ẩn/Hiện', ['class' => 'control-label']) !!}
		{!! Form::radio('active', 1, true, ['class' => 'minimal']) !!} Hiện
		{!! Form::radio('active', 0,false, ['class' => 'minimal']) !!} Ẩn
	</div>

	<div class="form-group">
	    <label>Thuộc Thể loại</label>
	    <select name="categoryID" class="form-control select2" style="width: 100%;">
          @foreach ($categories as $category)
          	<option value="{{ $category->categoryID }}" {{ (isset($quiz->categoryID) && $category->categoryID==$quiz->categoryID)? 'selected="selected"':'' }}>{{ $category->title }}</option>
          @endforeach
        </select>
	</div>

    <div class="form-group">
		{!! Form::label('image', 'Hình Ảnh', ['class' => 'control-label']) !!}
		{!! Form::file('image', [ 'id' => 'image', 'onchange' => 'loadFile(event)' ]) !!}

		<img src="{{ isset($quiz->image) ? '/upload/quizs/'.$quiz->image : null }}" alt="" id="output" class="thumbnail" style="width:200px">
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
@stop

@section ('js')
	<!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

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

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
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
    </script>
@stop