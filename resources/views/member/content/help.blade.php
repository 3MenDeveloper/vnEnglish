@extends('member.master')
@section ('title', 'Home')


@section ('content')
<!-- Content -->

    <div class="col-lg-9 main-chart">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="showback">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-primary">Trợ Giúp</h3>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Hướng dẫn cách học tiếng anh trên vnEnglish
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">
                                    Để có thể học tiếng anh trên vnEnglish. Đầu tiên:
                                    <ul>
                                      <li>Bạn bấm vào <strong>Chủ đề tiếng anh</strong> để chọn chủ đề muốn học theo từng cấp độ</li>
                                      <li>Bấm vào bài <strong>Bài trắc nghiệm</strong> mình muốn học, mỗi bài trắc nghiệm sẽ có khoảng 10 câu hỏi</li>
                                      <li>Sau khi làm bài trắc nghiệm sẽ hiển thị kết quả bài làm của bạn</li>
                                      <li>Nếu bạn làm vượt 50% bài trắc nghiệm sẽ được +5 Exp hoặc +10 Exp nếu đúng hoàn toàn. Sau khi đủ kinh nghiệm bạn sẽ lên cấp tiếp theo, đủ cấp bạn sẽ được có thể làm thể loại cao hơn.</li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Điểm kĩ năng, cấp độ là gì?
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                  <div class="panel-body">
                                    Bạn nhận được điểm kinh nghiệm khi bạn hoàn tất một tác vụ để cải thiện khả năng ngôn ngữ của bạn. Những tác vụ này bao gồm hoàn tất một bài học, dịch một đoạn văn và chấm điểm phần dịch của người khác.
                                    Bạn tăng cấp độ mỗi khi bạn đạt đủ só điểm kĩ năng cần thiết cho cấp độ đó. Hiện tại có tổng cộng 25 cấp độ, và bạn luôn có thể xem bạn đã đạt được bao nhiêu điểm và cần bao nhiêu điểm để lên cấp ở trang chủ.
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      Tại sao tôi không vào trắc nghiệm được?
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                  <div class="panel-body">
                                    Mỗi bài trắc nghiệm được kiểm tra và tính toán kĩ lưỡng. Nếu bạn không thể làm bài trắc nghiệm hãy liên hệ với chúng tôi thông qua mail <a href="mailto:system@vnenglish.com">system@vnenglish.com</a>.
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@stop