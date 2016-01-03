@extends('admin.home')

@section ('title', 'Show Questions')

@section ('content')
	<section class="content">
		<div class="box">
	        <div class="box-header with-border">
	          <h3 class="box-title">Tên Câu Hỏi: Số {{ $question->questionID }}</h3>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
	          </div>
	        </div>
	        <div class="box-body">
	        @if(isset($success))
	        <div class="alert alert-success">
	        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        	<strong>Thành Công!</strong> Bạn đã cập nhật thành công Trắc Nghiệm: {{ $question->ask }}
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
	        			<th>Tên câu hỏi</th>
	        			<td>{{ $question->ask }}</td>
	        		</tr>
	        		<tr>
	        			<th>Câu tùy chọn trả lời</th>
	        			<td>{{ $question->option }}</td>
	        		</tr>
	        		<tr>
	        			<th>Đáp Án</th>
	        			<td>{{ $question->rightAnswer }}</td>
	        		</tr>
	        		<tr>
	        			<th>Chú thích đáp án đúng</th>
	        			<td>{{ $question->rightAnswerNote }}</td>
	        		</tr>
	        		<tr>
	        			<th>Loại hình</th>
	        			<td>{{ $question->type==1? 'Thường':'Hình' }}</td>
	        		</tr>
	        		<tr>
	        			<th>Ẩn / Hiện</th>
	        			<td>{!! $question->active==1? '<span class="fa fa-fw fa-check alert-success"></span>':'<span class="fa fa-fw fa-close alert-danger"></span>' !!}</td>
	        		</tr>
	        		<tr>
	        			<th>Thuộc thẻ</th>
	        			<td>
	        				<?php
		        				$tags = DB::table('tags')
	                            ->join('questiontag', 'tags.tagID', '=', 'questiontag.tagID')
	                            ->join('questions', 'questions.questionID', '=', 'questiontag.questionID')
	                            ->where('questions.questionID', '=', "$question->questionID")
	                            ->select('tags.title')
	                            ->distinct()
	                            ->get();
	                            if(!empty($tags)){
	                            	foreach ($tags as $tag) {
	                            		echo '<span class="alert text-success">'.$tag->title.'</span>';
	                            	}
	                            }
                            ?>
	        			</td>
	        		</tr>
	        		<tr>
	        			<th>Thuộc thể loại</th>
	        			<td>{{ App\Category::findOrFail($question->categoryID)->title }}</td>
	        		</tr>
	        		<tr>
	        			<th>Ngày Tạo</th>
	        			<td>{{ $question->created_at }}</td>
	        		</tr>
	        		<tr>
	        			<th>Ngày Cập Nhật</th>
	        			<td>{{ $question->updated_at }}</td>
	        		</tr>
	        	</tbody>
	        </table>

	        </div><!-- /.box-body -->
	        <div class="box-footer">
	        	<a href="{{ route('admin::admin.questions.index') }}" class="btn btn-success" title="Trở lại">Trở lại</a>
		        <a href="{{ route('admin::admin.questions.edit', $question->questionID) }}" class="btn btn-warning" title="Chỉnh sửa"><i class="glyphicon glyphicon-pencil"></i> Sửa</a>

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
										'route'  => ['admin::admin.questions.destroy', $question->questionID],
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