    <style type="text/css">
		.error{
		font-family:Arial, Helvetica, sans-serif;
		color:#FF0000;
		font-size:10px;
		padding-left:10px;
		}
		</style>
    
    <script type="text/javascript" src="js/jquery.js"></script> 
        <script type="text/javascript" src="js/jquery.validate.js"></script> 
        <script type="text/javascript">
            $('document').ready(function(){

			$('#form').validate({
                    rules:{
                        "name":{
                            required:true,
                            maxlength:40
                        },

                        "email":{
                            required:true,
                            email:true,
                            maxlength:100
                        },

                        "message":{
                            required:true
                            
                        }},

                    messages:{
                        "name":{
                            required:"Name field is required"
                        },

                        "email":{
                            required:"Email field is required",
                            email:"Please enter a valid email address"
                        },

                        "message":{
                            required:"Message field is required"
                        }},

                    submitHandler: function(form){
                      
			
                    }
                
            })
						
        });
        </script> 
<form name="form" id="form" action="new.php" method="post">
<br />
<table width="449" border="0">
  <tr>
    <td width="107">Name:</td>
    <td width="326"><input type="text" name="name" class="" maxlength="40" /></td>
    </tr>
  <tr>
    <td> Email:</td>
    <td><input type="text" name="email" class="" maxlength="40" /></td>
    </tr>
  <tr>
    <td> Message:</td>
    <td><input type="text" name="message" class="" maxlength="40" /></td>
    </tr>
</table>

<input type="submit" value="Submit">
</form>

