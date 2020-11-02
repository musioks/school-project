	<?php 
	if(isset($personal_profile) == true):
	$parent_info	=	$this->crud_model->get_parent_info($current_parent_id);
	foreach($parent_info as $row):?>
	
    <button  class="pull-right btn  btn-info" onclick="printDiv('printableArea')" >
    	<i class="icon icon-print icon-white"></i> Print</button>
<div id="printableArea">
	<form class="form-horizontal" method="post" >
			<fieldset>
				<legend><i class="icon32 icon-user"></i>parent's Personal Profile </legend>
                
                	
				    <center>
                    <img src="<?php echo $this->crud_model->get_image_url('parent' , $row['parent_id']);?>" class="image_thumbnail_large" style="max-height:200px; max-width:200px;" />
                    <table class="table table-striped " style="width:500px;">

                        <?php if($row['id_no'] != ''):?>
                        <tr>
                            <td width="150">ID Number</td>
                            <td><b><?php echo $row['id_no'];?></b></td>
                        </tr>
                        <?php endif;?>
                        <?php if($row['fname'] != ''):?>
                        <tr>
                            <td width="150">First Name</td>
                            <td><b><?php echo $row['fname'];?></b></td>
                        </tr>
                        <?php endif;?>
                        <?php if($row['lname'] != ''):?>
                        <tr>
                            <td width="150">First Name</td>
                            <td><b><?php echo $row['lname'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['relationship'] != ''):?>
                        <tr>
                            <td>Relationship</td>
                            <td><b><?php echo $row['relationship'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['std_admno'] != ''):?>
                        <tr>
                            <td>Student AdmNo</td>
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
	<?php endforeach;
endif;
?>
