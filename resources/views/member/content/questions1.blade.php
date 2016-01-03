@extends('member.master')
@section ('title', 'Home')

@section ('content')
<!-- Content -->

    <div class="col-lg-9 main-chart">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="showback">

                    @foreach($questions as $question)
                        {{ $question->type }}
                    @endforeach

                    <!-- kiểu radio  -->
                    <!-- <div class="row centered">
                        <p>Chọn câu đúng trong các câu trả lời đúng sau đây:</p>
                        <h3 class="text-primary">Which company do you work for?</h3>
                    </div>
                    <div class="row centered ans">
                        <div class="col-md-6 answers">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="option" >Công ty bạn đang làm việc cho cái gì?
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 answers">
                           <div class="radio">
                                <label>
                                    <input type="radio" name="option" >Công ty bạn đang làm việc cho cái gì?
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 answers">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="option" >Công ty bạn đang làm việc cho cái gì?
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 answers">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="option" >Công ty bạn đang làm việc cho cái gì?
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-offset-11">
                        <button type="submit" class="btn btn-success">Next</button>
                    </div> -->

                    <!-- kiểu checkbox -->

                    <!-- <div class="row centered">
                        <p>Chọn câu đúng trong các câu trả lời đúng sau đây:</p>
                        <h3 class="text-primary">Which company do you work for?</h3>
                    </div>
                    <div class="row centered ans">
                        <div class="col-md-6 answers">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="option" >Công ty bạn đang làm việc cho cái gì?
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 answers">
                           <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="option" >Công ty bạn đang làm việc cho cái gì?
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 answers">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="option" >Công ty bạn đang làm việc cho cái gì?
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 answers">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="option" >Công ty bạn đang làm việc cho cái gì?
                                </label>
                            </div>
                        </div>
                    </div> -->

                    <!-- kiểu hình ảnh -->

                    <div class="row centered">
                        <p>Chọn câu đúng trong các câu trả lời đúng sau đây:</p>
                        <h3 class="text-primary">The chicken</h3>
                    </div>
                    <div class="row centered ans">
                        <div class="col-md-6 answers" style="margin-bottom: 15px">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="option" class="radio_img" >
                                        <img src="/auth/img/basic3.png" class="thumbnail" width="100" style="margin-top:-30px"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 answers" style="margin-bottom: 15px">
                           <div class="radio">
                                <label>
                                    <input type="radio" name="option" class="radio_img">
                                        <img src="/auth/img/ui-sherman.jpg" class="thumbnail" width="100" style="margin-top:-30px"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 answers">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="option" class="radio_img">
                                        <img src="/auth/img/ui-divya.jpg" class="thumbnail" width="100" style="margin-top:-30px"/>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 answers">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="option" class="radio_img" >
                                        <img src="/auth/img/ui-zac.jpg" class="thumbnail" width="100" style="margin-top:-30px"/>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-offset-11">
                        <button type="submit" class="btn btn-success">Next</button>
                    </div>
                     <!-- end kiểu hình ảnh -->
                
                </div>
            </div>

        </div>
    </div>

@stop