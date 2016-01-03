@extends('admin.home')

@section ('title', 'Show Quizs')

@section ('content')
	<section class="content">
		<div class="box">
	        <div class="box-header with-border">
	          <h3 class="box-title">Tên Trắc Nghiệm: {{ $quiz->title }}</h3>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
	          </div>
	        </div>
	        <div class="box-body">
	        @if(isset($success))
	        <div class="alert alert-success">
	        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        	<strong>Thành Công!</strong> Bạn đã cập nhật thành công Trắc Nghiệm: {{ $quiz->title }}
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
	        			<td>{{ $quiz->title }}</td>
	        		</tr>
	        		<tr>
	        			<th>Mật khẩu</th>
	        			<td>{{ $quiz->password }}</td>
	        		</tr>
	        		<tr>
	        			<th>Thời gian làm</th>
	        			<td>{{ $quiz->duration }}</td>
	        		</tr>
	        		<tr>
	        			<th>Ẩn / Hiện</th>
	        			<td>{!! $quiz->active==1? '<span class="fa fa-fw fa-check alert-success"></span>':'<span class="fa fa-fw fa-close alert-danger"></span>' !!}</td>
	        		</tr>
	        		<tr>
	        			<th>Thuộc kĩ năng</th>
	        			<td>{{ App\Category::findOrFail($quiz->categoryID)->title }}</td>
	        		</tr>
	        		<tr>
	        			<th>Hình Ảnh</th>
	        			<td>{!! Html::image('upload/quizs/'.$quiz->image, $quiz->image, ['class' => 'thumbnail', 'style' => 'width:200px']) !!}</td>
	        		</tr>
	        		<tr>
	        			<th>Ngày Tạo</th>
	        			<td>{{ $quiz->created_at }}</td>
	        		</tr>
	        		<tr>
	        			<th>Ngày Cập Nhật</th>
	        			<td>{{ $quiz->updated_at }}</td>
	        		</tr>
	        	</tbody>
	        </table>

	        </div><!-- /.box-body -->
	        <div class="box-footer">
	        	<a href="{{ route('admin::admin.quizs.index') }}" class="btn btn-success" title="Trở lại">Trở lại</a>
		        <a href="{{ route('admin::admin.quizs.edit', $quiz->quizID) }}" class="btn btn-warning" title="Chỉnh sửa"><i class="glyphicon glyphicon-pencil"></i> Sửa</a> 

				<!-- Xóa -->
				<a class="btn btn-danger" data-toggle="modal" href='#modal-id'><i class="glyphicon glyphicon-remove"></i></a>
				<div class="modal fade" id="modal-id">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Xóa bài viết</h4>
							</div>
							<div class="modal-body">
								Bạn có chắc muốn xóa không?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								{!! Form::open([
										'route'  => ['admin::admin.quizs.destroy', $quiz->quizID],
										'method' => 'DELETE',
										'class'  => 'form-inline',
										'style' => 'display:inline'
									])
				            	!!}
									<button type="submit" class="btn btn-danger">Delete</button>
				            	{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>

	        </div><!-- /.box-footer-->
	    </div>
	</section>
@stop