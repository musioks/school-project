<form class="form-horizontal" >
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>View Scores</legend>
            
        </fieldset>
</form>
<form method="post" action="<?php echo base_url();?>index.php/admin/student_results" enctype="multipart/form-data">
  <?php echo validation_errors(); ?>

            <?php if($this->session->flashdata('grade_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('grade_message');?>
                </div>
            <?php endif;?>

            
<table class="table ">
  
  </tr>
  <tr>
  <?php 

	
	//$student_info	=	$this->crud_model->get_student_information($email);
$student_info	= mysql_query("select s.student_id, s.adm_no, s.fname, s.lname, s.dob, s.doa, s.gender, s.religion, s.address, c.class, t.stream_name, s.parent_id, s.email FROM student s, class c, stream t WHERE s.class_id = c.class_id AND s.stream_id = t.stream_id AND s.email='".$email."'");
	
while ($row = mysql_fetch_array($student_info)){
    
    ?>
     
    
<input type="hidden" class="typeahead" name="adm_no" value="<?php echo $row['adm_no']?>" />

<?php }?>
    <td>
<span class="span3">Exam :</span> 
<select id="" name="exam_type_id"> 
                    <?php 
                    $exams    =   $this->crud_model->get_exam_type();
                    ?>
    
                    <?php
                    foreach($exams as $exam):
                    ?>

                    <option value="<?php echo $exam['exam_id'];?>"><?php echo $exam['exam_name'];?></option>
                    <?php endforeach;?>
                </select>
                </td>
               
              <td>
  <span class="span3">Term:</span><select id="" name="term_id">
                    <?php 
                    $streams    =   $this->crud_model->get_terms();
                    foreach($streams as $row):
                    ?>
                    <option value="<?php echo $row['term_id'];?>"><?php echo $row['term_name'];?></option>
                    <?php endforeach;?>
                </select><div>&nbsp;</div>
                </td>
</tr>   
<tr>
  <td>
  <span class="span3">Year :</span> <input type="text" class="typeahead" name="year" placeholder="e.g 2014" value="<?php echo date(Y); ?>" /></td>
                <td></td>
                <td></td>

  
</tr>             
<div>&nbsp;</div>
<div>&nbsp;</div>
</table>

<div class="form-actions">
        <input type="hidden" name="operation" value="create"  />
            <input type="submit" class="btn btn-primary" value="Submit" style="margin-right:30px;" />
            <input type="reset" class="btn" value="reset form" />
</div>
</form>

