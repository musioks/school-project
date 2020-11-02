<form class="form-horizontal" >
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Submit Scores</legend>
            
        </fieldset>
</form>
<form method="post" action="<?php echo base_url();?>index.php/admin/submit_grades" enctype="multipart/form-data">
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
    <td>
<span class="span3">Adm No:</span>    <input type="text" class="typeahead" name="adm_no" placeholder="e.g 1001" value="" />
    </td>
    <td>
<span class="span3">Exam :</span> <select id="" name="exam_type_id">
 
                    <?php 
                    $exams    =   $this->crud_model->get_exam_type();?>

                     <?php if(!empty($exam_type_id)) {?>
                  <option value="<?php echo $exam_type_id; ?>"><?php echo $exam['{$exam_type_id}']['exam_name'] ?></option>
                  <?php } ?>

                    
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
                <td>
  <span class="span3">Subject:</span><select id="" name="subject_id">
                    <?php 
                    $subjects    =   $this->crud_model->get_subjects();
                    foreach($subjects as $row):
                    ?>
                    <option value="<?php echo $row['subject_id'];?>"><?php echo $row['subject_name'];?></option>
                    
                    <?php endforeach;?>
                </select>
                </td>
                <td>
   <span class="span3">Score: </span><input type="text" class="typeahead" name="score" placeholder="80" value="<?php echo set_value('score'); ?>" /></td>             <td>

                  <!--<input type="submit" name="view_students" value="View Students">-->
                </td>
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

<!--  <thead>
      <tr>
          <th>Admission Number</th>
          <th>Score</th>
          
      </tr>
  </thead>  

  <tbody>

    <?php 
    //$students = $this->crud_model->get_students_stream($class_id, $stream_id);
    $students = $this->crud_model->display_students(3, 2);
    foreach($students as $row): ?>
    <tr>
        <td><?php echo $row['adm_no'];?></td>       
        <td><input type="text" class="span4 typeahead" name="<?php echo $row['adm_no[]'];?>" placeholder="score" value="<?php echo set_value('score'); ?>" /></td>
        
    </tr>
    <?php endforeach;?>
   </tbody>

</table>
-->