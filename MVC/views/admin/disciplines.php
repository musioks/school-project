
<!--MANAGE DISCIPLINES-->
<div class="row-fluid">
<div class="box span12">
<div class="box-header well">
<div class="box-icon">
<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
</div>
</div>

<div class="box-content">
<!--CUSTOM MESSAGE-->
<?php echo validation_errors(); ?>

<?php if($this->session->flashdata('discipline_message') != ''):?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<?php echo $this->session->flashdata('discipline_message');?>
</div>
<?php endif;?>


<!--TAB UI FOR DISCIPLINE-->
<ul class="nav nav-tabs" id="myTab">
<?php if(isset($edit) == true):?>
<li><a href="#edit">Edit Discipline Case</a></li>
<?php endif;?>
<li class="active"><a href="#manage">Manage Discipline Case</a></li>
<li><a href="#create">Add Discipline Case</a></li>
</ul>


<div id="myTabContent" class="tab-content">
<!--EDIT DISCIPLINE CASE-->
<?php 
if(isset($edit) == true):
$discipline_info	=	$this->crud_model->get_discipline_info($edit_id);
foreach($discipline_info as $row):?>

<div class="tab-pane" id="edit">
<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/disciplines/edit/<?php echo $edit_id;?>">
    <fieldset>
        <legend><i class="icon32 icon-edit"></i>Edit Discipline Case</legend><div class="control-group">
            <label class="control-label" for="typeahead">Student Name</label>
            <div class="controls">
              <select class="span6 typeahead" name="student_id">
                <option value="">--Select Student--</option>
                <?php $s =$this->crud_model->get_students();
                foreach($s as $fetch):?>
<option value="<?php echo $fetch['student_id'];?>"><?php echo $fetch['adm_no'];?>|<?php echo $fetch['fname'];?> <?php echo $fetch['lname'];?>

</option>
      
      <?php endforeach;?>  
      </select>        
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Discipline Type </label>
            <div class="controls">
                <select class="span6 typeahead" name="discipline_type">
        <option value="Coupling" <?php if($row['discipline_type']=='Coupling')echo 'selected="selected"';?>>Coupling</option>
        <option value="Drugs and Substance Abuse" <?php if($row['discipline_type']=='Drugs and Substance Abuse')echo 'selected="selected"';?>>Drugs and Substance Abuse</option>
        <option value="Bullying" <?php if($row['discipline_type']=='Bullying')echo 'selected="selected"';?>>Bullying</option>
          <option value="Sneaking" <?php if($row['discipline_type']=='Sneaking')echo 'selected="selected"';?>>Sneaking</option>
                </select>
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Description</label>
            <div class="controls">
                <textarea class="span6 typeahead" name="description">
                <?php echo $row['description'];?>
                </textarea>
            </div>
        </div>
        
        <div class="form-actions">
        	<input type="hidden" name="operation" value="edit"  />
            <input type="submit" class="btn btn-warning" value="Edit Discipline"/>
        </div>
    </fieldset>
</form>

</div>
<?php endforeach;endif;?>

<!--MANAGE Discipline Case-->
<div class="tab-pane active" id="manage">
<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/create_discipline">
    <fieldset>
        <legend><i class="icon32 icon-gear"></i>Discipline Cases</legend>
    </fieldset>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Admission No.</th>                                
            <th>Student Name</th>                                
            <th>Discipline Type</th>                                
            <th>Description</th>                                
            <th>Action</th>
        </tr>
    </thead>
<tbody>
    <?php 
       $d = $this->crud_model->get_disciplines(); 
       foreach($d as $r): ?>
    <tr>
        <td><b>
            
            <?php echo $r['adm_no'];?>                            
        </b></td>
         <td><b>
            
            <?php echo $r['fname'];?> <?php echo $r['lname'];?>                          
        </b></td>
         <td><b>
            
            <?php echo $r['discipline_type'];?>                            
        </b></td>
         <td><b>
            
            <?php echo $r['description'];?>                            
        </b></td>
        
        <td class="center">
            <a class="btn btn-info" 
            	href="<?php echo base_url();?>index.php/admin/disciplines/edit/<?php echo $r['id'];?>">
                    <i class="icon-edit icon-white"></i>  
                        Edit                                            
                    		</a>
            <a class="btn btn-danger" onclick="return confirm('delete ?')"
            	href="<?php echo base_url();?>index.php/admin/disciplines/delete/<?php echo $r['id'];?>">
<i class="icon-trash icon-white"></i>Delete</a>
        </td>
    </tr>
    <?php endforeach;?>
</tbody>
</table>

</div>
<div class="tab-pane" id="create">                	<!--CREATE DISCIPLINE-->
<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/disciplines">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Create a new discipline case</legend>
                                    
        
         <div class="control-group">
            <label class="control-label" for="typeahead">Student Name</label>
            <div class="controls">
              <select class="span6 typeahead" name="student_id">
                <option value="">--Select Student--</option>
                <?php $s =$this->crud_model->get_students();
                foreach($s as $fetch):?>
<option value="<?php echo $fetch['student_id'];?>"><?php echo $fetch['adm_no'];?>|<?php echo $fetch['fname'];?> <?php echo $fetch['lname'];?>

</option>
      
      <?php endforeach;?>  
      </select>        
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Discipline Type </label>
            <div class="controls">
                <select class="span6 typeahead" name="discipline_type">
                <option value="">--Select Discipline type--</option>
                <option value="Coupling">Coupling</option>
    <option value="Drugs and Substance Abuse">Drugs and Substance Abuse</option>
    <option value="Bullying">Bullying</option>
    <option value="Sneaking">Sneaking</option>
                </select>
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Description</label>
            <div class="controls">
                <textarea class="span6 typeahead" name="description">
                </textarea>
            </div>
        </div>
       
        
        <div class="form-actions">
        	<input type="hidden" name="operation" value="create"  />
            <input type="submit" class="btn btn-primary" value="Create Discipline"/>
            <input type="reset" class="btn" value="reset form"/>
        </div>
    </fieldset>
</form>
</div>
</div>


</div>
</div>
</div>


