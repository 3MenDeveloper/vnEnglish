@extends('admin.home')

@section ('title', 'Show users')

@section ('content')
	<section class="content">
		<div class="box">
	        <div class="box-header with-border">
	          <h3 class="box-title">Tên Thành Viên: {{ $user->name }}</h3>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
	          </div>
	        </div>
	        <div class="box-body">
	        @if(isset($success))
	        <div class="alert alert-success">
	        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        	<strong>Thành Công!</strong> Bạn đã cập nhật thành công Thành Viên: {{ $user->name }}
	        </div>
	        @endif
	        <table class="table table-hover">
	        	<thead>
	        		<tr>
	        			<th>Trường</th>
	        			<th>Giá trị</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<tr>
	        			<th>ID</th>
	        			<td>{{ $user->id }}</td>
	        		</tr>
	        		<tr>
	        			<th>Tên</th>
	        			<td>{{ $user->name }}</td>
	        		</tr>
	        		<tr>
	        			<th>Email</th>
	        			<td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
	        		</tr>
	        		<tr>
	        			<th>Giới Tính</th>
	        			<td>{{ ($user->genger == 1) ? 'Nam' : 'Nữ' }}</td>
	        		</tr>
	        		<tr>
	        			<th>Ngày sinh</th>
	        			<td>{{ $user->dateOfBirth or '...' }}</td>
	        		</tr>
	        		<tr>
	        			<th>Nới Sinh</th>
	        			<td>{{ $user->placeOfBirth or '...' }}</td>
	        		</tr>
	        		<tr>
	        			<th>Điểm Kinh Nghiệm</th>
	        			<td>{{ $user->userExp }}</td>
	        		</tr>
	        		<tr>
	        			<th>Cấp Level</th>
	        			<td>{{ $user->userLevel }}</td>
	        		</tr>
	        		<tr>
	        			<th>Kích hoạt</th>
	        			<td>{!! $user->active==1? '<span class="fa fa-fw fa-check alert-success"></span>':'<span class="fa fa-fw fa-close alert-danger"></span>' !!}</td>
	        		</tr>
	        		<tr>
	        			<th>Quyền</th>
	        			<td>{{ ($user->role == 2)? 'Thành Viên' : 'Quản Trị' }}</td>
	        		</tr>
	        		<tr>
	        			<th>Avatar</th>
	        			<td><img src="{{ isset($user->avatar) ? ('/upload/avatar/'.$user->avatar) : '/auth/img/avatar.png' }}" class="thumbnail" width="200" alt="" /></td>
	        		</tr>
	        		<tr>
	        			<th>Ngày tạo</th>
	        			<td>{{ $user->created_at }}</td>
	        		</tr>
	        		<tr>
	        			<th>Ngày cập nhật</th>
	        			<td>{{ $user->updated_at }}</td>
	        		</tr>
	        	</tbody>
	        </table>

	        </div><!-- /.box-body -->
	        <div class="box-footer">
	        	<a href="{{ route('admin::admin.users.index') }}" class="btn btn-success" title="Trở lại">Trở lại</a>
		        <a href="{{ route('admin::admin.users.edit', $user->id) }}" class="btn btn-warning" title="Chỉnh sửa"><i class="glyphicon glyphicon-pencil"></i> Sửa</a> 
                <a href="{{ route('admin::admin.users.destroy', $user->id) }}" class="btn btn-danger" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa không?')"><i class="glyphicon glyphicon-remove"></i> Xóa</a> 
	        </div><!-- /.box-footer-->
	    </div>
	</section>
@stop