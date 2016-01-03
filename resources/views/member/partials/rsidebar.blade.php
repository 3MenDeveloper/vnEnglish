<div class="col-lg-3 ds">
    <!--COMPLETED ACTIONS DONUTS CHART-->
    

<?php

    $quizusers = DB::table('quizuser')
                    ->select('created_at', 'quizID', 'finish')
                    ->where('id', '=', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

    function _ago($tm,$rcs = 0) {
        $tm = $tm = strtotime($tm);
        $cur_tm = time(); $dif = $cur_tm-$tm;
        $pds = array('giây','phút','giờ','ngày','tuần','tháng','năm','decade');
        $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
        for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

        $no = floor($no);
        $x=sprintf("%d %s ",$no,$pds[$v]);
        if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
        return $x;
    }

?>
    @if ($quizusers)
        <h3>HOẠT ĐỘNG</h3>
        @foreach ($quizusers as $quizuser)
        <div class="desc">
            <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
            </div>
            <div class="details">
                <p><muted>{{ _ago($quizuser->created_at) }}</muted><br/>
                <a href="#">{{ Auth::user()->name }}</a> đã làm {{ ($quizuser->finish == 1)? 'lại' : '' }} bài trắc nghiệm {{ App\Quiz::findOrFail($quizuser->quizID)->title }}.<br/>
                </p>
            </div>
        </div>
        @endforeach
    @endif

    <!-- USERS ONLINE SECTION -->
    <h3>THÀNH VIÊN MỚI</h3>

    @forelse (App\User::all() as $user)
    <div class="desc">
        <div class="thumb">
            <img class="img-circle" src="{{{ isset($user->avatar) ? asset('upload/avatar/'. $user->avatar) : '/auth/img/avatar.png' }}}" width="35px" height="35px" align="">
        </div>
        <div class="details">
            <p><a href="#">{{ $user->name }}</a><br/>
            <muted>{{ $user->email }}</muted>
            </p>
        </div>
    </div>
    @empty
        <p>Dữ liệu rỗng</p>
    @endforelse

    <!-- CALENDAR-->
    <div id="calendar" class="mb">
        <div class="panel green-panel no-margin">
            <div class="panel-body">
                <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                    <div class="arrow"></div>
                    <h3 class="popover-title" style="disadding: none;"></h3>
                    <div id="date-popover-content" class="popover-content"></div>
                </div>
                <div id="my-calendar"></div>
            </div>
        </div>
        </div><!-- / calendar -->
    </div>