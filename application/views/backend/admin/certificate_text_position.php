<!DOCTYPE html>
<html>
<head>
	<title><?php echo get_phrase('certificates_text_position'); ?> | <?php echo get_settings('system_title'); ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('uploads/system/').get_frontend_settings('favicon');?>">
	<link href="<?php echo base_url('assets/backend/css/fontawesome-all.min.css') ?>" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url('assets/backend/js/jquery-3.3.1.min.js'); ?>" charset="utf-8"></script>
	<script src="https://www.jqueryscript.net/demo/drag-drop-touch/jquery.draggableTouch.js"></script>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Italianno&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap%27');
        @import url('https://fonts.googleapis.com/css2?family=Miss+Fajardose&display=swap%27');
		.draggable{
			border: 2px dashed #8d8d8d;
		    padding: 0px 5px;
		    cursor: move;
		    background-color: #15b57e33;
		    top: 0;
		    max-width: 500px;
		}
		.submit-button{
			padding: 12px 15px;
			background-color: #2d32d5;
			border-radius: 5px;
			color: #fff;
			text-decoration: none;
			border: none;
			cursor: pointer;
		}
		.back-button{
			padding: 12px 15px;
			background-color: #848484;
			border-radius: 5px;
			color: #fff;
			text-decoration: none;
			border: none;
			cursor: pointer;
		}
		.hidden-position{
			background-color: #ffd3d3 !important;
		}
	</style>
</head>
<body style="display: flex;">
	<div style="width: 750px; position: relative; text-align: center;">
		<div class="certificate-text-position">
			<?php echo remove_js(htmlspecialchars_decode(get_settings('certificate-text-positons'))); ?>
		</div>
		<button class="submit-button" onclick="save_position();"><?php echo get_phrase('update'); ?></button>
	</div>
	<div style="padding: 10px;">
		<h3 style="padding-left: 20px;"><?php echo get_phrase('attention'); ?> !</h3>
		<ul>
			<li><?php echo get_phrase('you_can_change_the_text_positions_by_drag_and_drop'); ?></li>
			<li><?php echo get_phrase('drag_out_of the_certificate_layout_to_keep_an_object_hidden'); ?></li>
			<li><?php echo get_phrase('after_changing_your_text_positions,_click_the_save_button_to_save_the_parts'); ?></li>
		</ul>
	</div>
	<script>
	    $(document).ready(function() {
	    	$('.certificate_text').html("<?php echo get_settings('certificate_template'); ?>");
	    	$('.hidden-position').show();
	        $(".draggable").draggableTouch();
	        //$(".draggable").draggableTouch("disable");

	        $(".draggable").on("dragstart", function(e, pos) {
	            //console.log(pos.left + "," + pos.top);
	        }).on("dragend", function(e, pos) {
	            console.log("dragend:", this, pos.left + "," + pos.top);
	            if(pos.left <= 720 && pos.top <= 520){
	            	if($(this).hasClass('hidden-position')){
	            		$(this).removeClass('hidden-position');
	            	}
	            }else{
	            	if(!$(this).hasClass('hidden-position')){
	            		$(this).addClass('hidden-position');
	            	}
	            }
	        });
	    });

	    function save_position(){
	    	$('.hidden-position').hide();
	    	var btnText = $('.submit-button').html();
	    	$('.submit-button').html('<?php echo get_phrase('please_wait'); ?>...');
	    	var positionHtml = $('.certificate-text-position').html();
	    	$.ajax({
	    	 	type: 'post',
	    	 	url: "<?php echo site_url('addons/certificate/position/save'); ?>",
	    	 	data: {'text_positions' : positionHtml},
	    	 	success: function(result){
			    	$('.submit-button').html(btnText);
			    	$('.hidden-position').show();
			    	window.location.replace('<?php echo site_url('addons/certificate/settings'); ?>');
			  	}
			});
	    }
	</script>
</body>
</html>