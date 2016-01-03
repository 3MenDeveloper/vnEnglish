@extends('admin.home')

@section('title', 'Questions')

@section ('js')

@stop

@section('content')
	<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Danh Sách Câu Hỏi
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Questions</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <a href="{{ route('admin::admin.questions.create') }}" title="Thêm" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Thêm Câu Hỏi</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Câu hỏi</th>
                        <th>Tùy chọn đáp án</th>
                        <th>Ẩn Hiện</th>
                        <th>Thuộc Câu Hỏi</th>
                        <th width="15%">Tùy Chọn</th>
                      </tr>
                    </thead>
                    <tbody>

                      @forelse ($questions as $question)
                        <tr>
	                      <td>{{ $question->questionID }}</td>
	                      <td>{{ $question->ask }}</td>
	                      <td>
                          <table>
                              <?php $names = explode('--', $question->option) ?>
                              @foreach ($names as $name)
                                <tr><td>{{ $name }}</td></tr>
                              @endforeach
                          </table>

                        </td>
	                      <td>{!! $question->active==1? '<span class="fa fa-fw fa-check alert-success"></span>':'<span class="fa fa-fw fa-close alert-danger"></span>' !!}</td>
	                      <td>{{ App\Category::findOrFail($question->categoryID)->title }}</td>
	                      <td>
	                        <a href="{{ route('admin::admin.questions.show', $question->questionID) }}" class="btn btn-info" title="Show"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
	                        <a href="{{ route('admin::admin.questions.edit', $question->questionID) }}" class="btn btn-warning" title="Chỉnh sửa"><i class="glyphicon glyphicon-pencil"></i></a>

							<!-- Xóa -->
							<a class="btn btn-danger" data-toggle="modal" href='#modal-{{ $question->questionID }}'><i class="glyphicon glyphicon-remove"></i></a>
							<div class="modal fade" id="modal-{{ $question->questionID }}">
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

	                      </td>
                        </tr>
                      @empty
                      <td colspan="10">Không có nội dung</td>
                      @endforelse

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Câu hỏi</th>
                        <th>Tùy chọn</th>
                        <th>Ẩn Hiện</th>
                        <th>Thuộc Câu Hỏi</th>
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