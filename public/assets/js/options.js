$(document).ready(function() {
    var max_fields      = 10; // Max option
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); // Add button ID
    var x = 0; // Số đếm
    var type = $("input[name=type]:checked").val(); // Khi input "type" checked

    // Lặp dữ liệu Option khi load đầu tiên
    if(pgurl == 'edit'){ // Dành cho trang edit
        loadOption(valueOption);

    }else{ // Dành cho trang create
        // Load option
        if(type == 0){ inputText(); } else { inputFile(); }
    }

    // input[name=type] thay đổi
    $( "input[name=type]" ).on( "change", function(){
        x = 0;
        var changeType = $("input[name=type]:checked").val(); // Lấy giá trị radio "type" bị thay đổi
        $(".input_fields_wrap div").remove(); // Xóa "option"

        if(pgurl == 'edit'){ // Nếu là trang edit

            if((changeType == 1 && changeType == type) || (changeType == 0 && changeType == type)){ // Nếu changeType thay đổi mà bằng với type trong CSDL thì load "option" lên
                loadOption(valueOption);
            } else{
                if(changeType == 0){ inputText(); } else { inputFile(); }
            }

        } else {
            if(changeType == 0){ inputText(); } else { inputFile(); }
        }
    });


    $(add_button).click(function(e){ //Thêm option
        e.preventDefault();
        changeType = $("input[name=type]:checked").val(); // Giá trị của type

        x++; //text box increment
        if(x < max_fields){ //max input box allowed
            if(changeType == 0){ inputText(); } else { inputFile(); }
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ // Xóa option
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });


    function loadOption (valueOption) {
        valueOption = valueOption.split("--");
        for (var i =0, len = valueOption.length; i < len; i++) {
            x++;
            var connect = (typeof rightAnswer[i] != 'Default' && rightAnswer[i] == valueOption[i])? 'checked' : ''; // Kiểm tra rightAnser có trùng với option không. Nếu trùng thì checked="checked"

            if(type == 0){ // Kiểm tra type. Nếu type = 1 thì là lặp tùy chọn (option) thường, type = 2 thì lặp tùy chọn (option) hình
                inputText(valueOption[i], connect);
            }else{
                inputFile(valueOption[i], connect);
            }
        };
    }

    function inputText(valueOption, connect){

        valueOption = (valueOption === undefined)? '' : valueOption;
        connect = (connect != '')? 'checked="' +connect+ '"' : '';


        $(wrapper).append('<div><input type="checkbox" name="rightAnswer[]" value="'+x+'" '+connect+' class="minimal" /> Đúng <input type="text" name="option['+x+']" class="option" placeholder="Thêm tùy chọn đáp án" value="'+valueOption+'" /> <a href="#" class="remove_field btn btn-danger"><i class="fa fa-fw fa-remove"></i></a></div>');
    }

    function inputFile(valueOption, connect){
        valueOption = (valueOption === undefined)? '' : '<img src="/upload/questions/' + valueOption + '" alt="" class="thumbnail" width="100" />'
        connect = (connect != '')? 'checked="' +connect+ '"' : '';

        $(wrapper).append('<div><input type="checkbox" name="rightAnswer[]" value="'+x+'" '+connect+' class="minimal" /> Đúng <input type="file" name="option['+x+']" style="display:inline-block" /> <a href="#" class="remove_field btn btn-danger"><i class="fa fa-fw fa-remove"></i></a>'+valueOption+'</div>');
    }



});