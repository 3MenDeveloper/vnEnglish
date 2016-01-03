@extends('admin.home')

@section ('title', 'Show categories')

@section ('content')
	<section class="content">
		<div class="box">
	        <div class="box-header with-border">
	          <h3 class="box-title">Tên Chủ Đề: {{ $category->title }}</h3>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
	          </div>
	        </div>
	        <div class="box-body">
	        @if(isset($success))
	        <div class="alert alert-success">
	        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        	<strong>Thành Công!</strong> Bạn đã cập nhật thành công Chủ Đề: {{ $category->title }}
	        </div>
	        @endif
	        <table class="table table-hover">
	        	<thead>
	        		<tr>
	        			<th>Nội dung</th>
	        			<th>Giá trị</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<tr>
	        			<th>Tên</th>
	        			<td>{{ $category->title }}</td>
	        		</tr>
	        		<tr>
	        			<th>Điểm kinh nghiệm</th>
	        			<td>{{ $category->exp }}</td>
	        		</tr>
	        		<tr>
	        			<th>Hình Ảnh</th>
	        			<td>{!! Html::image('upload/categories/'.$category->image, $category->image, ['class' => 'thumbnail', 'style' => 'width:200px']) !!}</td>
	        		</tr>
	        	</tbody>
	        </table>

	        </div><!-- /.box-body -->
	        <div class="box-footer">
	        	<a href="{{ route('admin::admin.categories.index') }}" class="btn btn-success" title="Trở lại">Trở lại</a>
		        <a href="{{ route('admin::admin.categories.edit', $category->categoryID) }}" class="btn btn-warning" title="Chỉnh sửa"><i class="glyphicon glyphicon-pencil"></i> Sửa</a> 
                <a href="{{ route('admin::admin.categories.destroy', $category->categoryID) }}" class="btn btn-danger" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa không?')"><i class="glyphicon glyphicon-remove"></i> Xóa</a> 
	        </div><!-- /.box-footer-->
	    </div>
	</section>
@stop