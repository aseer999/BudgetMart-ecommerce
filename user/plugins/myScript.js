

// Side Navigation ------------------>>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}


// Side Navigation END ------------------>>


  $(document).ready(function() {
    var form1 = $('#customer_reply');
     $('#btn_reply').click(function(){

       $.ajax({
                  url: form1.attr('action'),
                  type:"post",
                  data: $('#customer_reply input').serialize(),

                  success:function(data){
                    console.log(data);
                  }
               });
     // var msg = $('#message').val();
     // if($.trim(msg) != '')
     // {
     // // alert(msg);
     //     $.ajax({
     //          url:"process_reply.php",
     //          method:"POST",
     //          data:{message:msg},
     //          dataType:"text",
     //          success:function(data)
     //          {
     //           // alert(data);
     //          // $('#message').val("");
     //            console.log(data);
              
     //          }
     //     });
     // }



  });
    
 



setInterval(function(){
      $('#chat_view').load("fetch.php").fadeIn("slow");
      $('#tickets').load("fetch_tickets.php").fadeIn("slow");
      $('#cart_amount').load("fetch_cart_amount.php").fadeIn("slow");

     }, 300);

  
   });




  //add to cart----------------->
  
    $(document).ready(function(){
        var form = $('#addtocart');
        $('#btn_addcart').click(function(){
              // alert("Button clicked");
               $.ajax({
                  url: form.attr('action'),
                  type:"post",
                  data: $('#addtocart input').serialize(),

                  success:function(data){
                    console.log(data);
                  }
               });
        });
    });
  //add to cart <------------------



// Side Navigation END ------------------>>

