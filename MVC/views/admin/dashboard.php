<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
		</div>
        
		<div class="box-content">
        	<form class="form-horizontal" method="post" action="">
                        <fieldset>
                            <?php if($this->session->userdata('level')==1){ ?>
                            <legend><i class="icon32 icon-clipboard"></i>Admin Dashboard</legend>
                                        <?php }
                                        
                                        else if($this->session->userdata('level')==2){?>
                                               <legend><i class="icon32 icon-clipboard"></i>Teacher Dashboard</legend>
                                        <?php }
                                               else if($this->session->userdata('level')==3){?>
                                               <legend><i class="icon32 icon-clipboard"></i>Student Dashboard</legend>
                                        <?php }
                                               else if($this->session->userdata('level')==4){?>
                                               <legend><i class="icon32 icon-clipboard"></i>Parent Dashboard</legend>
                                        <?php }?>
                            
                        </fieldset>
                        
                        <center>
                        	<h2>Welcome <?php echo $this->session->userdata('name');?></h2>
                        	<?php echo date("D, d M, Y");?>
                                
                        </center>   

			</form>
        </div>
        <div class="box-content">
            <?php if($this->session->userdata('level')==1){?>

            <a class="well span4 top-block"
                href="<?php echo base_url();?>index.php/admin/students">
                <span class="icon32 icon-color icon-users"></span>
                <div>Manage Students</div>
                <div>(total <?php echo $this->db->get('student')->num_rows();?>)</div>
                <span class="notification red"><?php echo $this->db->get('student')->num_rows();?> </span>
            </a>
            <?php } ?>
  <?php if($this->session->userdata('level')==2){?>

            <a class="well span4 top-block"
                href="<?php echo base_url();?>index.php/admin/viewstudents">
                <span class="icon32 icon-color icon-users"></span>
                <div>View Students</div>
                <div>(total <?php echo $this->db->get('student')->num_rows();?>)</div>
                <span class="notification red"><?php echo $this->db->get('student')->num_rows();?> </span>
            </a>
            <?php }
            else if($this->session->userdata('level')==3){?>
            <a class="well span6 top-block"
                href="<?php echo base_url();?>index.php/admin/student_view_score">
                <span class="icon32 icon-color icon-clipboard"></span>
                <div>View Results</div>           
            </a>
       <?php }?>
            <?php if($this->session->userdata('level')==1){?>
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/teachers">
                <span class="icon32 icon-color icon-user"></span>
                <div>Manage Teachers</div>
                <div>(total <?php echo $this->db->get('teacher')->num_rows();?>)</div>
            </a>
            <?php } else if($this->session->userdata('level')==3){?>
            <a class="well span6 top-block"
                href="<?php echo base_url();?>index.php/admin/student_profile">
                <span class="icon32 icon-color icon-user"></span>
                <div>My Profile</div>           
            </a>
       <?php }?>
            <?php if($this->session->userdata('level')==1|| $this->session->userdata('level')==2){?>            
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/grades">
                <span class="icon32 icon-color icon-compose"></span>
                <div>Manage Grades</div>
                <div>&nbsp;</div>
            </a>
            
       <?php }?>
            <?php if($this->session->userdata('level')==2){?>
            
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/teacher_profile">
                <span class="icon32 icon-color icon-user"></span>
                <div>My Profile</div>
                <div>&nbsp;</div>
                
            </a>
             <?php }?>
            
        </div>
        <div class="box-content">
            <?php if($this->session->userdata('level')==1){?>
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/subjects">
                <span class="icon32 icon-color icon-book"></span>
                <div>Subjects</div>
                <div>&nbsp;</div>
            </a>
            <?php }?>
            <?php if($this->session->userdata('level')==1){?>
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/backup_restore">
                <span class="icon32 icon-color icon-archive"></span>
                <div>System backup/restore</div>
                <div>&nbsp;</div>
            </a>
            <?php }?>
            <?php if($this->session->userdata('level')==1){?>
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/settings">
                <span class="icon32 icon-color icon-wrench"></span>
                <div>System settings</div>
                <div>&nbsp;</div>
            </a>
            <?php } ?>
            
        </div>
<?php //echo $this->session->userdata('email'); ?>
    </div>
</div>
