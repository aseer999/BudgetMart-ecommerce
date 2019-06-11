<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
    
      <h2>Warning!</h2>
    </div>
    <div class="modal-body">
      <p>Confirm DELETE id=<span style="color: #2b2bab;"><b><?php echo $id; ?> </b> </span> from Table <span style="color: #c51f1f;"><b><?php echo $R; ?> </b> </span>???</p>
      
    </div>
    <div class="modal-footer">
    <h2><a href="process.php?del=1&R=<?php echo $R; ?>&id=<?php echo $id; ?>&attr=<?php echo $attr; ?>&page=<?php echo $page; ?>" style="background-color: #c51f1f;" >OK</a> <a href="process.php?ask=0&page=<?php echo $page; ?>" style="    background-color: #2b2bab;" >Cancel</a>   </h2>  
 
    </div>
  </div>

</div>