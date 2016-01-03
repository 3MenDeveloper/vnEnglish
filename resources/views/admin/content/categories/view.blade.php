@extends('admin.home')

@section ('title', 'Danh sách categories')

@section ('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Danh Sách Chủ Đề
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Categories</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <a href="{{ route('admin::admin.categories.create') }}" title="Thêm" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Thêm Chủ Đề</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Điểm KN</th>
                        <th>Hình Ảnh</th>
                        <th>Ngày Tạo</th>
                        <th>Ngày Cập Nhật</th>
                        <th width="15%">Tùy Chọn</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($categories as $category)
                        <tr>
                          <td>{{ $category->categoryID }}</td>
                          <td>{{ $category->title }}</td>
                          <td>{{ $category->exp }}</td>
                          <td>{!! Html::image('upload/categories/'.$category->image, '', ['class' => 'thumbnail', 'style' => 'width:200px' ]) !!}</td>
                          <td>{{ $category->created_at }}</td>
                          <td>{{ $category->updated_at }}</td>
                          <td>
                            <a href="{{ route('admin::admin.categories.show', $category->categoryID) }}" class="btn btn-info" title="Show"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a> 
                            <a href="{{ route('admin::admin.categories.edit', $category->categoryID) }}" class="btn btn-warning" title="Chỉnh sửa"><i class="glyphicon glyphicon-pencil"></i></a> 

                            <!-- Xóa -->
                            <a class="btn btn-danger" data-toggle="modal" href='#modal-{{ $category->categoryID }}'><i class="glyphicon glyphicon-remove"></i></a>
                            <div class="modal fade" id="modal-{{ $category->categoryID }}">
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
                                        'route'  => ['admin::admin.categories.destroy', $category->categoryID],
                                        'method' => 'DELETE',
                                        'class'  => 'form-inline',
                                        'style' => 'display:inline'
                                      ])
                                          !!}
                                          {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                                      {!! Form::close() !!}
                                  </div>
                                </div>
                              </div>
                            </div>

                          </td>
                        </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Điểm KN</th>
                        <th>Hình Ảnh</th>
                        <th>Ngày Tạo</th>
                        <th>Ngày Cập Nhật</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@stop