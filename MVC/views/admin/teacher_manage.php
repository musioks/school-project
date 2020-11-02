<form class="form-horizontal">
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Teacher list</legend>
            <div class="center">
            
            </div>
        </fieldset>
</form>
<table class="table table-striped table-bordered bootstrap-datatable datatable">
  <thead>
      <tr>
          <th>ID Number</th>
          <th width="80">Photo</th>
          <th>First name</th>
          <th>Last Name</th>
          <th>Initials</th>
          <th>TSC No.</th>
          <th>phone</th>
          <th>Email</th>
          <th>Gender</th>
          <th width="350">Action</th>
      </tr>
  </thead>   
  <tbody>
    <?php 
    $teachers = $this->crud_model->get_teachers();
    foreach($teachers as $row): ?>
    <tr>
        <td><?php echo $row['id_no'];?></td>
        <td>
            <?php 
                if(file_exists('uploads/teacher_image/'.$row['teacher_id'].'.jpg'))
                    $image_url	=	base_url().'uploads/teacher_image/'.$row['teacher_id'].'.jpg';
                else
                    $image_url	=	base_url().'uploads/user.jpg';?>
            <img src="<?php echo $image_url;?>" class="image_thumbnail" />
        </td>
        <td><?php echo $row['fname'];?></td>
        <td><?php echo $row['lname'];?></td>    
        <td><?php echo $row['initials'];?></td>    
        <td><?php echo $row['tsc'];?></td>    
        <td><?php echo $row['phone'];?></td>    
        <td><a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a></td>
        <td><?php echo $row['gender'];?></td>    
        <td>
            <a class="btn btn-success" 
            	href="<?php echo base_url();?>index.php/admin/teachers/personal_profile/<?php echo $row['teacher_id'];?>">
                <i class="icon-user icon-white"></i>  
                View Profile                                         
            </a>
            <a class="btn btn-info" 
                href="<?php echo base_url();?>index.php/admin/teachers/edit/<?php echo $row['teacher_id'];?>">
                    <i class="icon-edit icon-white"></i>  
                        Edit                                            
                            </a>
            <a class="btn btn-danger" onclick="return confirm('delete ?')"
                href="<?php echo base_url();?>index.php/admin/teachers/delete/<?php echo $row['teacher_id'];?>">
                    <i class="icon-trash icon-white"></i> 
                        Delete
                            </a>
        </td>
    </tr>
    <?php endforeach;?>
   </tbody>
</table>