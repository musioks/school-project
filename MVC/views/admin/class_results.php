
<div id="printableArea">
<form class="form-horizontal">
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Overall Class Results</legend>
            <div class="center">
           
            </div>
        </fieldset>
</form>

<table class="table table-striped table-bordered dataTables_filter">
  <thead>
      <tr>
          <th>CLASS</th>
          <th>YEAR</th>
          <th>TERM</th>
          <th>EXAM</th>
      </tr>
  </thead>
  <tbody>
      <?php
     //$details = $this->crud_model->get_exam_details($class_id,$exam_type_id,$term_id,$year);
      $query = mysql_query("select e.exam_name, c.class, j.term_name,year from results r, student s, class c, stream t, exam e, term j where s.class_id=$class_id AND r.term_id=$term_id and r.exam_type_id=$exam_type_id and `year`=$year AND r.adm_no = s.adm_no AND r.term_id = j.term_id AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id group by r.adm_no Limit 1");
     while ($row = mysql_fetch_array($query)){?>
        <tr>
          <td><?php echo "Form ".$row['class']; ?></td>
          <td><?php echo $year;?></td>
          <td><?php echo $row['term_name'];?></td>
          <td><?php echo $row['exam_name'];?></td>
      </tr>
      <?php          
      
     }
       ?>
      
  </tbody>
      
    
</table>

<table class="table table-striped table-bordered dataTables_filter" id="results">
  <thead>
      <tr>
          <th>Adm No</th>
          <th>Student Name</th>
          <th>Eng</th>
          <th>Kisw</th>
          <th>Math</th> 
          <th>Chem</th>
          <th>Bio</th>
          <th>Phy</th>          
          <th>Geo</th>
          <th>Hist</th>
          <th>CRE</th>
          <th>Agric</th>
          <th>B/S</th>
          <th>Total</th>
          <th>pos</th>
          
          
          
      </tr>
  </thead>   
  <tbody>
    <?php 
    $students = $this->crud_model->get_students_class($class_id,$year,$term_id,$exam_type_id);
    foreach($students as $row): ?>
    <tr>
        <td><?php echo $row['adm_no'];?></td>        
        <td><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>
        <?php 
//        if($row['English']>0){
//            if($row['English']<50){
//                echo '<td style="background-color: red;">'.$row['English'].'</td>';
//            }
//            else{
//               echo '<td>'.$row['English'].'</td>'; 
//            }
//             
//        }
//        else{
//            echo '-';
//        }
//       
        ?>  
        <td><?php 
        if($row['English']>0){
             echo $row['English'];
        }
        else{
            echo '-';
        }
        ?>
       </td> 
        <td><?php 
        if($row['Kiswahili']>0){
             echo $row['Kiswahili'];
        }
        else{
            echo '-';
        }
        ?>
       </td>    
        <td><?php 
          if($row['Mathematics']>0){
             echo $row['Mathematics'];
        }
        else{
            echo '-';
        }        
        ?></td>    
        <td><?php 
         if($row['Chemistry']>0){
             echo $row['Chemistry'];
        }
        else{
            echo '-';
        }      
        ?></td>    
        <td><?php 
          if($row['Biology']>0){
             echo $row['Biology'];
        }
        else{
            echo '-';
        }?></td>    
        <td><?php  
        if($row['Physics']>0){
             echo $row['Physics'];
        }
        else{
            echo '-';
        }?></td>    
        <td><?php 
        if($row['Geography']>0){
             echo $row['Geography'];
        }
        else{
            echo '-';
        }
        ?></td>      
        <td><?php 
        
        if($row['History']>0){
             echo $row['History'];
        }
        else{
            echo '-';
        }
           ?></td>    
        <td><?php 
        if($row['CRE']>0){
             echo $row['CRE'];
        }
        else{
            echo '-';
        }
        ?></td>    
        <td><?php 
        if($row['Agriculture']>0){
             echo $row['Agriculture'];
        }
        else{
            echo '-';
        }
        ?></td>           
        <td><?php 
        if($row['BS']>0){
             echo $row['BS'];
        }
        else{
            echo '-';
        }
       ?></td>    
          
        <td><?php 
        
        if($row['Total']>0){
             echo $row['Total'];
        }
        else{
            echo '-';
        }?></td> 
        <td>
            <b><?php 
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
                   ?></b>
            
        </td>
        
        
    </tr>
    <?php endforeach;?>
   </tbody>
</table>
</div>
<button  class="pull-right btn  btn-danger" onclick="printDiv('printableArea')" >
    	<i class="icon icon-print icon-white"></i> Print</button>
<script>
    var table = document.getElementById('results');
var tbody = table.getElementsByTagName('tbody')[0];
var cells = tbody.getElementsByTagName('td');

for (var i=0, len=cells.length; i<len; i++){
    if (parseInt(cells[i].innerHTML,10) >=30 && parseInt(cells[i].innerHTML,10) < 50){
        cells[i].style.backgroundColor = 'whitesmoke';
    }
    else if (parseInt(cells[i].innerHTML,10) < 30){
        cells[i].style.backgroundColor = 'whitesmoke';
    }
    
}


</script>