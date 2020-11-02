<form class="form-horizontal" >
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Submit Scores</legend> 
            <p>Do you want to Submit Score for stream or Individual student?</p>
        </fieldset>
    <br/>
    <br/>    
    <div class="pull-left"> 
        
        <a class="btn btn btn-primary"
                href="<?php echo base_url();?>index.php/admin/submit_student_score">
                    <i class="icon-edit icon-white"></i>  
                        Individual Students                                            
        </a>
        
        <span class="divider">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <a class="btn btn btn-primary " width="40px" 
                href="<?php echo base_url();?>index.php/admin/stream_exam_details">
                    <i class="icon-edit icon-white"></i>  
                        Entire Stream                                            
        </a>
        
    </div>
</form>
