
<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/submit_class_results" enctype="multipart/form-data">
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Submit Stream Results</legend>
            <div class="center">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th width="150">Class</th>
                    <th width="150">Stream</th>
                    <th width="150">Exam</th>
                    <th>Year </th>
                    <th>Term</th>
                    <th>Subject</th>
                  </tr>

                </thead>
                 
                 
                <tbody>
    <?php 
     
     $details = $this->crud_model->get_stream_info($class_id, $stream_id, $term_id, $exam_type_id, $subject_id);     
      foreach ($details as $detail):
    ?>
    
    <tr>
        <td><?php echo $detail['class'];?><input type="hidden" name="class_id" value="<?php echo $detail['class_id']?>"></td>        
        <td><?php echo $detail['stream_name'];?><input type="hidden" name="stream_id" value="<?php echo $detail['stream_id']?>"></td>
        <td><?php echo $detail['exam_name'];?><input type="hidden" name="exam_id" value="<?php echo $detail['exam_id']?>"></td>
        <td><?php echo $year; ?><input type="hidden" name="year" value="<?php echo $year;?>"></td>
        <td><?php echo $detail['term_name']; ?><input type="hidden" name="term_id" value="<?php echo $detail['term_id']?>"></td>                       
        <td><?php echo $detail['subject_name'];?><input type="hidden" name="subject_id" value="<?php echo $detail['subject_id']?>"></td>
       
    </tr>
   <?php endforeach; ?>
    

    </tbody>

  </table>

            <div class="center">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th width="150">Adm No</th>
                    <th width="150">First Name</th>
                    <th width="150">Last Name</th>
                    <th width="250">Score</th>                    
                  </tr>
                </thead>
                 
    <tbody>
    <?php 
     

      $results = $this->crud_model->get_stream_details($class_id, $stream_id);
      
     // while ($row = mysql_fetch_array($results)){
          foreach ($results as $row):  
      
    ?>    
    <tr>
        <td><?php echo $row['adm_no'];?><input type="hidden" name="adm_no[]" value="<?php echo $row['adm_no']?>"></td> 
        <td><?php echo $row['fname'];?></td> 
        <td><?php echo $row['lname'];?></td> 
        <td><span class="span3"></span> <input type="text" class="typeahead" name="score[]"/></td>  
        
    </tr>  
<?php endforeach; ?>
<?php 
//foreach ($results as $res):
//    echo($res['adm_no']);
//    echo '<br/>';   
//endforeach;


 ?>
    </tbody>

  </table>
             
            
            </div>
        </fieldset>
    
   <div class="form-actions">        
            <input type="submit" class="btn btn-primary" value="Submit Scores" />            
</div>
</form>
