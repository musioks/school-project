<div class="row-fluid">
    <div class="box span12">
	<div class="box-header well">Profile
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
	</div>
        
        <div class="box-content">
        	<?php 
	$email = $this->session->userdata('email');
	$teacher_info	=	$this->crud_model->get_teacher($email);
	foreach($teacher_info as $row):?>
	
    <button  class="pull-right btn  btn-info" onclick="printDiv('printableArea')" >
    	<i class="icon icon-print icon-white"></i> Print</button>
            <div id="printableArea" style="border: 1px solid #1b3650">
	<form class="form-horizontal" method="post" >
			<fieldset>
				<legend><i class="icon32 icon-user"></i>My Profile </legend>         
                	
		<center>
                    <img src="<?php echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']);?>" class="image_thumbnail_large" style="max-height:200px; max-width:200px;" />
                    <table class="table table-striped table-bordered" style="width:500px;">

                        <?php if($row['fname'] != ''):?>
                        <tr>
                            <td width="150">First Name</td>
                            <td><b><?php echo $row['fname'];?></b></td>
                        </tr>
                        <?php endif;?>
                        <?php if($row['lname'] != ''):?>
                        <tr>
                            <td width="150">Last Name</td>
                            <td><b><?php echo $row['lname'];?></b></td>
                        </tr>
                        <?php endif;?>
                            <?php if($row['initials'] != ''):?>
                        <tr>
                            <td width="150">Initials</td>
                            <td><b><?php echo $row['initials'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['dob'] != ''):?>
                        <tr>
                            <td>date of Birth</td>
                            <td><b><?php echo $row['dob'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['gender'] != ''):?>
                        <tr>
                            <td>Gender</td>
                            <td><b><?php echo $row['gender'];?></b></td>
                        </tr>
                        <?php endif;?>                    
                                            
                        <?php if($row['religion'] != ''):?>
                        <tr>
                            <td>Religion</td>
                            <td><b><?php echo $row['religion'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['tsc'] != ''):?>
                        <tr>
                            <td>TSC Number</td>
                            <td><b><?php echo $row['tsc'];?></b></td>
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

?>

        </div>    
    </div>
    
</div>
