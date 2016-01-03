<aside>
  <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">

      	  <p class="centered"><a href="/member/info">
            @if (Auth::user()->avatar)
              <img src="{{ asset('upload/avatar/' . Auth::user()->avatar ) }}" class="img-circle" width="60">
            @else
              <img src="/auth/img/avatar.png" class="img-circle" width="60">
            @endif
            </a>
          </p>
      	  <h5 class="centered">{{ Auth::user()->name }}</h5>

          <li class="mt">
              <a href="/home">
                  <i class="fa fa-male"></i>
                  <span>TRANG CHỦ</span>
              </a>
          </li>

          <li>
              <a href="/member/info">
                  <i class="fa fa-male"></i>
                  <span>HỒ SƠ CỦA BẠN</span>
              </a>
          </li>

          <li>
              <a href="/member/help">
                  <i class="fa fa-eye"></i>
                  <span>TRỢ GIÚP</span>
              </a>
          </li>

          <!-- <li>
              <a href="#">
                  <i class="fa fa-list-alt"></i>
                  <span>HOẠT ĐỘNG</span>
              </a>
          </li> -->

          <li>
              <a href="/member/chat">
                  <i class="fa fa-users"></i>
                  <span>THẢO LUẬN</span>
              </a>
          </li>

          <!-- <li class="sub-menu">
              <a href="#" >
                  <i class="fa fa-cogs"></i>
                  <span>CÀI ĐẶT</span>
              </a>
          </li> -->

          <!-- <li class="sub-menu">
              <a href="javascript:;" >
                  <i class="fa fa-cogs"></i>
                  <span>CÀI ĐẶT</span>
              </a>
              <ul class="sub">
                  <li><a  href="calendar.html">Calendar</a></li>
                  <li><a  href="gallery.html">Gallery</a></li>
                  <li><a  href="todo_list.html">Todo List</a></li>
              </ul>
          </li> -->

      </ul>
      <!-- sidebar menu end-->
  </div>
</aside>