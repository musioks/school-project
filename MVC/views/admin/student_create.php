<style type="text/css">
		.error{
		font-family:Arial, Helvetica, sans-serif;
		color:#FF0000;
		font-size:10px;
		padding-left:10px;
		}
</style>    

<script type="text/javascript" src="js/jquery.js"></script> 
        <script type="text/javascript" src="js/jquery.validate.js"></script> 
        <script type="text/javascript">
            $('document').ready(function(){

			$('#form').validate({
                    rules:{
                        "fname":{
                            required:true,
                            maxlength:40
                        },
                        "lname":{
                            required:true,
                            maxlength:40
                        },
                        "dob":{
                            required:true,
                            
                        },
                        "email":{
                            required:true,
                            email:true,
                            maxlength:100
                        },

                        "message":{
                            required:true
                            
                        }},

                    messages:{
                        "fname":{
                            required:"Name field is required"
                        },
                        "lname":{
                            required:"Name field is required"
                        },
                        "dob":{
                            required:"Name field is required"
                        },

                        "email":{
                            required:"Email field is required",
                            email:"Please enter a valid email address"
                        },

                        "message":{
                            required:"Message field is required"
                        }},

                    submitHandler: function(form){
                      
			
                    }
                
            })
						
        });
        </script> 

<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/students" enctype="multipart/form-data">
    <fieldset>

        <legend><i class="icon32 icon-square-plus"></i>Add A New Student</legend>
        <div class="control-group">
            <label class="control-label" for="typeahead">Adm No </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="adm_no" placeholder="Adm No" value="<?php echo set_value('name'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">First Name</label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="fname" placeholder="First Name" value="<?php echo set_value('name'); ?>" />
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Last Name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="lname" placeholder="last Name" value="<?php echo set_value('name'); ?>" />
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Email Address</label>
            <div class="controls">
                <input type="email" class="span6 typeahead" name="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Date Of Birth</label>
            <div class="controls">
                <input type="date" class="span6 " name="dob" placeholder="yyyy-mm-dd">
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="date02">Date Of Admission</label>
            <div class="controls">
                <input type="date" class="span6 " name="doa" placeholder="yyyy-mm-dd">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Gender </label>
            <div class="controls">
                <select id="" name="gender" class="span6">
                    <option value="">select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    
                </select>
            </div>
        </div>
          <div class="control-group">
            <label class="control-label" for="typeahead">KCPE Marks</label>
            <div class="controls">
                <input type="number" class="span6 typeahead" name="kcpe_marks"  placeholder="eg. 299"
                    data-provide="typeahead" data-items="4">
                    
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">KCPE Position</label>
            <div class="controls">
                <input type="number" class="span6 typeahead" name="kcpe_pos"  placeholder="eg. 2"
                    data-provide="typeahead" data-items="4">
                    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Photo </label>
            <div class="controls">
                <input class="input-file uniform_on" id="fileInput" name="userfile" type="file">
                <a href="#" class="btn btn-info btn-setting"><i class="icon-camera icon-white"></i>
                    Webcam?</a>                             
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Religion </label>
            <div class="controls">
                <select class="span6 typeahead" name="religion"  placeholder="religion"
                    data-provide="typeahead" data-items="2" data-source='["Christian","Islam"]'>
                    <option value="">Select Religion</option>
                    <option value="Christian">Christian</option>
                    <option value="Islam">Islam</option>
                    </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Parent Name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="parent_name"  placeholder="Parent Name"
                    data-provide="typeahead" data-items="4">
                    
            </div>
        </div>   
         <div class="control-group">
            <label class="control-label" for="typeahead">Parent Contact </label>
            <div class="controls">
        <input type="text" class="span6 typeahead" name="parent_contact"  placeholder="0737373712"
                    data-provide="typeahead" data-items="4">
                    
            </div>
        </div>    
            <div class="control-group">
            <label class="control-label" for="typeahead">Disability </label>
            <div class="controls">
                <select class="span6 typeahead" name="disability">
                    <option value="">Select Disability</option>
                    <option value="Physical">Physical</option>
                    <option value="Other">Other</option>
                    <option value="None">None</option>
                    </select>
            </div>
        </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">Special Condition</label>
            <div class="controls">
                <textarea class="span6 typeahead" name="special_condition">
                 
            </textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Class </label>
            <div class="controls">
                <select id="" name="class_id">
                    <?php 
                    $classes    =   $this->crud_model->get_classes();
                    foreach($classes as $row):
                    ?>
                    <option value="<?php echo $row['class_id'];?>"><?php echo $row['class'];?></option>
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
                    foreach($streams as $row):
                    ?>
                    <option value="<?php echo $row['stream_id'];?>"><?php echo $row['stream_name'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
       
        <div class="form-actions">
            <input type="hidden" name="operation" value="create"  />
            <input type="submit" class="btn btn-primary" value="Add student" />
            <input type="reset" class="btn" value="reset form" />
        </div>
    </fieldset>
</form>