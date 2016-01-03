@extends ('member.master')

@section ('css')
<style type="text/css" media="screen">
	#page-wrap                      { width: 90%; margin: 30px auto; position: relative; }

	#chat-wrap                      { border: 1px solid #eee; margin: 0 0 15px 0; }
	#chat-area                      { height: 300px; overflow: auto; border: 1px solid #666; padding: 20px; background: white; }
	#chat-area span                 { color: white; background: #333; padding: 4px 8px; -moz-border-radius: 5px; -webkit-border-radius: 8px; margin: 0 5px 0 0; }
	#chat-area p                    { padding: 8px 0; border-bottom: 1px solid #ccc; }

	#name-area                      { position: absolute; top: 12px; right: 0; color: white; font: bold 12px "Lucida Grande", Sans-Serif; text-align: right; }
	#name-area span                 { color: #fa9f00; }

	#send-message-area p            { float: left; padding-top: 27px; font-size: 14px; }
	#sendie                         { border: 3px solid #999; width: 360px; padding: 10px; font: 12px "Lucida Grande", Sans-Serif; float: right; }
</style>
@endsection

@section ('js')
<script type="text/javascript">
	var instanse = false;
	var state;
	var mes;
	var file;

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	function Chat () {
	    this.update = updateChat;
	    this.send = sendChat;
		this.getState = getStateOfChat;
	}

	//gets the state of the chat
	function getStateOfChat(){
		if(!instanse){
			instanse = true;
			var data = {
	   			'function': 'getState',
				'file': file
			};
			var posting = $.post("", data);
			posting.done(function(data) {
                state = data.state;
				instanse = false;

            });
		}
	}

	//Updates the chat
	function updateChat(){
		 if(!instanse){
		 	instanse = true;
		 	// alert('name');
		 	var data = {
				'function': 'update',
				'state': state,
				'file': file
	        };
		    var posting = $.post("/member/chat", data);
		    posting.done(function(data) {
		    	// console.log(data.text);
		    	if(data.text){
					for (var i = 0; i < data.text.length; i++) {
                        $('#chat-area').append($("<p>"+ data.text[i] +"</p>"));
                    }
			    }
			    document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
			    instanse = false;
			    state = data.state;
		    });


		 }
		 else {
			 setTimeout(updateChat, 1500);
		 }
	}

	//send the message
	function sendChat(message, nickname)
	{
	    updateChat();
	    var data = {
			'function': 'send',
			'message' : message,
			'nickname': nickname,
			'file'    : file
         };
	    var posting = $.post("/member/chat", data);
	    posting.done(function(data) {
	    	updateChat();
	    	// alert(data);
	    });

	}


// -------------------------------------------- //


    // ask user for name with popup prompt
    var name = '<?php echo Auth::user()->name ?>';

    // default name is 'Guest'
	if (!name || name === ' ') {
	   name = "Guest";
	}

	// strip tags
	name = name.replace(/(<([^>]+)>)/ig,"");

	// display name on page
	$("#name-area").html("You are: <span>" + name + "</span>");

	// kick off chat
    var chat =  new Chat();
	$(function() {

		 chat.getState();

		 // watch textarea for key presses
         $("#sendie").keydown(function(event) {

             var key = event.which;

             //all keys including return.
             if (key >= 33) {

                 var maxLength = $(this).attr("maxlength");
                 var length = this.value.length;

                 // don't allow new content if length is maxed out
                 if (length >= maxLength) {
                     event.preventDefault();
                 }
              }
		 																																																});
		 // watch textarea for release of key press
		 $('#sendie').keyup(function(e) {

			  if (e.keyCode == 13) {

                var text = $(this).val();
				var maxLength = $(this).attr("maxlength");
                var length = text.length;

                // send
                if (length <= maxLength + 1) {

			        chat.send(text, name);
			        $(this).val("");

                } else {

					$(this).val(text.substring(0, maxLength));

				}


			  }
         });

	});

	setInterval(chat.update(), 1000);
</script>
@endsection


@section ('content')
<div id="onload" class="col-lg-9 main-chart">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="showback">
                <div id="page-wrap">
                    <h2>DIỄN ĐÀN THẢO LUẬN</h2>
                    <p id="name-area"></p>
                    <div id="chat-wrap"><div id="chat-area"></div></div>
                    <form id="send-message-area">
                    	{!! csrf_field() !!}
                        <p>Your message: </p>
                        <textarea id="sendie" maxlength = '100' ></textarea>
                    </form><br style="clear:both">
                </div>
            </div>
        </div>
    </div>
</div>
@stop