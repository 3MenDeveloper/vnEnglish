@extends('admin.home')

@section ('title', 'Danh sách Quizs')


@section ('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Danh Sách Bài Quiz
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Quizs</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <a href="{{ route('admin::admin.quizs.create') }}" title="Thêm" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Thêm Quiz</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Hình Ảnh</th>
                        <th>Mật khẩu</th>
                        <th>Thời gian làm</th>
                        <th>Kích hoạt</th>
                        <th>Thuộc kĩ năng</th>
                        <th width="15%">Tùy Chọn</th>
                      </tr>
                    </thead>
                    <tbody>

                      @forelse ($quizs as $quiz)
                        <tr>
	                      <td>{{ $quiz->quizID }}</td>
	                      <td>{{ $quiz->title }}</td>
	                      <td>
                          @if($quiz->image)
                            {!! Html::image('upload/quizs/'.$quiz->image, '', ['class' => 'thumbnail', 'style' => 'width:200px' ]) !!}
                          @else
                            <img src="/assets/img/image.png" alt="">
                          @endif
                        </td>
	                      <td>{{ $quiz->password }}</td>
	                      <td>{{ $quiz->duration }}</td>
	                      <td>{!! $quiz->active==1? '<span class="fa fa-fw fa-check alert-success"></span>':'<span class="fa fa-fw fa-close alert-danger"></span>' !!}</td>
	                      <td>{{ App\Category::findOrFail($quiz->categoryID)->title }}</td>
	                      <td>
	                        <a href="{{ route('admin::admin.quizs.show', $quiz->quizID) }}" class="btn btn-info" title="Show"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
	                        <a href="{{ route('admin::admin.quizs.edit', $quiz->quizID) }}" class="btn btn-warning" title="Chỉnh sửa"><i class="glyphicon glyphicon-pencil"></i></a>

							<!-- Xóa -->
							<a class="btn btn-danger" data-toggle="modal" href='#modal-{{ $quiz->quizID }}'><i class="glyphicon glyphicon-remove"></i></a>
							<div class="modal fade" id="modal-{{ $quiz->quizID }}">
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

	                      </td>
                        </tr>
                      @empty
                      <td colspan="10">Không có nội dung</td>
                      @endforelse

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Hình Ảnh</th>
                        <th>Mật khẩu</th>
                        <th>Thời gian làm</th>
                        <th>Kích hoạt</th>
                        <th>Thuộc kĩ năng</th>
                        <th width="15%">Tùy Chọn</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@stop