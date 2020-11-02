<div class="row-fluid">
    <?php
    
    $top_student = $this->crud_model->get_top_student($class_id,$term_id,$exam_type_id,$year);
    
    ?>
    <div class="box span12">
	<div class="box-header well">TOP STUDENT
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
	</div>
        
        <div class="box-content">
            <table class="table table-striped table-bordered dataTables_filter" id="resultstop">
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
           <?php foreach($top_student as $row): ?>
    <tr>
        <td><?php echo $row['adm_no'];?></td>        
        <td><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>
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
    </div>
    
</div>


<div class="row-fluid">
    <?php
    
    $top_student = $this->crud_model->get_top_three($class_id,$term_id,$exam_type_id,$year);
    
    ?>
    <div class="box span12">
	<div class="box-header well">TOP 3 STUDENTS
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
	</div>
        
        <div class="box-content">
            <table class="table table-striped table-bordered dataTables_filter" id="resultsthree">
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
           <?php foreach($top_student as $row): ?>
    <tr>
        <td><?php echo $row['adm_no'];?></td>        
        <td><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>
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
    </div>
    
</div>

<div class="row-fluid">
    <?php
    
    $top_student = $this->crud_model->get_top_ten($class_id,$term_id,$exam_type_id,$year);
    
    ?>
    <div class="box span12">
	<div class="box-header well">TOP 10 STUDENTS
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
	</div>
        
        <div class="box-content">
            <table class="table table-striped table-bordered dataTables_filter" id="results10">
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
           <?php foreach($top_student as $row): ?>
    <tr>
        <td><?php echo $row['adm_no'];?></td>        
        <td><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>
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
    </div>
    
</div>
<div class="row-fluid">
    <?php
    
    $top_student = $this->crud_model->get_last_ten($class_id,$term_id,$exam_type_id,$year);
    
    ?>
    <div class="box span12">
	<div class="box-header well">LAST 10 STUDENTS
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
	</div>
        
        <div class="box-content">
            <table class="table table-striped table-bordered dataTables_filter" id="resultslast">
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
           <?php foreach($top_student as $row): ?>
    <tr>
        <td><?php echo $row['adm_no'];?></td>        
        <td><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>         
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
    </div>
    
</div>

<script>
    var table = document.getElementById('resultstop');
var tbody = table.getElementsByTagName('tbody')[0];
var cells = tbody.getElementsByTagName('td');

for (var i=0, len=cells.length; i<len; i++){
    if (parseInt(cells[i].innerHTML,10) >=30 && parseInt(cells[i].innerHTML,10) < 50){
        cells[i].style.backgroundColor = 'yellow';
    }
    else if (parseInt(cells[i].innerHTML,10) < 30){
        cells[i].style.backgroundColor = 'red';
    }
    
}


</script>
<script>
    var table = document.getElementById('results10');
var tbody = table.getElementsByTagName('tbody')[0];
var cells = tbody.getElementsByTagName('td');

for (var i=0, len=cells.length; i<len; i++){
    if (parseInt(cells[i].innerHTML,10) >=30 && parseInt(cells[i].innerHTML,10) < 50){
        cells[i].style.backgroundColor = 'yellow';
    }
    else if (parseInt(cells[i].innerHTML,10) < 30){
        cells[i].style.backgroundColor = 'red';
    }
    
}


</script>
<script>
    var table = document.getElementById('resultsthree');
var tbody = table.getElementsByTagName('tbody')[0];
var cells = tbody.getElementsByTagName('td');

for (var i=0, len=cells.length; i<len; i++){
    if (parseInt(cells[i].innerHTML,10) >=30 && parseInt(cells[i].innerHTML,10) < 50){
        cells[i].style.backgroundColor = 'yellow';
    }
    else if (parseInt(cells[i].innerHTML,10) < 30){
        cells[i].style.backgroundColor = 'red';
    }
    
}


</script>
<script>
    var table = document.getElementById('resultslast');
var tbody = table.getElementsByTagName('tbody')[0];
var cells = tbody.getElementsByTagName('td');

for (var i=0, len=cells.length; i<len; i++){
    if (parseInt(cells[i].innerHTML,10) >=30 && parseInt(cells[i].innerHTML,10) < 50){
        cells[i].style.backgroundColor = 'yellow';
    }
    else if (parseInt(cells[i].innerHTML,10) < 30){
        cells[i].style.backgroundColor = 'red';
    }
    
}


</script>