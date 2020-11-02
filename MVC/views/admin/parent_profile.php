<?php 
	
//$student_info	=	$this->crud_model->get_student_information($email);
$parent_info	= mysql_query("select parent_id,id_no,fname,lname,relationship,std_admno,phone,email from parent WHERE email='".$email."'");
	
while ($row = mysql_fetch_array($parent_info)){
    
    ?>

        <button  class="pull-right btn  btn-info" onclick="printDiv('printableArea')" >
    	<i class="icon icon-print icon-white"></i> Print</button>
<div id="printableArea">
	<form class="form-horizontal" method="post" >
<fieldset>
        <legend><i class="icon32 icon-user"></i>My Profile </legend>           

        <center>
            <table class="table table-bordered" style="width:800px;">
    <?php if($row['id_no'] != ''):?>             
    <tr>
        <td width="300px">ID NO:</td>
        <td width="250px"><b><?php echo $row['id_no'];?></b></td>
        <td><center><b>Passport</b></center></td>
        
      
    </tr>
   <?php endif;?>
   <?php if($row['fname'] != ''):?>
    <tr>        
        <td>First Name</td>
        <td><b><?php echo $row['fname'];?></b></td>  
        <td rowspan="7"><center><img src="<?php echo $this->crud_model->get_image_url('parent' , $row['parent_id']);?>" class="image_thumbnail_large" style="max-height:200px; max-width:200px;" /></center></td>
    </tr>
    <?php endif;?>       
    <?php if($row['lname'] != ''):?>
                        <tr>
                            <td width="150">Last Name</td>
                            <td><b><?php echo $row['lname'];?></b></td>
                        </tr>
                        <?php endif;?>
                        <?php if($row['relationship'] != ''):?>
                        <tr>
                            <td width="150">Relationship</td>
                            <td><b><?php echo $row['relationship'];?></b></td>
                        </tr>
                        <?php endif;?>
                        <?php if($row['std_admno'] != ''):?>
                        <tr>
                            <td width="150">Student AdmNo</td>
                            <td><b><?php echo $row['std_admno'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['phone'] != ''):?>
                        <tr>
                            <td>Phone</td>
                            <td><b><?php echo $row['phone'];?></b></td>
                        </tr>
                        <?php endif;?>
                        <?php if($row['email'] != ''):?>
                        <tr>
                            <td>Email</td>
                            <td><b><?php echo $row['email'];?></b></td>
                            
                        </tr>
                        <?php endif;?>                    
                        
</table>
                                    
                                </center>
        
			</fieldset>
		</form>
</div>	
       

<?php  }

?>

