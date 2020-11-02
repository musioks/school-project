<?php 
	if(isset($edit) == true):
	$teacher_info	=	$this->crud_model->get_teacher_info($edit_teacher_id);
	foreach($teacher_info as $row):?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/teachers/edit/<?php echo $edit_teacher_id;?>" enctype="multipart/form-data">
			<fieldset>
				<legend><i class="icon32 icon-edit"></i>Edit teacher information</legend>

				<div class="control-group">
		            <label class="control-label" for="typeahead">ID Number </label>
		            <div class="controls">
		                <input type="text" class="span6 typeahead" name="id_no" placeholder="ID number" value="<?php echo $row['id_no']; ?>" />
            		</div>
        		</div>
        		<div class="control-group">
		            <label class="control-label" for="typeahead">First name </label>
		            <div class="controls">
		                <input type="text" class="span6 typeahead" name="fname" placeholder="First Name" value="<?php echo $row['fname'] ?>"/>
            		</div>
		        </div>
		         <div class="control-group">
		            <label class="control-label" for="typeahead">Last name </label>
		            <div class="controls">
		                <input type="text" class="span6 typeahead" name="lname" placeholder="Last Name" value="<?php echo $row['lname'] ?>"/>
		            </div>
		        </div>
		          <div class="control-group">
            <label class="control-label" for="typeahead">Initials </label>
            <div class="controls">
          <input type="text" class="span6 typeahead" name="initials" value="<?php echo $row['initials'] ?>"/>
            </div>
        </div>
		         <div class="control-group">
		            <label class="control-label" for="typeahead">TSC Number </label>
		            <div class="controls">
		                <input type="text" class="span6 typeahead" name="tsc" placeholder="TSC Number" value="<?php echo $row['tsc'] ?>"/>
		            </div>
		        </div>

		        <div class="control-group">
            <label class="control-label" for="date01">DOB</label>
            <div class="controls">
                <input type="date" class="span6" name="dob" value="<?php echo $row['dob'] ?>">
            </div>
        </div>
        <div class="control-group">
					<label class="control-label" for="typeahead">Gender </label>
					<div class="controls">
						<select id="" name="gender">
							<option value="">select</option>
							<option value="male" <?php if($row['gender']=='male')echo 'selected="selected"';?>>Male</option>
							<option value="female" <?php if($row['gender']=='female')echo 'selected="selected"';?>>Female</option>
						</select>
					</div>
				</div>     
       <div class="control-group">
					<label class="control-label" for="typeahead">Photo </label>
					<div class="controls">
						<input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
						<a href="#" class="btn btn-info btn-setting"><i class="icon-camera icon-white"></i>
							Take photo from webcam</a>		
						<br /><?php 
						if(file_exists('uploads/teacher_image/'.$row['teacher_id'].'.jpg'))
							$image_url	=	base_url().'uploads/teacher_image/'.$row['teacher_id'].'.jpg';
						else
							$image_url	=	base_url().'uploads/user.jpg';?>
						<img src="<?php echo $image_url;?>" style="max-width:200px;" class="image_thumbnail"  />							
					</div>
		</div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Religion </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="religion"  placeholder="relegion"
                    data-provide="typeahead" data-items="4" data-source='["Christian","Islam"]' value="<?php echo $row['religion'] ?>">                    
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
					<input type="submit" class="btn btn-primary" value="Edit teacher info" />
				</div>
			</fieldset>
		</form>
	
	<?php endforeach;
	endif;
?>