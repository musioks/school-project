
<!--MANAGE grades-->
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
                    <?php echo $this->session->flashdata('grade_message');?>
                </div>
            <?php endif;?>
            
            
        	<!--TAB UI FOR grades-->
            <ul class="nav nav-tabs" id="myTab">
            	<?php if(isset($edit) == true):?>
                	<li><a href="#edit">Edit Grade</a></li>
                <?php endif;?>
                <li class="active"><a href="#manage">Manage grades</a></li>
                <li><a href="#create">Add grade</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            	<!--EDIT CLASS-->
            	<?php 
				if(isset($edit) == true):
				$grade_info	=	$this->crud_model->get_grade_info($edit_grade_id);
				foreach($grade_info as $row):?>
            	
                <div class="tab-pane" id="edit">
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/grading_system/edit/<?php echo $edit_grade_id;?>">
                        <fieldset>
                            <legend><i class="icon32 icon-edit"></i>Edit grade</legend>                                           
                            
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Grade Name </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="grade_name" placeholder="e.g A" value="<?php echo $row['name']; ?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Grade points </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="grade_points" placeholder="e.g 12" value="<?php echo $row['grade_point']; ?>"/>
                                </div>
                                </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Minimum Score </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="min_score" placeholder="e.g 80" value="<?php echo $row['mark_from']; ?>"/>
                                </div>
                                </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Maximum Score </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="max_score" placeholder="99" value="<?php echo $row['mark_upto']; ?>"/>
                                </div>
                                </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Comment </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="comment" placeholder="e.g A PLAIN" value="<?php echo $row['comment']; ?>"/>
                                </div>
                            </div>
                           
                            
                            <div class="form-actions">
                            	<input type="hidden" name="operation" value="edit"  />
                                <input type="submit" class="btn btn-primary" value="Edit grade"/>
                            </div>
                        </fieldset>
                    </form>
                
                </div>
                <?php endforeach;endif;?>
                
            	<!--MANAGE grades-->
                <div class="tab-pane active" id="manage">
               	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/create_grade">
                        <fieldset>
                            <legend><i class="icon32 icon-gear"></i>GRADES</legend>
                        </fieldset>
                    </form>
                    <div width="500px">                        
                    <table class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th>Grade Name</th>                                
                                <th>Points</th>
                                <th>Minimum</th>
                                <th>Maximum</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php 
                           $grades = $this->crud_model->get_grades(); 
                           foreach($grades as $row): ?>
                        <tr>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['grade_point'];?></td>
                            <td><?php echo $row['mark_from'];?></td>
                            <td><?php echo $row['mark_upto'];?></td>
                            <td><?php echo $row['comment'];?></td>
                            
                            <td class="center">
                                <a class="btn btn-info" 
                                	href="<?php echo base_url();?>index.php/admin/grading_system/edit/<?php echo $row['grade_id'];?>">
                                        <i class="icon-edit icon-white"></i>  
                                            Edit                                            
                                        		</a>
                                <a class="btn btn-danger" onclick="return confirm('delete ?')"
                                	href="<?php echo base_url();?>index.php/admin/grading_system/delete/<?php echo $row['grade_id'];?>">
					<i class="icon-trash icon-white"></i>Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    </table>
                    </div>

                </div>
                <div class="tab-pane" id="create">                	<!--CREATE NEW grade-->
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/grading_system">
                        <fieldset>
                            <legend><i class="icon32 icon-square-plus"></i>Create a new grade</legend>
                                                        
                            
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Grade name </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="grade_name" placeholder="e.g A"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Grade points </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="grade_points" placeholder="e.g 12"/>
                                </div>
                                </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Minimum Score </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="min_score" placeholder="e.g 80"/>
                                </div>
                                </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Maximum Score </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="max_score" placeholder="99"/>
                                </div>
                                </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Comment </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="comment" placeholder="e.g A PLAIN"/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="operation" value="create"  />
                                <input type="submit" class="btn btn-primary" value="Create grade"/>
                            </div>
                            
                            
                        </fieldset>
                    </form>
                </div>
            </div>
        
			
		</div>
	</div>
</div>


