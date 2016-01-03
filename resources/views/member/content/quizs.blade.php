@extends('member.master')
@section ('title', 'Home')

@section('css')
    <style>
        .play{
            position:absolute;
            bottom:30px;
            left:100px
        }
        .tags{
            margin-bottom:5px;
        }
    </style>
@stop

@section ('content')
<!-- Content -->

    <div class="col-lg-9 main-chart">
        <div class="row">
            <div class="col-lg-12 mb"><a href="/home" class="btn btn-primary" title="Trở lại">Trở lại</a></div>
        </div>
        <div class="row">

            @forelse($quizs as $quiz)
            <div class="col-lg-4 col-md-4 col-sm-4 mb" >
                <div class="weather-2 pn" style="height:auto;padding-bottom:5px">
                    <div class="weather-2-header">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <p>{{ $quiz->title }}</p>
                            </div>
                        </div>
                    </div><!-- /weather-2 header -->
                    <div class="row" style="margin:0 auto; text-align: center">
                        <img src="{{ asset('upload/quizs/' . $quiz->image) }}" width="120">
                        <div class="tags">
                            @forelse (App\Tag::where('quizID', $quiz->quizID)->get() as $tag)
                                <span class="label label-primary">{{ $tag->title }}</span>
                            @empty
                            @endforelse
                        </div>
                       <a href="{{ route('member::questions', ['cate' => $quiz->categoryID, 'quiz' => $quiz->quizID]) }}" title="Làm Bài" class="btn btn-round btn-danger" >Làm Bài</a>
                    </div>
                </div>
            </div>
            @empty
                <p>Không có dữ liệu</p>
            @endforelse
        </div>
    </div>

@stop