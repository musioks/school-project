<!-- left menu starts -->
            <div class="span2 main-menu-span" >
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <?php if($this->session->userdata('level')==3){ 
                            $con=new PDO("mysql:host=localhost;dbname=school","root","");
                            $email = $this->session->userdata('email');    
                         $student_info=$con->prepare("SELECT  s1.student_id,s1.adm_no,s1.fname,s1.lname,s1.email,s1.doa,s1.dob,s1.class_id,
    s1.stream_id,c1.class, t1.stream_name
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
                                <li><center><img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" class="image_thumbnail_large" style="max-height:200px; max-width:180px;" /></center></li>                                
                          <?php  }                          
                            }
                            else{
                                
                            }
                            if($this->session->userdata('level')==2){ 
                            $email = $this->session->userdata('email');    
                            $teacher_info	= mysql_query("select teacher_id FROM teacher where email='".$email."'");
                                                    
                            while ($row = mysql_fetch_array($teacher_info)) {?>
                                <li><center><img src="<?php echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']);?>" class="image_thumbnail_large" style="max-height:180px; max-width:200px; min-width: 180px" /></center></li>                                
                          <?php  }                          
                            }
                            else{
                                
                            }
                            if($this->session->userdata('level')==4){ 
                            $email = $this->session->userdata('email');    
                            $parent_info	= mysql_query("select parent_id FROM parent where email='".$email."'");
                                                    
                            while ($row = mysql_fetch_array($parent_info)) {?>
                                <li><center><img src="<?php echo $this->crud_model->get_image_url('parent' , $row['parent_id']);?>" class="image_thumbnail_large" style="max-height:180px; max-width:180px; min-width: 180px" /></center></li>
                          <?php  }                          
                            }
                            else{
                                
                            }
?>
                        
                        <li class="nav-header hidden-tablet" style="padding:20px;"><h4>Navigation</h4></li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/dashboard"  class="ajax-link" 
                            	data-rel="popover" data-content="Admin Dashboard">
                                	<i class="icon-calendar"></i>
                                        <?php if($this->session->userdata('level')==1){ ?>
                                		<span class="hidden-tablet">Admin Dashboard</span>
                                        <?php }
                                        
                                        else if($this->session->userdata('level')==2){?>
                                               <span class="hidden-tablet"> Teacher Dashboard</span> 
                                        <?php }
                                          
                                         else if($this->session->userdata('level')==3){?>
                                               <span class="hidden-tablet"> Student Dashboard</span> 
                                        <?php }?>
                            </a>
                        </li>
        <?php if($this->session->userdata('level')==1){?>
                         <li>
                            <a href="<?php echo base_url();?>index.php/admin/students"  class="ajax-link" 
                                data-rel="popover" data-content="Watch/create/edit/print the student list classwise, personal detail and academic result">
                                    <i class="icon-user"></i>
                                        <span class="hidden-tablet">Manage students</span>
                            </a>
                        </li>
                        <?php }?>
                           <?php if($this->session->userdata('level')==2){?>
                         <li>
                            <a href="<?php echo base_url();?>index.php/admin/viewstudents"  class="ajax-link" 
                                data-rel="popover" data-content="Watch/create/edit/print the student list classwise, personal detail and academic result">
                                    <i class="icon-user"></i>
                                        <span class="hidden-tablet">View students</span>
                            </a>
                        </li>
                        <?php }?>
                    <?php if($this->session->userdata('level')==1){?>
                         <li>
                            <a href="<?php echo base_url();?>index.php/admin/teachers"  class="ajax-link"
                                data-rel="popover" data-content="Watch/create/edit/print the teacher list, personal detail">
                                    <i class="icon-th"></i>
                                        <span class="hidden-tablet">Manage teachers</span>
                            </a>
                        </li>
                    <?php }?>

                       <?php if($this->session->userdata('level')==1){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/subjects"  class="ajax-link"
                            	data-rel="popover" data-content="Watch/create/edit subjects. Subjects are different with respect to class">
                                	<i class="icon-book"></i>
                               <span class="hidden-tablet">Manage subjects</span>
                            </a>
                        </li>
                       <?php } ?>
                       <?php if($this->session->userdata('level')==1){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/classes"  class="ajax-link"
                            	data-rel="popover" data-content="Watch/create/edit class list of the institution">
                                	<i class="icon-home"></i>
                                		<span class="hidden-tablet">Manage Classes</span>
                            </a>
                        </li>
                       <?php } ?>
                        <?php if($this->session->userdata('level')==1){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/streams"  class="ajax-link"
                                data-rel="popover" data-content="View/create/edit stream list of the school">
                                    <i class="icon-list"></i>
                                        <span class="hidden-tablet">Manage Streams</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($this->session->userdata('level')==1 || $this->session->userdata('level')==2){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/grades"  class="ajax-link" 
                                data-rel="popover" data-content="Student Grades">
                                    <i class="icon-pencil"></i>
                                        <span>Manage Grades</span>
                            </a>
                        </li>
                        <?php } ?>
                          <?php if($this->session->userdata('level')==1){?>
                         <li>
                            <a href="<?php echo base_url();?>index.php/admin/disciplines"  class="ajax-link"
                                data-rel="popover" data-content="Watch/create/edit/print discipline cases list, edit discipline detail">
                                    <i class="icon-list-alt "></i>
                                        <span class="hidden-tablet">Discipline Cases</span>
                            </a>
                        </li>
                  <?php }?>
                        <?php if($this->session->userdata('level')==1){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/backup_restore"  class="ajax-link"
                            	data-rel="popover" data-content="Create/restore data backup">
                                	<i class="icon-download-alt"></i>
                                		<span class="hidden-tablet">Backup-Restore</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($this->session->userdata('level')==1){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/settings"  class="ajax-link"
                            	data-rel="popover" data-content="Institute settings">
                                	<i class="icon-wrench"></i>
                                		<span class="hidden-tablet">Settings</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($this->session->userdata('level')==3){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/student_profile"  class="ajax-link"
                            	data-rel="popover" data-content="student profile">
                                	<i class="icon-user"></i>
                                		<span class="hidden-tablet">My Profile</span>
                            </a>
                        </li>                        
                        <?php } ?>
                             <?php if($this->session->userdata('level')==4){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/parent_profile"  class="ajax-link"
                            	data-rel="popover" data-content="student profile">
                                	<i class="icon-user"></i>
                                		<span class="hidden-tablet">My Profile</span>
                            </a>
                        </li>
                        
                        <?php } ?>
                        <?php if($this->session->userdata('level')==3){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/student_view_score"  class="ajax-link"
                            	data-rel="popover" data-content="student results">
                                	<i class="icon-file"></i>
                                		<span class="hidden-tablet">View Results</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($this->session->userdata('level')==4){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/view_score_student"  class="ajax-link"
                            	data-rel="popover" data-content="student results">
                                	<i class="icon-file"></i>
                                		<span class="hidden-tablet">Student Results</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($this->session->userdata('level')==2){?>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/teacher_profile"  class="ajax-link"
                            	data-rel="popover" data-content="teacher profile">
                                	<i class="icon-user"></i>
                                		<span>My Profile</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                	
                </div>
            </div> 
			<!-- left menu ends -->