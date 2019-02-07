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


</head>
<body>
  <div class="pos-message">
  	   Successfully uploaded! <br> Your Product is Now on sale!
  	 </div>

  	  <div class='neg-message'>
  	   Successfully NOT uploaded! <br> Your Product is NoT on sale!
  	 </div>

   <div id="auto">
     
   </div>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready( function() {
     $('#auto').load('load.php');
     refresh();
  });



  function refresh()
  {
     setTimeout( function()
     {
      $('#auto').fadOut('slow').load('load.php').fadeIn('slow');
      refresh();

     },200);
  }
</script>
</body>
</html>