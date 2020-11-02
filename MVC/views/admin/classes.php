
<!--MANAGE CLASSES-->
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

            <?php if($this->session->flashdata('class_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('class_message');?>
                </div>
            <?php endif;?>
            
            
        	<!--TAB UI FOR CLASSES-->
            <ul class="nav nav-tabs" id="myTab">
            	<?php if(isset($edit) == true):?>
                	<li><a href="#edit">Edit class</a></li>
                <?php endif;?>
                <li class="active"><a href="#manage">Manage classes</a></li>
                <li><a href="#create">Create class</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            	<!--EDIT CLASS-->
            	<?php 
				if(isset($edit) == true):
				$class_info	=	$this->crud_model->get_class_info($edit_class_id);
				foreach($class_info as $row):?>
            	
                <div class="tab-pane" id="edit">
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/classes/edit/<?php echo $edit_class_id;?>">
                        <fieldset>
                            <legend><i class="icon32 icon-edit"></i>Edit class</legend>
                                                        
                            
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Class</label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="class" value="<?php echo $row['class'];?>" placeholder="e.g 1"/>
                                </div>
                            </div>
                           
                            
                            <div class="form-actions">
                            	<input type="hidden" name="operation" value="edit"  />
                                <input type="submit" class="btn btn-primary" value="Edit class"/>
                            </div>
                        </fieldset>
                    </form>
                
                </div>
                <?php endforeach;endif;?>
                
            	<!--MANAGE CLASSES-->
                <div class="tab-pane active" id="manage">
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/create_class">
                        <fieldset>
                            <legend><i class="icon32 icon-gear"></i>Classes</legend>
                        </fieldset>
                    </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Class</th>                                
                                <th>Option</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php 
                           $classes	=	$this->crud_model->get_classes(); 
                           foreach($classes as $row): ?>
                        <tr>
                            <td>
                                <?php echo"Form ".$row['class'];?>                            
                            </td>
                            
                            <td class="center">
                                <a class="btn btn-info" 
                                	href="<?php echo base_url();?>index.php/admin/classes/edit/<?php echo $row['class_id'];?>">
                                        <i class="icon-edit icon-white"></i>  
                                            Edit                                            
                                        		</a>
                                <a class="btn btn-danger" onclick="return confirm('delete ?')"
                                	href="<?php echo base_url();?>index.php/admin/classes/delete/<?php echo $row['class_id'];?>">
										<i class="icon-trash icon-white"></i> 
											Delete
                                            	</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    </table>

                </div>
                <div class="tab-pane" id="create">                	<!--CREATE NEW CLASS-->
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/classes">
                        <fieldset>
                            <legend><i class="icon32 icon-square-plus"></i>Create a new class</legend>
                                                        
                            
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Class name </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="class" placeholder="e.g 1"/>
                                </div>
                            </div>
                           
                            
                            <div class="form-actions">
                            	<input type="hidden" name="operation" value="create"  />
                                <input type="submit" class="btn btn-primary" value="Create class"/>
                                <input type="reset" class="btn" value="reset form"/>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        
			
		</div>
	</div>
</div>


