<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/teachers" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Register a new teacher</legend>
        <div class="control-group">
            <label class="control-label" for="typeahead">ID Number </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="id_no" placeholder="ID number" value="<?php echo set_value('id_no'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">First name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="fname" placeholder="First Name" />
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Last name </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="lname" placeholder="Last Name" />
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Initials </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="initials" placeholder="Initials" />
            </div>
        </div>
          <div class="control-group">
            <label class="control-label" for="typeahead">TSC Number </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="tsc" placeholder="TSC Number" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">DOB</label>
            <div class="controls">
                <input type="date" class="span6" name="dob" placeholder="yyyy-mm-dd">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Gender </label>
            <div class="controls">
                <select id="" name="gender">
                    <option value="">select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>        
        <div class="control-group">
            <label class="control-label" for="typeahead">Photo </label>
            <div class="controls">
                <input class="input-file uniform_on" id="fileInput" name="userfile" type="file" />
                <a href="#" class="btn btn-info btn-setting"><i class="icon-camera icon-white"></i>
                    Take photo from webcam</a>								
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
            <label class="control-label" for="typeahead">Phone </label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="phone" placeholder="phone number" value="<?php echo set_value('phone'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Email </label>
            <div class="controls">
                <input type="email" class="span6 typeahead" name="email" placeholder="email address" value="<?php echo set_value('email'); ?>" />
            </div>
        </div>
        <div class="form-actions">
        <input type="hidden" name="operation" value="create"  />
            <input type="submit" class="btn btn-primary" value="Add teacher" />
            <input type="reset" class="btn" value="reset form" />
        </div>
    </fieldset>
</form>
       