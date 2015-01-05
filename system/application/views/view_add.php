<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<title>Coda-Slider 1.1.1</title>
<meta http-equiv="Content-Language" content="en-us" />
<link rel="stylesheet" href="media/css/demo_page.css" type="text/css" media="screen" />
<link rel="stylesheet" href="media/css/demo_table.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>styles/main.css" type="text/css" media="screen" />
<!--<link rel="stylesheet" href="<?php echo base_url();?>autocomplete/jquery.autocomplete.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>autocomplete/jquery.autocomplete.js"></script>-->
<script type="text/javascript" type="text/javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" type="test/javascript" src="media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>jquery/jquery-easing.1.2.pack.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jquery/jquery-easing-compatibility.1.2.pack.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jquery/coda-slider.1.1.1.pack.js" type="text/javascript"></script>
<!-- 
	The CSS. You can of course have this in an external .css file if you like.
	Please note that not all these styles may be necessary for your use of Coda-Slider, so feel free to take out what you don't need.
	-->
<!-- Initialize each slider on the page. Each slider must have a unique id -->
<script type="text/javascript">
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
				$.post('http://localhost/CodeIgniter/index.php/employee/editEmployee/'+empId+'/'+fieldName+'/'+fieldValue, '', function(){});
		});

		$('#advbutton').click(function(){	
			alert($("#advsearch").val());
			$.post('http://localhost/CodeIgniter/index.php/employee/searchEmployee/'+$("#advsearch").val(), '', function(response){ 
				

				});
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
</script>
</head>
<body>
<?php $this->load->view($header); ?>
<div class="slider-wrap">
  <div id="slider1" class="csw">
    <div class="panelContainer">
<?php $this->load->view($add_panel); ?>
<?php $this->load->view($manage_panel); ?>
<?php $this->load->view($advsearch_panel); ?>
</div>
    <!-- .panelContainer -->
  </div>
  <!-- #slider1 -->
</div>
<!-- .slider-wrap -->
<?php 
	$this->load->view($footer); ?>
</body>
</html>
