var dTable;
var row_array;
var name;
jQuery(document).ready(function() {
		jQuery("div#slider1").codaSlider();
		// etc, etc. Beware of cross-linking difficulties if using multiple sliders on one page.
		$('#demo').load('<?php echo  base_url();?>index.php/employee/showEmployee', '', function(){
		dTable =$('#showtable').dataTable({"sPaginationType": "full_numbers"});
		$("#showtable tbody td ").one('click', function(){
			//dTable.fnUpdate( 'Example update', 2, 2 ); /* Single cell */
			var aPos = dTable.fnGetPosition( this);
			//alert(dTable.fnGetPosition( this));
			if(aPos[1]==0 && aPos[2]==0)
			{   row_array=dTable.fnGetData( aPos[0] );
				id=row_array[1];
				$.post('http://localhost/CodeIgniter/index.php/employee/removeEmployee/'+id, '', function(){  dTable.fnDeleteRow(aPos[0]); $('#deletestatus').html("<font color='red'>Employee Id No:"+id+" is successfully deleted</font>"); });
			}
			if(aPos[1]!=1)
			{	row_array=dTable.fnGetData( aPos[0] );
				var value=row_array[aPos[1]];
				name=$(this).attr("fieldName");
				$(this).html("<input type='text' class='editText' fieldName='"+name+"' value='"+value+"' size='9'/><br/><input class='save' type='button' name='edit' value='Save'/>");
			}
			});
			$(".save").live('click', function(){
				var fieldName=$(this).parent().children(".editText").attr("fieldName");
				var fieldValue=$(this).parent().children(".editText").val();
				var empId=$(this).parent().parent().children(":eq(1)").attr("fieldName");
				$(this).parent().html(fieldValue);
				$.post('http://localhost/CodeIgniter/index.php/employee/editEmployee/'+empId+'/'+fieldName+'/'+fieldValue, '', function(){ });
			});
		});

		$("#insertbutton").click(function(){	
			$.ajax({
				type: "POST",  
		    	url: "<?php echo  base_url();?>index.php/employee/addEmployee",  
		    	data: "firstname="+$("#firstname").val()+"&lastname="+$("#lastname").val()+"&address="+$("#address").val()+"&age="+$("#age").val()+"&designation="+$("#designation").val()+"&department="+$("#department").val()+"&addformname="+$("#addformname").val(), 
		   		success: function(msg){
			    	$("#message").ajaxComplete(function(event, request, settings){
				    $("#message").removeClass('object_error'); // if necessary
				    $("#message").addClass("object_ok");
				    $(this).html('<font color="Green"> '+msg+'</font>');
				 	});
				}
				});
	   		});
	});