<form class="form-horizontal">
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>parent list</legend>
            <div class="center">
            
            </div>
        </fieldset>
</form>
<table class="table table-striped table-bordered bootstrap-datatable datatable">
  <thead>
      <tr>
          <th>ID Number</th>
<!--          <th width="80">Photo</th>-->
          <th>First name</th>
          <th>Last Name</th>
          <th>Relationship</th>
<!--          <th>phone</th>-->
          <th>Email</th>
          <th>Student AdmNo</th>
          <th width="250">Action</th>
      </tr>
  </thead>   
  <tbody>
    <?php 
    $parents = $this->crud_model->get_parents();
    foreach($parents as $row): ?>
    <tr>
        <td><?php echo $row['id_no'];?></td>
<!--        <td>
            <?php 
                if(file_exists('uploads/parent_image/'.$row['parent_id'].'.jpg'))
                    $image_url	=	base_url().'uploads/parent_image/'.$row['parent_id'].'.jpg';
                else
                    $image_url	=	base_url().'uploads/user.jpg';?>
            <img src="<?php echo $image_url;?>" class="image_thumbnail" />
        </td>-->
        <td><?php echo $row['fname'];?></td>
        <td><?php echo $row['lname'];?></td>    
        <td><?php echo $row['relationship'];?></td>
<!--        <td><?php echo $row['phone'];?></td>    -->
        <td><a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a></td>
        <td><?php echo $row['std_admno'];?></td>    
        <td>
            <a class="btn btn-success" 
            	href="<?php echo base_url();?>index.php/admin/parents/personal_profile/<?php echo $row['parent_id'];?>">
                <i class="icon-user icon-white"></i>  
                View                                         
            </a>
            <a class="btn btn-info" 
                href="<?php echo base_url();?>index.php/admin/parents/edit/<?php echo $row['parent_id'];?>">
                    <i class="icon-edit icon-white"></i>  
                        Edit                                            
                            </a>
            <a class="btn btn-danger" onclick="return confirm('delete ?')"
                href="<?php echo base_url();?>index.php/admin/parents/delete/<?php echo $row['parent_id'];?>">
                    <i class="icon-trash icon-white"></i> 
                        Delete
                            </a>
        </td>
    </tr>
    <?php endforeach;?>
   </tbody>
</table>

