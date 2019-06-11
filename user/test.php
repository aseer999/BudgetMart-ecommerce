<?php
include("plugins/connect.php");

   $ticket_id=1902004;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
  	.pos-message{
  		display: inline-block;
    padding: 20px;
    background-color: #93ff6d;
    border: 1px solid #00860b;
    border-radius: 15px;
    color: #005a07;
  	}

  	.neg-message{
  		display: inline-block;
    padding: 20px;
    background-color: #ffb4b4;
    border: 1px solid #a00000;
    border-radius: 15px;
    color: #a00000;
  	}
  </style>
  <link rel="stylesheet" type="text/css" href="plugins/style.css">

<script type="text/javascript" src="plugins/jquery-3.3.1.js"></script>
</head>
<body>
 <h2 style="text-align: center;">Support</h2>
   

<form method="post">
  

 <div class="support-chat">
  <h1>Ticket - #<?php echo $ticket_id; ?></h1>
  <div class="chat-view" id="chat_view">

          
       
     
      </div>

<?php
   $sql="SELECT closed from tickets where ticket_id=$ticket_id";
   $r = $conn->query($sql);
   while ($row=$r->fetch_assoc()) {
     $t_closed=$row['closed'];
   }
?>


      <input id="message" type="text" name="message" placeholder="Type your message . . ."
   <?php
    if($t_closed==1)
     echo "disabled";
   ?>

      >
      <input id="btn_reply" type="submit" name="send" value="Send" 
      <?php
    if($t_closed==1)
     echo "disabled";
   ?>
      >
 </div>
   </form>

  	  

   

<script type="text/javascript">
  $(document).ready(function() {
     $('#btn_reply').click(function(){
     var msg = $('#message').val();
     if($.trim(msg) != '')
     {
     // alert(msg);
         $.ajax({
              url:"process_reply.php",
              type:"POST",
              data:{message:msg},
              dataType:"text",
              success:function(data)
              {
             
               $('#message').val("");

              }
         });
     }
  });
    
 



setInterval(function(){
      $('#chat_view').load("fetch.php").fadeIn("slow");

     }, 1000);
  
   });
</script>
</body>
</html>