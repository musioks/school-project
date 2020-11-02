<form class="form-horizontal" >
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Submit Stream Scores</legend>
            
        </fieldset>
</form>
<form method="post" action="<?php echo base_url();?>index.php/admin/submit_stream_score" enctype="multipart/form-data">
  <?php echo validation_errors(); ?>

            <?php if($this->session->flashdata('result_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('result_message');
 
                    ?>
                </div>
            <?php endif;?>

           
<table class="table ">
  
  </tr>
  <tr>
    <td>
        <span class="span3">Class:</span><select id="" name="class_id">
                    <?php 
                    $classes    =   $this->crud_model->get_classes();
                    foreach($classes as $row):
                    ?>
                    <option value="<?php echo $row['class_id'];?>"><?php echo $row['class'];?></option>
                    <?php endforeach;?>
                </select><div>&nbsp;</div>
                <input type="hidden" name="class_name" value="<?php echo $row['class'];?>"  />
    </td>
    <td>
        <span class="span3">stream:</span><select id="" name="stream_id">
                    <?php 
                    $streams    =   $this->crud_model->get_Streams();
                    foreach($streams as $row):
                    ?>
                    <option value="<?php echo $row['stream_id'];?>"><?php echo $row['stream_name'];?></option>
                    <?php endforeach;?>
                </select><div>&nbsp;</div>
                <input type="hidden" name="stream_name" value="<?php echo $row['stream_name'];?>"  />
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
    <input type="hidden" name="exam_name" value="<?php $row['exam_name'];?>"  />
                </td>
               
              
</tr>   
<tr>
  <td>
  <span class="span3">Year :</span> <input type="text" class="typeahead" name="year" placeholder="e.g 2014" value="<?php echo date(Y); ?>" /></td>
  <td>
  <span class="span3">Term:</span><select id="" name="term_id">
                    <?php 
                    $streams    =   $this->crud_model->get_terms();
                    foreach($streams as $row):
                    ?>
                    <option value="<?php echo $row['term_id'];?>"><?php echo $row['term_name'];?></option>
                    <?php endforeach;?>
                </select><div>&nbsp;</div>
                <input type="hidden" name="term_name" value="<?php echo $row['term_name'];?>"  />
                </td>
                <td>
  <span class="span3">Subject:</span><select id="" name="subject_code">
                    <?php 
                    $subjects    =   $this->crud_model->get_subjects();
                    foreach($subjects as $row):
                    ?>
                    <option value="<?php echo $row['subject_code'];?>"><?php echo $row['subject_name'];?></option>
                    
                    <?php endforeach;?>
                    <!--<input type="hidden" name="subject_name" value="<?php echo $row['subject_name'];?>"  />-->
                </select>
  
                </td>
                
</tr>             
<div>&nbsp;</div>
<div>&nbsp;</div>
</table>
    <?php
    $_POST['subject_name'] = $row['subject_name'];
    
    ?>

<div class="form-actions">
        <input type="hidden" name="operation" value="create"  />
            <input type="submit" class="btn btn-primary" value="View Students" style="margin-right:30px;" />
            <input type="reset" class="btn" value="reset form" />
</div>
</form>

