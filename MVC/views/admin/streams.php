
<!--MANAGE STREAMS-->
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
            
            
        	<!--TAB UI FOR STREAMS-->
            <ul class="nav nav-tabs" id="myTab">
            	<?php if(isset($edit) == true):?>
                	<li><a href="#edit">Edit Stream</a></li>
                <?php endif;?>
                <li class="active"><a href="#manage">Manage Streams</a></li>
                <li><a href="#create">Add Stream</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            	<!--EDIT CLASS-->
            	<?php 
				if(isset($edit) == true):
				$stream_info	=	$this->crud_model->get_stream_inf($edit_stream_id);
				foreach($stream_info as $row):?>
            	
                <div class="tab-pane" id="edit">
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/streams/edit/<?php echo $edit_stream_id;?>">
                        <fieldset>
                            <legend><i class="icon32 icon-edit"></i>Edit Stream</legend>                                           
                            
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Stream</label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="stream" value="<?php echo $row['stream_name'];?>" placeholder="e.g 1"/>
                                </div>
                            </div>
                           
                            
                            <div class="form-actions">
                            	<input type="hidden" name="operation" value="edit"  />
                                <input type="submit" class="btn btn-primary" value="Edit Stream"/>
                            </div>
                        </fieldset>
                    </form>
                
                </div>
                <?php endforeach;endif;?>
                
            	<!--MANAGE STREAMS-->
                <div class="tab-pane active" id="manage">
               	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/create_stream">
                        <fieldset>
                            <legend><i class="icon32 icon-gear"></i>STREAMS</legend>
                        </fieldset>
                    </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Streams</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php 
                           $streams = $this->crud_model->get_streams(); 
                           foreach($streams as $row): ?>
                        <tr>
                            <td><b>
                                
                                <?php echo $row['stream_name'];?>                            
                            </b></td>
                            
                            <td class="center">
                                <a class="btn btn-info" 
                                	href="<?php echo base_url();?>index.php/admin/streams/edit/<?php echo $row['stream_id'];?>">
                                        <i class="icon-edit icon-white"></i>  
                                            Edit                                            
                                        		</a>
                                <a class="btn btn-danger" onclick="return confirm('delete ?')"
                                	href="<?php echo base_url();?>index.php/admin/streams/delete/<?php echo $row['stream_id'];?>">
					<i class="icon-trash icon-white"></i>Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    </table>

                </div>
                <div class="tab-pane" id="create">                	<!--CREATE NEW STREAM-->
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/streams">
                        <fieldset>
                            <legend><i class="icon32 icon-square-plus"></i>Create a new Stream</legend>
                                                        
                            
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Stream name </label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" name="stream" placeholder="e.g 1"/>
                                </div>
                            </div>
                           
                            
                            <div class="form-actions">
                            	<input type="hidden" name="operation" value="create"  />
                                <input type="submit" class="btn btn-primary" value="Create Stream"/>
                                <input type="reset" class="btn" value="reset form"/>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        
			
		</div>
	</div>
</div>


