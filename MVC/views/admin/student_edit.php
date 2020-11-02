<?php 
	if(isset($edit) == true):
	$student_info	=	$this->crud_model->get_student_info($edit_student_id);
	foreach($student_info as $row):?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/students/edit/<?php echo $edit_student_id;?>" enctype="multipart/form-data">
			<fieldset>
				<legend><i class="icon32 icon-edit"></i>Edit Student information</legend>

				        <div class="control-group">
            <label class="control-label" for="typeahead">Adm No </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="adm_no" placeholder="Adm No" value="<?php echo $row['adm_no']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">First Name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="fname" placeholder="First Name" value="<?php echo $row['fname']; ?>"/>
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Last Name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="lname" placeholder="last Name" value="<?php echo $row['lname']; ?>" />
            </div>
        </div>
          <div class="control-group">
            <label class="control-label" for="typeahead">Email Address</label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="email" placeholder="Email Address" value="<?php echo $row['email']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Date Of Birth</label>
            <div class="controls">
                <input type="date" class="span6 " name="dob" value="<?php echo $row['dob']; ?>">
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="date02">Date Of Admission</label>
            <div class="controls">
                <input type="date" class="span6 " name="doa" value="<?php echo $row['doa']; ?>" >
            </div>
        </div>
        <div class="control-group">
					<label class="control-label" for="typeahead">Gender </label>
					<div class="controls">
						<select id="" name="gender">
							<option value="male" <?php if($row['gender']=='male')echo 'selected="selected"';?>>Male</option>
							<option value="female" <?php if($row['gender']=='female')echo 'selected="selected"';?>>Female</option>
						</select>
					</div>
				</div>   
                   <div class="control-group">
            <label class="control-label" for="typeahead">KCPE Marks</label>
            <div class="controls">
                <input type="number" class="span6 typeahead" name="kcpe_marks" value="<?php echo $row['kcpe_marks']; ?>">
                    
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">KCPE Position</label>
            <div class="controls">
                <input type="number" class="span6 typeahead" name="kcpe_pos"  value="<?php echo $row['kcpe_pos']; ?>">
                    
            </div>
        </div> 
        <div class="control-group">
					<label class="control-label" for="typeahead">Photo </label>
					<div class="controls">
						<input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
						<a href="#" class="btn btn-info btn-setting"><i class="icon-camera icon-white"></i>
							Take photo from webcam</a>		
						<br /><?php 
						if(file_exists('uploads/student_image/'.$row['student_id'].'.jpg'))
							$image_url	=	base_url().'uploads/student_image/'.$row['student_id'].'.jpg';
						else
							$image_url	=	base_url().'uploads/user.jpg';?>
						<img src="<?php echo $image_url;?>" style="max-width:200px;" class="image_thumbnail"  />							
					</div>
		</div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Religion </label>
                    <div class="controls">
                        <select id="" name="religion">
                            <option value="Christian" <?php if($row['religion']=='Christian')echo 'selected="selected"';?>>Christian</option>
                            <option value="Islam" <?php if($row['religion']=='Islam')echo 'selected="selected"';?>>Islam</option>
                        </select>
                    </div>
                </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Parent Name</label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="parent_name"  placeholder="Parent Name" value="<?php echo $row['parent_name']; ?>"
                    data-provide="typeahead" data-items="4">
                    
            </div>
        </div> 

        <div class="control-group">
            <label class="control-label" for="typeahead">Parent Contact</label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="parent_contact"  placeholder="Parent Contact" value="<?php echo $row['parent_contact']; ?>"
                    data-provide="typeahead" data-items="4">
                    
            </div>
        </div> 
  <div class="control-group">
            <label class="control-label" for="typeahead">Disability </label>
                    <div class="controls">
                        <select id="" name="disability">
                            <option value="Physical" <?php if($row['disability']=='Physical')echo 'selected="selected"';?>>Physical</option>
                            <option value="Other" <?php if($row['disability']=='Other')echo 'selected="selected"';?>>Other</option>
                            <option value="None" <?php if($row['disability']=='None')echo 'selected="selected"';?>>None</option>
                        </select>
                    </div>
                </div>
              
        <div class="control-group">
            <label class="control-label" for="typeahead">Special Condition</label>
            <div class="controls">
                <textarea class="span6 typeahead" name="special_condition">
                <?php echo $row['special_condition']; ?>
                </textarea>
                    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Class</label>
            <div class="controls">
                <select id="" name="class_id">
                    <?php 
                    $classes=$this->crud_model->get_classes();
                    foreach($classes as $class):
                    ?>
                	
                    <option value="<?php echo $class['class_id'];?>"><?php echo $class['class']; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>          
        <div class="control-group">
            <label class="control-label" for="typeahead">Stream </label>
            <div class="controls">
                <select id="" name="stream_id">
                    <?php 
                   $streams    =   $this->crud_model->get_Streams();
                    foreach($streams as $stream):
                    ?>
    <option value="<?php echo $stream['stream_id'];?>"><?php echo $stream['stream_name'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        		<div class="form-actions">
				<input type="hidden" name="operation" value="edit"  />
					<input type="submit" class="btn btn-primary" value="Edit Student info" />
				</div>
			</fieldset>
		</form>
	
	<?php endforeach;
	endif;
?>