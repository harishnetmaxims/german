<?php
//Including Database configuration file.
session_start();
include("../include/dbconnection.php");
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $search = $_POST['search'];

   echo '
<div class="row">
<div class="relates">
		    	<div class="relatessec">
		  <ul class="serchfor">
   ';
       ?>


        <!--for users search-->
        
	    <?php  
		 $mem = "Select * from hips_elbow where hips_desc LIKE '%".$search."%' LIMIT 10";
         $memresult = mysqli_query($con, $mem);
         if (mysqli_num_rows($memresult) > 0) {
            while($memrow = mysqli_fetch_assoc($memresult)) {
        ?>
   
		
            <li><a href="update-elbows.php?uid=<?php echo $memrow["hdb"]; ?>"><?php echo utf8_decode($memrow["hips_desc"]); ?></a></li>
          
		<?php	 
		} }  else { } ?>
       </ul> 
        <?php
}
?>
</ul>
        </div>
     </div>
</div>