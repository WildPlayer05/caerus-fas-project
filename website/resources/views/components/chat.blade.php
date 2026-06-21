<div class="relative">

    <div id="chat" class="h-full w-full hidden sm:hidden fixed bottom-0 right-0">
        <div class="sm:drop-shadow-xl h-full w-full sm:w-96 sm:h-3/4 bg-black/[0.7] sm:bg-transparent fixed bottom-0 right-0 sm:bottom-3 sm:right-3">
            <!-- component -->
<div class="h-full max-w-md mx-auto p-4 pb-20">
  <!-- Chat Container -->
  <div class="border border-gray-200 relative h-full bg-white rounded-lg shadow-md">
    <!-- Chat Header -->
    <div class="flex flex-col items-center mb-4 w-full">
      <div class="w-full">
        <p class="text-2xl font-bold w-full text-center mt-2">Caerus Supporter</p>
      </div>
    </div>

    <!-- Chat Messages -->
    <div class="h-full pb-32">
    <div id="messages" class="space-y-4 overflow-y-auto h-full">
    <div class="flex items-start ml-3">
    <div class="bg-gray-100 p-3 rounded-lg">
    <p class="text-sm text-gray-800">Hello, how can I help you?</p>
    </div>
    </div>
    </div>

    </div>
    

    <!-- Chat Input -->
    <div class="absolute bottom-4 mt-4 flex items-center w-full">
      <input
        id="textField"
        type="text"
        placeholder="Type your message..."
        class="w-full h-10 py-2 px-3 text-base sm:text-sm rounded-full bg-gray-100 ml-3"
      />
      <button onclick="sendMessage()" class="bg-blue-600 text-white h-10 px-2 rounded-full mx-3 hover:bg-blue-700">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
        </svg>

      </button>
    </div>
  </div>
</div>
        </div>
    </div>

    <button onclick="chatModal()" id="chatButton" class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-blue-600 hover:bg-blue-700 fixed bottom-4 right-4 flex items-center justify-center">
        <svg id="chatSvg" class="w-6 h-6 sm:w-8 sm:h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M4 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h1v2a1 1 0 0 0 1.707.707L9.414 13H15a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4Z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M8.023 17.215c.033-.03.066-.062.098-.094L10.243 15H15a3 3 0 0 0 3-3V8h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-1v2a1 1 0 0 1-1.707.707L14.586 18H9a1 1 0 0 1-.977-.785Z" clip-rule="evenodd"/>
        </svg>
    </button>
</div>  

<script>
    const chat = document.getElementById('chat');
    const chatButton = document.getElementById('chatButton');
    const chatSvg = document.getElementById('chatSvg');
    let count = 0;
    let interval;
    
    const chatModal = () => {
        if (count % 2 == 0) openChat();
        else closeChat();
    }

    const closeChat = () => {
      clearInterval(interval);
		chat.classList.add('hidden');
        chat.classList.add('sm:hidden');
        document.body.classList.remove('overflow-hidden');
        count++;
	}

	const openChat = () => {
    interval = setInterval(getMessage, 5000);
		chat.classList.remove('hidden');
        chat.classList.remove('sm:hidden');
        document.body.classList.add('overflow-hidden');
        count++;
    var div = document.getElementById( 'messages' );
    div.scrollTop = div.scrollHeight;
	}
    window.onscroll = function(ev) {
    if ((window.innerHeight + Math.round(window.scrollY)) + 90 >= document.body.offsetHeight) {
        chatButton.classList.add('hidden');
    } else {
        chatButton.classList.remove('hidden');
    }
};
</script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script>
  var oldMsg;
         function getMessage() {
            $.ajax({
               type:'GET',
               url: '{{ route('user.getMessages') }}',
               data: {_token: '<?php echo csrf_token() ?>'},
               success:function(data) {
                  $("#messages").html(data.msg);
                  if(oldMsg != data.msg) {
                    var div = document.getElementById( 'messages' );
                    div.scrollTop = div.scrollHeight;
                  }
                  oldMsg = data.msg;
               }
            });
         }

         function sendMessage() {
          let message = document.getElementById('textField').value;
          document.getElementById('textField').value="";
          $.ajax({
               type:'POST',
               url: '{{ route('user.sendMessage') }}',
               data: {_token: '<?php echo csrf_token() ?>', msg: message},
               success:function(data) {
                  $("#messages").html(data.msg);
                  var div = document.getElementById( 'messages' );
                  div.scrollTop = div.scrollHeight;
               }
            });
         }

         const textField = document.getElementById('textField');

         textField.addEventListener("keydown", function (event) {
			    if (event.keyCode == 13) sendMessage();
		    });

         
    getMessage();
</script>
