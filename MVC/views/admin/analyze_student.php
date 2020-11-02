<form class="form-horizontal" >
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Analyze Students</legend>
            
        </fieldset>
</form>
<h2> Enter Details</h2>
<form method="post" action="<?php echo base_url();?>index.php/admin/student_analysis" enctype="multipart/form-data">
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
<span class="span3">Class:</span>    
<select id="" name="class_id"> 
                    <?php 
                    $class    =   $this->crud_model->get_classes();
                    ?>

                   <?php foreach ($class as $row) :?>
                  <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class'] ?></option>
                  <?php endforeach; ?>

                    
</select>
    </td>
       
    <td>
<span class="span3">Exam :</span> 
<select id="" name="exam_type_id"> 
                    <?php 
                    $exams    =   $this->crud_model->get_exam_type();
                    ?>

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
  <span class="span3">Year :</span> 
  <input type="text" class="typeahead" name="year" placeholder="e.g 2014" value="<?php echo date(Y); ?>" /></td>
               
                    
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

