@extends('member.master')
@section ('title', 'Home')

@section ('js')

<script src="{{ asset('auth/js/zabuto_calendar.js') }}"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });
        /*$("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event", }
            ]
        });*/
    });
    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
@stop

@section ('content')
        <div class="col-lg-9 main-chart">
            <div class="row mtbox">
                <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                    <div class="box1">
                        <span class="li_heart"></span>
                        <h3>{{ $users = count(App\User::all()) }}</h3>
                    </div>
                    <p>+{{ $users }} Thành viên đăng ký</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                    <div class="box1">
                        <span class="li_stack"></span>
                        <h3>+{{ $cate = count(App\Category::all()) }}</h3>
                    </div>
                    <p>Có hơn {{$cate}} thể loại câu hỏi với nhiều lĩnh vực</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                    <div class="box1">
                        <span class="li_news"></span>
                        <h3>+{{ $quizs = count(App\Quiz::all()) }}</h3>
                    </div>
                    <p>Có hơn {{$quizs}} bài trắc nghiệm với nhiều lĩnh vực</p>
                </div>

                <div class="col-md-2 col-sm-2 box0">
                    <div class="box1">
                        <span class="li_cloud"></span>
                        <h3>+{{ $questions = count(App\Question::all()) }}</h3>
                    </div>
                    <p>{{ $questions }} câu hỏi được thêm vào thư viện.</p>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                    <div class="box1">
                        <span class="li_data"></span>
                        <h3>OK!</h3>
                    </div>
                    <p>Hệ thống server hoàn hảo</p>
                </div>
            </div><!-- /row mt -->
                <div class="row mt">

                    @forelse ($categories as $category)
                    <?php
                        $quizs = DB::table('quizs')->select('quizID')->where('categoryID', '=', $category->categoryID)->get();
                        foreach ($quizs as $quizs) $quiz[] = $quizs->quizID;
                        $count = DB::table('quizuser')->whereIn('quizID', $quiz)->count();
                        $quiz=[];

                    ?>
                        @if(Auth::user()->userExp >= $category->exp)
                            <a href="{{ route('member::quizs', $category->categoryID) }}"><div class="col-md-4 col-sm-4 mb">
                                <div class="white-panel pn">
                                    <div class="white-header" style="background: #f1783c; color:#fff">
                                        <h4 style="font-weight: bold">{{ $category->title }}</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6 goleft">
                                            <p><i class="fa fa-heart"></i> {{ $count }}</p>
                                        </div>
                                        <div class="col-sm-6 col-xs-6"></div>
                                    </div>
                                    <div class="centered">
                                        <img src="{{ asset('upload/categories/'. $category->image) }}" width="120">
                                    </div>
                                </div>
                            </div></a><!-- /col-md-4 -->
                        @else
                            <div class="col-md-4 col-sm-4 mb" style="opacity:.4">
                                <div class="white-panel pn">
                                    <div class="white-header">
                                        <h4 style="color:#00a0c6">{{ $category->title }}</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6 goleft">
                                            <p><i class="fa fa-heart"></i> {{$count}}</p>
                                        </div>
                                        <div class="col-sm-6 col-xs-6"></div>
                                    </div>
                                    <div class="centered">
                                        <img src="{{ asset('upload/categories/'. $category->image) }}" width="120">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <p>Không có dữ liệu</p>
                    @endforelse


                </div><!-- /row -->
        </div><!-- /col-lg-9 END SECTION MIDDLE -->

@stop