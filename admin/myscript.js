// Get the modal
var modal = document.getElementById('myModal');



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];



<<<<<<< HEAD
=======
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

>>>>>>> 04625ef6c670fa3aae59741ecbce53c773be6a2d



var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
<<<<<<< HEAD
}






  $(document).ready( function() {
     $('#btn_reply').click(function(){
     var msg = $('#message').val();
     if($.trim(msg) != '')
     {
     // alert(msg);
         $.ajax({
              url:"process_reply.php",
              method:"POST",
              data:{message:msg},
              dataType:"text",
              success:function(data)
              {
               // alert(data);
               $('#message').val("");
               // console.log(data);
              
              }
         });
     }
  });
    
 



setInterval(function(){
      $('#chat_view').load("fetch.php").fadeIn("slow");

     }, 300);

  
   });
=======
}
>>>>>>> 04625ef6c670fa3aae59741ecbce53c773be6a2d
