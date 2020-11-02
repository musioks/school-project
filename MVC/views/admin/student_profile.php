<?php 

	error_reporting(0);
$con=new PDO("mysql:host=localhost;dbname=school","root","");
$email = $this->session->userdata('email');
$student_info=$con->prepare("SELECT  s1.student_id,s1.adm_no,s1.fname,s1.lname,s1.email,s1.doa,s1.dob,s1.class_id,s1.parent_name,s1.parent_contact,s1.disability,s1.special_condition,s1.stream_id,c1.class, t1.stream_name
    FROM student s1
    INNER JOIN class c1 ON s1.class_id=c1.class_id
    INNER JOIN stream t1 ON s1.stream_id=t1.stream_id
    WHERE email=?
  ");
$student_info->bindParam(1,$email);
$student_info->execute();
$data=$student_info->fetchAll();
foreach($data as $row){
    
    ?>

        <button  class="pull-right btn  btn-info" onclick="printDiv('printableArea')" >
    	<i class="icon icon-print icon-white"></i> Print</button>
<div id="printableArea">
	<form class="form-horizontal" method="post" >
<fieldset>
        <legend><i class="icon32 icon-user"></i>My Profile </legend>           

        <center>
            <table class="table table-bordered" style="width:800px;">
    <?php if($row['adm_no'] != ''):?>             
    <tr>
        <td width="300px">ADM NO:</td>
        <td width="250px"><b><?php echo $row['adm_no'];?></b></td>
        <td rowspan="6"><center><img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" class="image_thumbnail_large" style="max-height:200px; max-width:200px;" /></center></td>
      
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
                            <td><b>Form <?php echo $row['class'];?></b></td>
                        </tr>
                        <?php endif;?>
                           <?php if($row['email'] != ''):?>
                        <tr>
                            <td>Email Address</td>
                            <td><b><?php echo $row['email'];?></b></td>

                           
                        </tr>
                        <?php endif;?>
                           <?php if($row['gender'] != ''):?>
                        <tr>
                            <td>Gender</td>
                            <td><b><?php echo $row['gender'];?></b></td>

                           
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
                            <td>Date Of Birth</td>
                            <td><b><?php echo $row['dob'];?></b></td>
                        </tr>
                        <?php endif;?>
                        <?php if($row['doa'] != ''):?>
                        <tr>
                            <td>Date Of Admission</td>
                            <td><b><?php echo $row['doa'];?></b></td>
                            
                        </tr>
                        <?php endif;?>
                    
                        <?php if($row['gender'] != ''):?>
                        <tr>
                            <td>Gender</td>
                            <td><b><?php echo $row['gender'];?></b></td>
                            <?php if($row['address'] != ''):?>
                                <td><?php echo $row['address'];?></td>
                            <?php endif;?>
                        </tr>
                        <?php endif;?>
                        <?php if($row['religion'] != ''):?>
                        <tr>
                            <td>Religion</td>
                            <td><b><?php echo $row['religion'];?></b></td>
                            <?php if($row['email'] != ''):?>
                       
                            <td><b>Email</b></td>
                            
                       
                        <?php endif;?>
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
</table>
                                    
                                </center>
        
			</fieldset>
		</form>
</div>	
       

<?php  }

?>

