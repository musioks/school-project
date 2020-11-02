<?php 
	if(isset($personal_profile) == true):
	$student_info	=	$this->crud_model->get_student_info($current_student_id);
	foreach($student_info as $row):?>
	
    <button  class="pull-right btn  btn-info" onclick="printDiv('printableArea')" >
    	<i class="icon icon-print icon-white"></i> Print</button>
<div id="printableArea">
	<form class="form-horizontal" method="post" >
<fieldset>
        <legend><i class="icon32 icon-user"></i>student's Details </legend>           

        <center>
            <table class="table table-bordered" style="width:800px;">
    <?php if($row['adm_no'] != ''):?>             
    <tr>
        <td width="300px">ADM NO:</td>
        <td width="250px"><b><?php echo $row['adm_no'];?></b></td>
        <td rowspan="13"><center><img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" class="image_thumbnail_large" style="max-height:200px; max-width:200px;" /></center></td>
    </tr>
   <?php endif;?>
   <?php if($row['fname'] != ''):?>
    <tr>        
        <td>First Name</td>
        <td><b><?php echo $row['fname'];?></b></td>        
    </tr>
    <?php endif;?>       
    <?php if($row['lname'] != ''):?>
                        <tr>
                            <td width="150">Last Name</td>
                            <td><b><?php echo $row['lname'];?></b></td>
                        </tr>
                        <?php endif;?>
                        <?php if($row['class'] != ''):?>
                        <tr>
                            <td width="150">Class</td>
                            <td><b><?php echo $row['class'];?></b></td>
                        </tr>
                        <?php endif;?>
                        <?php if($row['stream_name'] != ''):?>
                        <tr>
                            <td width="150">Stream</td>
                            <td><b><?php echo $row['stream_name'];?></b></td>
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['dob'] != ''):?>
                        <tr>
                            <td>date of Birth</td>
                            <td><b><?php echo $row['dob'];?></b></td>
                        </tr>
                        <?php endif;?>
                        <?php if($row['doa'] != ''):?>
                        <tr>
                            <td>date of Admission</td>
                            <td><b><?php echo $row['doa'];?></b></td>
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
                        <?php if($row['parent_name'] != ''):?>
                        <tr>
                            <td>Parent Name</td>
                            <td><b><?php echo $row['parent_name'];?></b></td>
                         </tr>
                        <?php endif;?>  
                        <?php if($row['parent_contact'] != ''):?>
                        <tr>
                            <td>Parent Contact</td>
                            <td><b><?php echo $row['parent_contact'];?></b></td>
                         </tr>
                        <?php endif;?>
                        <?php if($row['disability'] != ''):?>
                        <tr>
                            <td>Disability</td>
                            <td><b><?php echo $row['disability'];?></b></td>
                         </tr>
                        <?php endif;?>
                <?php if($row['special_condition'] != ''):?>
                        <tr>
                            <td>Special Condition</td>
                            <td><b><?php echo $row['special_condition'];?></b></td>
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
