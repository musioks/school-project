<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/parents" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Register a new Parent</legend>
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
            <label class="control-label" for="typeahead">Photo </label>
            <div class="controls">
                <input class="input-file uniform_on" id="fileInput" name="userfile" type="file" />
                <a href="#" class="btn btn-info btn-setting"><i class="icon-camera icon-white"></i>
                    Take photo from webcam</a>								
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Relationship</label>
            <div class="controls">
                <input type="text" class="span6 typeahead" name="relationship"  placeholder="e.g Mother, Father, guardian"
                    data-provide="typeahead" data-items="4" data-source='["Mother","Father","guardian"]'>                    
                </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Student AdmNo </label>
            <div class="controls">
                <textarea class="span6 autogrow" name="std_admno"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Phone </label>
            <div class="controls">
                <input type="tel" class="span6 typeahead" name="phone" placeholder="phone number" value="<?php echo set_value('phone'); ?>" />
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
            <input type="submit" class="btn btn-primary" value="Add parent" />
            <input type="reset" class="btn" value="reset form" />
        </div>
    </fieldset>
</form>
       