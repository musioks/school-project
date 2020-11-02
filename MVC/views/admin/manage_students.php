<form class="form-horizontal">
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Student list</legend>
            <div class="center">
            
            </div>
        </fieldset>
</form>
<table class="table table-striped table-bordered bootstrap-datatable datatable">
  <thead>
      <tr>
          <th>Adm Number</th>
          <!--<th width="80">Photo</th>-->
          <th>First name</th>
          <th>Last Name</th>          
          <th>Gender</th>
          <th>class</th>
          <th>Stream</th>
          <th>KCPE Marks</th>
          <th>Religion</th>
          <th width="60">Age</th>
          <th >Parent Name</th>         
          <th>Parent Contact</th>         
          <th width="400">Action</th>
      </tr>
  </thead>   
  <tbody>
    <?php 
    $students = $this->crud_model->get_students();
    foreach($students as $row): ?>
    <tr>
        <td><?php echo $row['adm_no'];?></td>
        <td><?php echo $row['fname'];?></td>
        <td><?php echo $row['lname'];?></td>           
        <td><?php echo $row['gender']; ?></td>  
        <td>F<?php echo $row['class']; ?></td>  
        <td><?php echo $row['stream_name']; ?></td>
        <td><?php echo $row['kcpe_marks']; ?></td>
        <td><?php echo $row['religion'];?></td>
        <td><?php echo $row['Age'];?></td>
        <td><?php echo $row['parent_name'];?></td>
        <td><?php echo $row['parent_contact'];?></td>
       
        <td>
            <a class="btn btn-success" 
            	href="<?php echo base_url();?>index.php/admin/viewstudents/personal_profile/<?php echo $row['student_id'];?>">
                <i class="icon-user icon-white"></i>  
                Profile                                         
            </a>
           
           
        </td>
    </tr>
    <?php endforeach;?>
   </tbody>
</table>