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
                            <legend><i class="icon32 icon-clipboard"></i>Analyze Grades</legend>
                      </fieldset>  

			</form>
        </div>
        <div class="box-content">

            <a class="well span4 top-block"
                href="<?php echo base_url();?>index.php/admin/analyze_student">
                <span class="icon32 icon-color icon-users"></span>
                <div>Student-wise</div>
                <div>&nbsp;</div>
                <!--<div>(total <?php //echo $this->db->get('grades')->num_rows();?>)</div>-->
                <!--<span class="notification red"><?php //echo $this->db->get('student')->num_rows();?> </span>-->
            </a>
            
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/submit_class_student">
                <span class="icon32 icon-color icon-user"></span>
                <div>Subject-wise</div>
                <div>&nbsp;</div>
                
            </a>
            
            <a class="well span4 top-block" 
                href="<?php echo base_url();?>index.php/admin/manage_scores">
                <span class="icon32 icon-color icon-compose"></span>
                <div>Class-wise</div>
                <div>&nbsp;</div>
            </a>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div>
        

    </div>
</div>
