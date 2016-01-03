@extends('admin.home')

@section('title', 'Tạo Chủ Đề')

@section('content')
	<!-- Nội dung content -->
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>Chủ Đề (categories)</h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li><a href="#">Forms</a></li>
	    <li class="active">Categories</li>
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
	          <h3 class="box-title">Chủ Đề</h3>
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

	        {!! Form::open([
					'route' => ['admin::admin.categories.store'],
					'method' => 'POST',
					'files' => true
				]);
			!!}

					@include('admin.content.categories._form', ['submit' => 'Thêm'])
			{!! Form::close() !!}

	      </div><!-- /.box -->

	    </div><!--/.col (left) -->
	  </div>   <!-- /.row -->
	</section><!-- /.content -->
@stop

