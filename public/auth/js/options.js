$(document).ready(function() {

    // Hiện thông báo nếu refresh trang
    var popit = true;
    window.onbeforeunload = function() {
        if(popit == true) {
            popit = false;
            return "Bạn có chắc muốn refresh lại trang không? Nếu bạn refresh lại trang dữ liệu sẽ bị xóa";
        }
    }

    var dem = 0;

    // Gọi form lần đầu tiên
    formOption();

    // Khi form được submit kiểm tra
    $(".showback").on("click", "input[type=submit]", function(event) {
        event.preventDefault();

        // Ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            var userAnswer = $("input.option:checked").map(function() {
                return this.value;
            }).get();

            var data = {
                'questionID': $("input[name='questionID']").val(),
                'userAnswer': userAnswer,
            };

            /**
             * Ajax truyền giá trị đáp án từng câu hỏi của User
            *  return boolean
             */
            var posting = $.post("", data);
            // Put the results in a div
            posting.done(function(data) {

                if (typeof(data) !== 'undefined' && data == 1) {
                    sound('correct');
                }else{
                    sound('mistake');
                }
                $('.showback .submit').remove();
                nextControl(data);

            });
            posting.fail(function() {
                // $('.alert').remove();
                // $(".modal-body").prepend('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Lỗi! Email hoặc password không đúng</strong></div>');
            });

        // console.log(questions.length);
    });

    // Chuyển câu kết tiếp nếu nếu là câu cuối thì ajax kết thúc và hiển thị kết quả bài làm
    $(".showback").on('click', "a[name='Next']", function(){

        dem++;
        $('.nextControl').remove();
        $('.showback').css('padding-bottom', '');


        if (dem <= questions.length - 1) {
            formOption();
        } else {

            // Ajax hiển thị kết quả kết thúc bài làm quiz
            purl = window.location.href + '/finished';
            var posting = $.post(purl, '');

            posting.done(function(data){
                $('.showback').empty();

                // Hiển thị thông báo chúc mừng
                var total = data[0]; // Tổng điểm kết quả User đúng
                if(total == 10){
                    showPopup('congratulation');
                    sound('congratulation');
                }else if (total >= 5){
                    showPopup('finish');
                    sound('congratulation');
                }else{
                    showPopup('sad');
                    sound('sad');
                }

                // Nếu lên level
                if(data[2] !== undefined){
                    var upLevel = setInterval(function(){
                        showPopup('upLevel', data[2]);
                        sound('congratulation');
                        clearInterval(upLevel);
                    }, 3000);
                }

                final(data); //Hiển thị kết quả


                // console.log(data);
            });

            posting.fail(function(){

            });
        }
    });

    $(".showback").on("click", ".label_img img", function() {
        $('.thumbnail').css("border", "1px solid #ccc");
        $(this).css("border", "3px solid blue");
    });

    // Form option
    function formOption() {
        $('form[name=form]').remove();
        var options = questions[dem].option.split('--');

            var html = '<form name="form" method="POST">';
            html += '<input type="hidden" name="questionID" value="' + questions[dem].questionID + '">';
            html += '<div class="row centered">';
            html += '<h3 class="text-primary">' + questions[dem].ask + '</h3>';
            html += '</div>';
            html += '<div class="row centered ans">';

            if (questions[dem].type == 1) {
                $.each(options, function(i, option) {
                    html += '<div class="col-md-3"></div>';
                    html += '<div class="col-md-4 answers">';
                    html += '<div class="radio" style="float:left">';
                    html += '<label><input type="radio" name="option[]" class="option" value="' + option + '" >' + option + '</label>';
                    html += '</div>';
                    html += '</div>';
                });
            } else if (questions[dem].type == 3) {
                $.each(options, function(i, option) {
                    html += '<div class="col-md-6 answers" style="margin-bottom: 15px">';
                    html += '<div class="radio">';
                    html += '<label class="label_img"><input type="radio" name="option[]" value="' + option + '" class="radio_img option"><img src="/upload/questions/'+ option +'" class="thumbnail" width="100" style="margin-top:-30px"/></label>';
                    html += '</div>';
                    html += '</div>';
                });
            } else{
                $.each(options, function(i, option) {
                    html += '<div class="col-md-3"></div>';
                    html += '<div class="col-md-4 answers">';
                    html += '    <div class="checkbox" style="float:left">';
                    html += '        <label>';
                    html += '            <input type="checkbox" name="option[]" class="option" value="'+ option +'" > ' + option;
                    html += '        </label>';
                    html += '    </div>';
                    html += '</div>';
                });
            }

            html += '</div>';
            html += '<div class="col-md-offset-10 submit">';
            html += '<input type="submit" class="btn btn-lg btn-primary" value="Kiểm tra" disabled>';
            html += '</div>';
            html += '</form>';
            $(".showback").append(html);

    }

    // Disable/Enable button submit
    $('.showback').on('change', '.option', function() {
        $('input[type=submit]').removeAttr('disabled');
    });

    // Nút điều khiển Next
    function nextControl (right) {
        var color = (right == 1) ? '#DEF0A5' : '#FFD4CC';
        $('.showback').css('padding-bottom', '0px');

        var html = '<div class="row nextControl" style="background:'+ color +'; padding: 10px 0">';
        var rightAnswer = questions[dem].rightAnswer.replace('--', ', ');

        if(right == 1){
            html +=   '<div class="col-md-10" style="">';
            html +=     '<div class="col-md-2 img-circle" style="background:#fff;"><span class="glyphicon glyphicon-ok text-success" style="font-size:5em; line-height: 1.5em" aria-hidden="true"></span></div>';
            html +=     '<div class="col-md-10">';
            html +=       '<h2 class="text-success">Chính xác</h2>';
            if(questions[dem].type == 3)
                html +=       '<h4 class="text-info" style="display:inline-block">Đáp án đúng:</h4> <img src="/upload/questions/'+ rightAnswer +'" width="70" />';
            else
                html +=       '<h4 class="text-info">Đáp án đúng: '+ rightAnswer +'</h4>';
            html +=     '</div>';
            html +=   '</div>';
        } else {
            html +=   '<div class="col-md-10">';
            html +=     '<div class="col-md-2 img-circle" style="background:#fff;"><span class="glyphicon glyphicon-remove text-danger" style="font-size:5.6em; line-height: 1.5em" aria-hidden="true"></span></div>';
            html +=     '<div class="col-md-10">';
            html +=       '<h2 class="text-danger">Sai</h2>';
            if(questions[dem].type == 3)
                html +=       '<h4 class="text-info" style="display:inline-block">Đáp án đúng:</h4> <img src="/upload/questions/'+ rightAnswer +'" width="70" />';
            else
                html +=       '<h4 class="text-info">Đáp án đúng: '+ rightAnswer +'</h4>';
            html +=     '</div>';
            html +=   '</div>';
        }
        html +=   '<div class="col-md-2">';
        html +=     '<a class="btn btn-lg btn-success" name="Next">Tiếp tục</a>';
        html +=   '</div>';
        html += '</div>';
        $(".showback").append(html);
    }



    // Show thông báo chúc mừng
    function showPopup(typePopup, upLevel){

        var html = '<div id="overlay">';
        html     +=     '<div id="screen"></div>';
        html     +=     '<div class="dialog centered">';

        if(typePopup == 'congratulation'){
            html     +=         '<h1 class="text-primary">Bạn được +10 EXP</h1>';
            html     +=         '<img src="/auth/img/congratulation.gif" alt="">';

        }else if(typePopup == 'finish'){
            html     +=         '<h1 class="text-primary">Bạn được +5 EXP</h1>';
            html     +=         '<img src="/auth/img/congratulation.gif" alt="">';

        } else if(typePopup == 'upLevel'){
            html     +=         '<h1 class="text-primary">Chúc mừng bạn đã lên Level '+ upLevel +'</h1>';
            html     +=         '<img src="/auth/img/congratulation.gif" alt="">';
        }else{
            html     +=         '<h1 class="text-danger">Cố gắng Lên!</h1><h1> Sắp thành công rùi!</h1>';
            html     +=         '<img src="/auth/img/sad.gif" alt="">';
        }

        html     +=     '</div>';
        html     += '</div>';

        $('body').append(html);
        $('body #overlay').fadeIn();
        $('body .dialog').fadeIn();

    }
    $(document).click(function(){
        $('#overlay').remove();
    });


    // Sound Effect
    function sound(typeSound){
        var purl = '/auth/sound/';
        var obj = document.createElement("audio");
        obj.volume=1;
        obj.autoPlay=false;
        obj.preLoad=true;

        if(typeSound == 'sad'){
            obj.src = purl + 'sad.mp3';
        }else if (typeSound == 'correct'){
            obj.src = purl + 'correct.mp3';
        }else if (typeSound == 'mistake'){
            obj.src = purl + 'mistake.mp3';
        }else{
            obj.src = purl + 'congratulation.mp3';
        }

        obj.play();

    }


    function final (data) {
        var questions = data[1];
        var stt = 0;
       var html = '<div class="centered"><h3 class="text-primary">BẠN ĐÃ HOÀN THÀNH:</h3>';
       html += '<h1 class="text-danger"><strong>'+ data[0] +'</strong> / <strong>'+ questions.length +'</strong></h1>';
       html += '</div>';
       html += '<table class="table table-responsive">';
       html += '<thead>';
       html += '<tr>';
       html += '<th>STT</th>';
       html += '<th>Câu hỏi</th>';
       html += '<th>Thành viên trả lời</th>';
       html += '<th>Đáp án đúng</th>';
       html += '</tr>';
       html += '</thead>';
       html += '<tbody>';

       $.each(questions,function(i, question){
            stt++;
            if(question.userAnswer == question.rightAnswer)
                html += '<tr class="bg-success">';
            else
                html += '<tr class="bg-danger">';

            html += '<td >'+ stt +'</td>';
            html += '<td >'+ question.ask +'</td>';
            if (question.type == 1 || question.type == 2){
                html += '<td>'+ question.userAnswer +'</td>';
                html += '<td>'+ question.rightAnswer +'</td>';
            } else {
                html += '<td><img src="/upload/questions/'+ question.userAnswer +'" width="80" /></td>';
                html += '<td><img src="/upload/questions/'+ question.rightAnswer +'" width="80" /></td>';
            }

            html += '</tr>';

       });

       html += '</tbody>';
       html += '</table>';

       html += '<div class="centered"><input type="button" class="btn btn-primary goback" value="Trở lại"></div>';

       $('.showback').append(html);

    }

    $('.showback').on('click','.goback', function(){
        popit = false;
        window.history.back();
    });


});