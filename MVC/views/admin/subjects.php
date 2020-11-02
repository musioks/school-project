
<!--MANAGE SUBJECT LISTS-->
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

            <?php if($this->session->flashdata('subject_message') != ''):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $this->session->flashdata('subject_message');?>
                </div>
            <?php endif;?>
            <!--CUSTOM MESSAGE-->
            
        	<!--TAB UI FOR SUBJECTS-->
            <ul class="nav nav-tabs" id="myTab">  
                <?php if(isset($edit) == true):?>
                    <li><a href="#edit">Edit subject</a></li>
                <?php endif;?>          	
                <li class="active"><a href="#manage">Manage subjects</a></li>
                <li><a href="#create">Create subject</a></li>
                
                
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            	   	
            	<!--MANAGE SUBJECTS-->
                <div class="tab-pane active" id="manage">
                	<form class="form-horizontal" method="post">
                        <fieldset>
                            <legend><i class="icon32 icon-gear"></i>Manage subjects</legend>
                        </fieldset>
                    </form>
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                            <tr>
                                <th>Subject code</th>
                                <th>Subject Name</th>
                                <th>Group</th>
                                <th>Action</th>                               
                            </tr>
                        </thead>
                    <tbody>
                        <?php 
                           $subjects	=	$this->crud_model->get_subjects(); 
                           foreach($subjects as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row['subject_code'];?>
                            </td>
                            <td>
                                <?php echo $row['subject_name']; ?>
                            </td>
                            <td class="center">
                                 <?php echo $row['group_name']; ?>
                            </td>
                            <td class="center">
                                <a class="btn btn-info" 
                                	href="<?php echo base_url();?>index.php/admin/subjects/edit/<?php echo $row['subject_id'];?>">
                                        <i class="icon-edit icon-white"></i>  
                                            Edit                                            
                                        		</a>
                                <a class="btn btn-danger" onclick="return confirm('delete ?')"
                                	href="<?php echo base_url();?>index.php/admin/subjects/delete/<?php echo $row['subject_id'];?>">
										<i class="icon-trash icon-white"></i> 
											Delete
                                            	</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    </table>

                </div>

                <div class="tab-pane" id="create">
                	<!--CREATE NEW SUBJECT-->
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/subjects">
                        <fieldset>
                            <legend><i class="icon32 icon-square-plus"></i>Create new subject</legend>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Subject Code</label>
                                <div class="controls">
                                    <input type="text" class="span4 typeahead" name="subject_code" placeholder="e.g 101"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Subject name </label>
                                <div class="controls">
                                    <input type="text" class="span4 typeahead" name="subject_name" placeholder="e.g mathemetics"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="typeahead">Subject Group</label>
                                <div class="controls">
                                    <select name="sub_group_id" class="span4">
                                        <option value="">select</option>
                                        <?php 
                                        $subject_group	=	$this->crud_model->get_subject_group(); 
                                        foreach($subject_group as $group): ?>
                                        <option value="<?php echo $group['group_id'];?>"><?php echo $group['group_name'];?>     </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <input type="hidden" name="operation" value="create"  />
                                <input type="submit" class="btn btn-primary" value="Create subject"/>
                                <input type="reset" class="btn" value="reset form"/>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="tab-pane" id="edit">
                    <?php include 'subject_edit.php';?>
                </div>

            </div>		
		</div>
	</div>
</div>


