
    <div>&nbsp;</div>
    
<div id="printableArea">
<?php $class_results = $this->crud_model->get_class_results($class_id,$year,$term_id,$exam_type_id);  

foreach($class_results as $rows): ?>
        

<form class="form-horizontal">
    <div>
        <fieldset>
            
    <div>&nbsp;</div>
    <div>&nbsp;</div>
            <legend><i class="icon32 icon-gear"></i>STUDENT REPORT FORM</legend>

            <div class="center">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Adm No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Year </th>
                    <th>Term</th>
                    <th>Exam Type</th>
                    <th>Class</th>
                    <th>Stream</th>
                  </tr>

                </thead>           
                <tbody>
    <?php 
     
    
      $results = $this->crud_model->get_student_results($rows['adm_no'],$year,$term_id,$exam_type_id);
     
    foreach($results as $row): ?>
    
    <tr>
        <td><?php echo $row['adm_no'];?></td>        
        <td><?php echo $row['fname'];?></td>
        <td><?php echo $row['lname'];?></td>          
        <td><?php echo $year ?></td>  
        <td><?php echo $term_id ?></td> 
        <td><?php echo $row['exam_name']; ?></td>
        <td><?php echo $row['class'];?></td>        
        <td><?php echo $row['stream_name'];?></td>
       
    </tr>
   <?php endforeach; ?>


    </tbody>

  </table>
             
            
            </div>
        </fieldset>
