           <?php
           if(isset($edit) == true):
            $subject_info   =   $this->crud_model->get_subject_info($edit_subject_id);
            foreach($subject_info as $row):?>
                <div class="tab-pane" id="edit">
                	<!--EDIT SUBJECT-->
                	<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/subjects/edit<?php echo $edit_subject_id;?>">
                        <fieldset>
                            <legend><i class="icon32 icon-square-plus"></i>Create new subject</legend>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Subject Code</label>
                                <div class="controls">
                                    <input type="text" class="span4 typeahead" name="subject_code" placeholder="e.g 101" value="<?php echo $row['subject_code'] ?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Subject name </label>
                                <div class="controls">
                                    <input type="text" class="span4 typeahead" name="subject_name" placeholder="e.g mathematics" value="<?php echo $row['subject_name'] ?>"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="typeahead">Subject Group</label>
                                <div class="controls">
                                    <select name="sub_group" class="span4">
                                        <option value="">select</option>
                                        <?php 
                                        $subject_group	=	$this->crud_model->get_subject_group(); 
                                        foreach($subject_group as $row2): ?>
                                        <option value="<?php echo $row['group_id'];?>"><?php echo $row['group_name'] ?></option>
                                        <option value="<?php echo $row['group_id'];?>"><?php echo $row2['group_name'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="form-actions">
                                <input type="hidden" name="operation" value="edit"  />
                                <input type="submit" class="btn btn-primary" value="Edit subject"/>
                                <input type="reset" class="btn" value="reset form"/>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <?php endforeach;
                endif;?>