<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        @if(Auth::user()->avatar)
          <img src="/upload/avatar/{{ Auth::user()->avatar }}" class="img-circle" alt="">
        @else
          <img src="/assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        @endif
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <!-- <li class="treeview">
        <a href="{{ route('admin::home') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>

      </li> -->

      <li class="treeview">
        <a href="{{ route('admin::admin.categories.index') }}">
          <i class="fa fa-files-o"></i>
          <span>Chủ Đề (categories)</span>
          <span class="label label-primary pull-right">{{ count(App\Category::all()) }}</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin::admin.categories.index') }}"><i class="fa fa-circle-o"></i>Danh Sách</a></li>
          <li><a href="{{ route('admin::admin.categories.create') }}" title="Thêm kĩ năng"><i class="fa fa-circle-o"></i>Thêm kĩ năng</a></li>
        </ul>
      </li>


      <li class="treeview">
        <a href="{{ route('admin::admin.quizs.index') }}">
          <i class="fa fa-files-o"></i>
          <span>Bài quiz (Quizs)</span>
          <span class="label label-primary pull-right">{{ count(App\Quiz::all()) }}</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin::admin.quizs.index') }}"><i class="fa fa-circle-o"></i>Danh Sách</a></li>
          <li><a href="{{ route('admin::admin.quizs.create') }}"><i class="fa fa-circle-o"></i>Thêm Trắc Nghiệm</a></li>

        </ul>
      </li>



      <li class="treeview">
        <a href="{{ route('admin::admin.questions.index') }}">
          <i class="fa fa-files-o"></i>
          <span>Câu hỏi (Questions)</span>
          <span class="label label-primary pull-right">{{ count(App\Question::all()) }}</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin::admin.questions.index') }}"><i class="fa fa-circle-o"></i>Danh Sách Câu Hỏi</a></li>
          <li><a href="{{ route('admin::admin.questions.create') }}"><i class="fa fa-circle-o"></i>Thêm Câu Hỏi</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="{{ route('admin::admin.tags.index') }}">
          <i class="fa fa-files-o"></i>
          <span>Thẻ (Tags)</span>
          <span class="label label-primary pull-right">{{ count(App\Tag::all()) }}</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin::admin.tags.index') }}"><i class="fa fa-circle-o"></i>Danh Sách Thẻ</a></li>
          <li><a href="{{ route('admin::admin.tags.create') }}"><i class="fa fa-circle-o"></i>Thêm thẻ</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="{{ route('admin::admin.users.index') }}">
          <i class="fa fa-files-o"></i>
          <span>Thành Viên (users)</span>
          <span class="label label-primary pull-right">{{ count(App\User::all()) }}</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin::admin.users.index') }}"><i class="fa fa-circle-o"></i>Danh Sách Thành viên</a></li>
          <li><a href="{{ route('admin::admin.users.create') }}"><i class="fa fa-circle-o"></i>Thêm Thành Viên</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>