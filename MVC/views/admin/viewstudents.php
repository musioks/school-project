
<!--MANAGE STUDENT LISTS-->
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
		</div>
        
		<div class="box-content">
        	            
        	<!--TAB UI FOR Students-->
            <ul class="nav nav-tabs" id="myTab">
            	<?php if(isset($personal_profile) == true):?>
                	<li><a href="#personal_profile">Personal profile</a></li>
                <?php endif;?>
                
                <li class="active"><a href="#manage">View Students</a></li>
                
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	<!--PERSONAL PROFILE-->
                <div class="tab-pane" id="personal_profile">
            		<?php include 'student_personal_profile.php';?>
                </div>
                
            	
                
            	<!--View students-->
                <div class="tab-pane active" id="manage">
                	<?php include 'manage_students.php';?>
                </div>
                
            </div>
        
			
		</div>
	</div>
</div>


<?php include 'webcam.php';?>