</form>
<table class="table table-striped table-bordered bootstrap-datatable">
  <thead>
      <tr>
        <th>Subject</th>      
        <th>Score</th>
        <th>Grade</th>
        <th>Points</th>
        <th>Comment</th>          
      </tr>
  </thead>   
  <tbody>
    <?php 
    	
      $results = $this->crud_model->get_student_results($rows['adm_no'],$year,$term_id,$exam_type_id);
       foreach($results as $row): ?>
    
    <tr>  
        <td>English</td>  
        <td><?php echo $row['English']>0 ? $row['English'] : '-';?></td>        
        <td><?php  if($row['English']>0){
                  $grade =  $this->crud_model->get_grade($row['English']);
                    foreach ($grade as $mark) {
                    echo $mark['name'];
             }         
                
            }
             else {
                echo '-';
          }?></td>
        <td><?php 
        if($row['English']>0){
          
          $grade =  $this->crud_model->get_grade($row['English']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
        <td> <?php if($row['English']>0){
          
          $grade =  $this->crud_model->get_grade($row['English']);
          foreach ($grade as $mark) {
              echo $mark['comment'];
          }
          }
          else{
              echo "-";
          }?></td>
    </tr>
    <tr>  
         <td>Kiswahili</td>
          <td><?php echo $row['Kiswahili']>0 ? $row['Kiswahili'] : '-';?></td>
          <td><?php  if($row['Kiswahili']>0){
                  $grade =  $this->crud_model->get_grade($row['Kiswahili']);
                    foreach ($grade as $mark) {
                    echo $mark['name'];
             }         
                
            }
             else {
                echo '-';
          }?></td>
          <td><?php 
        if($row['Kiswahili']>0){
          
          $grade =  $this->crud_model->get_grade($row['Kiswahili']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
          <td><?php if($row['Kiswahili']>0){
          
          $grade =  $this->crud_model->get_grade($row['Kiswahili']);
          foreach ($grade as $mark) {
              echo $mark['comment'];
          }
          }
          else{
              echo "-";
          }?></td>
    </tr>
    <tr>  
        <td>Mathematics</td> 
         <td><?php echo $row['Mathematics']>0 ? $row['Mathematics'] : '-';?></td>
         <td><?php  if($row['Mathematics']>0){
                  $grade =  $this->crud_model->get_grade($row['Mathematics']);
                    foreach ($grade as $mark) {
                    echo $mark['name'];
             }         
                
            }
             else {
                echo '-';
          }?></td>
         <td><?php 
        if($row['Mathematics']>0){
          
          $grade =  $this->crud_model->get_grade($row['Mathematics']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
         <td><?php  if($row['Mathematics']>0){
                  $grade =  $this->crud_model->get_grade($row['Mathematics']);
                    foreach ($grade as $mark) {
                    echo $mark['comment'];
             }         
                
            }
             else {
                echo '-';
          }?></td>
    </tr>
    <tr>  
        <td>Chemistry</td>
         <td><?php echo $row['Chemistry']>0 ? $row['Chemistry'] : '-';?></td>
         <td><?php  if($row['Chemistry']>0){
                  $grade =  $this->crud_model->get_grade($row['Chemistry']);
                    foreach ($grade as $mark) {
                    echo $mark['name'];
             }         
                
            }
             else {
                echo '-';
          }?></td>
         <td><?php 
        if($row['Chemistry']>0){
          
          $grade =  $this->crud_model->get_grade($row['Chemistry']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
         
         <td><?php if($row['Chemistry']>0){
          
          $grade =  $this->crud_model->get_grade($row['Chemistry']);
          foreach ($grade as $mark) {
              echo $mark['comment'];
          }
          }
          else{
              echo "-";
          }?></td>
    </tr>
    <tr>  
        <td>Biology</td>
         <td><?php echo $row['Biology']>0 ? $row['Biology'] : '-';?></td>
         <td><?php  if($row['Biology']>0){
                  $grade =  $this->crud_model->get_grade($row['Biology']);
                    foreach ($grade as $mark) {
                    echo $mark['name'];
             }         
                
            }
             else {
                echo '-';
          }?></td>
         <td><?php 
        if($row['Biology']>0){
          
          $grade =  $this->crud_model->get_grade($row['Biology']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
         <td><?php if($row['Biology']>0){
          
          $grade =  $this->crud_model->get_grade($row['Biology']);
          foreach ($grade as $mark) {
              echo $mark['comment'];
          }
          }
          else{
              echo "-";
          }?></td>
    </tr>
    <tr>  
        <td>Physics</td>
        <td><?php echo $row['Physics']>0 ? $row['Physics'] : '-';?></td>
        <td><?php if($row['Physics']>0){
            $grade =  $this->crud_model->get_grade($row['Physics']);
          foreach ($grade as $mark) {
              echo $mark['name'];
          }
        }
        else{
            echo '-';
        }
?></td>
        <td><?php 
        if($row['Physics']>0){
          
          $grade =  $this->crud_model->get_grade($row['Physics']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
        <td>
            <?php if($row['Physics']>0){          
          $grade =  $this->crud_model->get_grade($row['Physics']);
          foreach ($grade as $mark) {
              echo $mark['comment'];
          }
          }
          else{
              echo "-";
          }?>
        </td>
    </tr>
    <tr>  
        <td>Geography</th>
          <td><?php echo $row['Geography']>0 ? $row['Geography'] : '-';?></td>
          <td><?php if($row['Geography']>0){
              $grade =  $this->crud_model->get_grade($row['Geography']);
          foreach ($grade as $mark) {
              echo $mark['name'];
          }
          }
          else{
              echo '-';
          }
    ?></td>
          <td><?php 
        if($row['Geography']>0){
          
          $grade =  $this->crud_model->get_grade($row['Geography']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
          <td><?php if($row['Geography']>0){
          
          $grade =  $this->crud_model->get_grade($row['Geography']);
          foreach ($grade as $mark) {
              echo $mark['comment'];
          }
          }
          else{
              echo "-";
          }?></td>
    </tr>
    <tr>  
          <td>History</th>
             <td><?php echo $row['History']>0 ? $row['History'] : '-';?></td>
             <td><?php 
             if($row['History']>0){
                  $grade =  $this->crud_model->get_grade($row['History']);
                    foreach ($grade as $mark) {
                    echo $mark['name'];
             }         
                
            }
             else {
                echo '-';
          }?></td> 
              <td><?php 
        if($row['History']>0){
          
          $grade =  $this->crud_model->get_grade($row['History']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
             <td><?php if($row['History']>0){
          
          $grade =  $this->crud_model->get_grade($row['History']);
          foreach ($grade as $mark) {
              echo $mark['comment'];
          }
          }
          else{
              echo "-";
          }?></td> 
        
    </tr>
    <tr>  
          <td>CRE</td>
          <td><?php echo $row['CRE']>0 ? $row['CRE'] : '-';?></td>
          <td><?php  if($row['CRE']>0){
                  $grade =  $this->crud_model->get_grade($row['CRE']);
                    foreach ($grade as $mark) {
                    echo $mark['name'];
             }         
                
            }
             else {
                echo '-';
          }?></td> 
          <td><?php 
        if($row['CRE']>0){
          
          $grade =  $this->crud_model->get_grade($row['CRE']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
          <td><?php if($row['CRE']>0){
          
          $grade =  $this->crud_model->get_grade($row['CRE']);
          foreach ($grade as $mark) {
              echo $mark['comment'];
          }
          }
          else{
              echo "-";
          }?></td>          
    </tr>
    <tr>  
          <td>Agriculture</td>
          <td><?php echo $row['Agriculture']>0 ? $row['Agriculture'] : '-';?></td>
          <td><?php  if($row['Agriculture']>0){
                  $grade =  $this->crud_model->get_grade($row['Agriculture']);
                    foreach ($grade as $mark) {
                    echo $mark['name'];
             }         
                
            }
             else {
                echo '-';
          }?></td>
          <td><?php 
        if($row['Agriculture']>0){
          
          $grade =  $this->crud_model->get_grade($row['Agriculture']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
          <td><?php if($row['Agriculture']>0){
          
          $grade =  $this->crud_model->get_grade($row['Agriculture']);
          foreach ($grade as $mark) {
              echo $mark['comment'];
          }
          }
          else{
              echo "-";
          }?></td>
    </tr>
    <tr>  
          <td>Business Studies</td>
          <td><?php echo $row['BS']>0 ? $row['BS'] : '-';?></td>
          <td><?php  if($row['BS']>0){
                  $grade =  $this->crud_model->get_grade($row['BS']);
                    foreach ($grade as $mark) {
                    echo $mark['name'];
             }         
                
            }
             else {
                echo '-';
          }?></td>
          <td><?php 
        if($row['BS']>0){
          
          $grade =  $this->crud_model->get_grade($row['BS']);
          foreach ($grade as $mark) {
              echo $mark['grade_point'];
          }
          }
          else{
              echo "-";
          }
        ?></td>
          <td><?php if($row['BS']>0){
          
          $grade =  $this->crud_model->get_grade($row['BS']);
          foreach ($grade as $mark) {
              echo $mark['comment'];
          }
          }
          else{
              echo "-";
          }?></td>  
    </tr>
    
    <tr>  
          <td><b>Total</b></td>
          <td><?php echo $row['Total']>0 ? $row['Total'] : '-';?></td>
          <td></td>
          <td></td>
          <td></td>
    </tr>
    <tr>  
           <td><b>Position</b></td>
           <td><b><?php 
                    $classes = $row['class_id'];
                    //$query = "SELECT * FROM `scores` where class_id=$classes AND year=$year AND term_id=$term_id AND exam_type_id=$exam_type_id order by total desc";
                    $query = "select s.fname, s.lname, e.exam_name,c.class_id, c.class, t.stream_name,
	r.adm_no,r.exam_type_id,r.term_id,`year`,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`='3' then score else 0 end) Mathematics,
  sum(case when `subject_id`='4' then score else 0 end) Chemistry,
  sum(case when `subject_id`='5' then score else 0 end) Biology,
  sum(case when `subject_id`='6' then score else 0 end) Physics,
  sum(case when `subject_id`='7' then score else 0 end) Geography,
  sum(case when `subject_id`='8' then score else 0 end) History,
  sum(case when `subject_id`='9' then score else 0 end) CRE,
  sum(case when `subject_id`='10' then score else 0 end) Agriculture,
  sum(case when `subject_id`='11' then score else 0 end) BS,
  (SUM(score)) Total
  
  
  
from results r, student s, class c, stream t, exam e where s.class_id=$classes and r.term_id=$term_id and r.exam_type_id=$exam_type_id and `year`=$year AND r.adm_no = s.adm_no AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id
group by r.adm_no order by total desc ";
                    $query2 = mysql_query("select s.fname, s.lname, e.exam_name,c.class_id, c.class, t.stream_name,
	r.adm_no,r.exam_type_id,r.term_id,`year`,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`='3' then score else 0 end) Mathematics,
  sum(case when `subject_id`='4' then score else 0 end) Chemistry,
  sum(case when `subject_id`='5' then score else 0 end) Biology,
  sum(case when `subject_id`='6' then score else 0 end) Physics,
  sum(case when `subject_id`='7' then score else 0 end) Geography,
  sum(case when `subject_id`='8' then score else 0 end) History,
  sum(case when `subject_id`='9' then score else 0 end) CRE,
  sum(case when `subject_id`='10' then score else 0 end) Agriculture,
  sum(case when `subject_id`='11' then score else 0 end) BS,
  (SUM(score)) Total
  
  
  
from results r, student s, class c, stream t, exam e where s.class_id=$classes and r.term_id=$term_id and r.exam_type_id=$exam_type_id and `year`=$year AND r.adm_no = s.adm_no AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id
group by r.adm_no order by total desc LIMIT 1");
                    $rs = mysql_query($query);
                    $prev_value = mysql_fetch_array($query2);
                    $total = $prev_value['Total'];
                    
                    $rank = 1;
                   // $pos = 1;
                  

                    $counter = 1;
                    while($r=  mysql_fetch_array($rs)){
                        if($r['Total']==$total){
                            if($r['Total']==$row['Total']){
                                echo $rank;
                                break;
                                 
                            }
                           
                            
                        }
                        else{
                            if($r['Total']==$row['Total']){
                                echo $counter;
                                $rank=$counter;
                                break;
                               
                            }                        
                        }
                        $total = $r['Total'];
                        $counter=$counter+1;
                        
                    }
                   ?></b></td>
           <td></td>
           <td></td>
           <td></td>
          
          
    </tr>          
        
       
       
        
    
   <?php endforeach; ?>
   </tbody>
   
</table>
    <DIV style="page-break-after:always"></DIV>
    
    
    

</div>



 <?php
       endforeach;
?>
</div>
 <button class="pull-right btn  btn-info" onclick="printDiv('printableArea')" >
    	<i class="icon icon-print icon-white"></i> Print</button>