<?php 
	if(isset($edit) == true):
	$parent_info	=	$this->crud_model->get_parent_info($edit_parent_id);
	foreach($parent_info as $row):?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/parents/edit/<?php echo $edit_parent_id;?>" enctype="multipart/form-data">
			<fieldset>
				<legend><i class="icon32 icon-edit"></i>Edit parent information</legend>

		<div class="control-group">
            <label class="control-label" for="typeahead">ID Number </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="id_no" placeholder="ID number" value="<?php echo $row['id_no']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">First name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="fname" placeholder="First Name" value="<?php echo $row['fname']; ?>"/>
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Last name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="lname" placeholder="Last Name" value="<?php echo $row['lname']; ?>" />
            </div>
        </div>         
        <div class="control-group">
					<label class="control-label" for="typeahead">Photo </label>
					<div class="controls">
						<input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
						<a href="#" class="btn btn-info btn-setting"><i class="icon-camera icon-white"></i>
							Take photo from webcam</a>		
						<br /><?php 
						if(file_exists('uploads/parent_image/'.$row['parent_id'].'.jpg'))
							$image_url	=	base_url().'uploads/parent_image/'.$row['parent_id'].'.jpg';
						else
							$image_url	=	base_url().'uploads/user.jpg';?>
						<img src="<?php echo $image_url;?>" style="max-width:200px;" class="image_thumbnail"  />							
					</div>
		</div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Relationship</label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="relationship"  placeholder="e.g Mother, Father, guardian" value="<?php echo $row['relationship']; ?>"
                    data-provide="typeahead" data-items="4" data-source='["Mother","Father","guardian"]'>                    
                </div>
        </div>        <div class="control-group">
            <label class="control-label" for="typeahead">Studetn AdmNo </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="std_admno" placeholder="Student admNo" value="<?php echo $row['std_admno']; ?>"/>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">Phone </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="phone" placeholder="phone number" value="<?php echo $row['phone']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Email </label>
            <div class="controls">
                <input type="email" class="span6 typeahead" name="email" placeholder="email address" value="<?php echo $row['email']; ?>" />
            </div>
        </div>

        		<div class="form-actions">
				<input type="hidden" name="operation" value="edit"  />
					<input type="submit" class="btn btn-primary" value="Edit parent info" />
				</div>
			</fieldset>
		</form>
	
	<?php endforeach;
	endif;
?>