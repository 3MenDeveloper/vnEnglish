@extends('admin.home')

@section('title', 'Cập nhật Câu hỏi')

@section('content')
	<!-- Nội dung content -->
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>Câu Hỏi (Questions)</h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li><a href="#">Forms</a></li>
	    <li class="active">Questions</li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content">
	  <div class="row">
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Câu Hỏi</h3>
	        </div><!-- /.box-header -->

			@if(isset($success))
	          	<div class="alert alert-success">
	          		<p>{!! $success !!}</p>
	          	</div>
	        @endif

	        @if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
	        <!-- form start -->

	        {!! Form::model($question, [
					'route' => ['admin::admin.questions.update', $question->questionID],
					'method' => 'PUT',
					'files' => 'true'
				]);
			!!}

					@include('admin.content.questions._form', ['submit' => 'Cập Nhật'])

			{!! Form::close() !!}

	      </div><!-- /.box -->

	    </div><!--/.col (left) -->
	  </div>   <!-- /.row -->
	</section><!-- /.content -->
@stop