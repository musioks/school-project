<form class="form-horizontal" >
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Submit Scores</legend> 
            <H2>VIEW STUDENT OR CLASS RESULTS?</H2>
        </fieldset>
    <br/>
    <br/>    
    <div class="pull-left"> 
        
        <a class="btn btn btn-primary"
                href="<?php echo base_url();?>index.php/admin/view_score_student">
                    <i class="icon-edit icon-white"></i>  
                        Individual Students                                            
        </a>
        
        <span class="divider">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <a class="btn btn btn-primary " width="40px" 
                href="<?php echo base_url();?>index.php/admin/view_score_class">
                    <i class="icon-edit icon-white"></i>  
                        Entire Class                                            
        </a>
        
    </div>
</form>
