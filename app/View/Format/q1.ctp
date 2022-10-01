
<div id="message1">

<?php echo $this->Form->create(
	'Type',array(
		'id'=>'form_type',
		'type'=>'file',
		'class'=>'',
		'method'=>'POST',
		'url'=>'/Format/saveType',
		'autocomplete'=>'off',
		'inputDefaults'=>array(
				'label'=>false,'div'=>false,'type'=>'text','required'=>false)
		)
	)?>
	
<?php echo __("Hi, please choose a type below:")?>
<br><br>

<?php $options_new = array(
 		'Type1' => __('<span class="showDialog" data-id="dialog_1" data-rdbValue="Type1" style="color:blue" data-hover="Type1">Type1</span>
		<div id="dialog_1" class="hide Type1 message-dialog" title="Type 1">
			<div class="message-box">
				<div class="arrow">
					<div class="outer"></div>
					<div class="inner"></div>
				</div>
				<div class="message-body">
					<ul>
						<li>Description .......</li>
						<li>Description 2</li>
					</ul>
				</div>
			</div>
 		</div>'),
		'Type2' => __('<span class="showDialog" data-id="dialog_2" data-rdbValue="Type2" style="color:blue" data-hover="Type2">Type2</span>
		<div id="dialog_2" class="hide message-dialog Type2" title="Type 2">
			<div class="message-box">
				<div class="arrow">
					<div class="outer"></div>
					<div class="inner"></div>
				</div>
				<div class="message-body">
						<ul>
							<li>Desc 1 .....</li>
							<li>Desc 2...</li>
						</ul>
				</div>
			</div>
		</div>')
		);?>

<?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new,'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>
<div class="py-5">
<?php echo $this->Form->button('Save',array('type'=>'submit','id'=>'btn-save','class'=>'btn-success btn-sm hide'));?>
</div>
<?php echo $this->Form->end();?>

</div>

<style>
.showDialog:hover{
	text-decoration: underline;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}
div.py-5{
	padding:50px 0;
}
.message-dialog {
  clear: both;
  position: relative;
}
.message-box {
	position: absolute;
	margin-top:-20px;
  	margin-left:3%; 
}
.message-box .arrow {
  width: 12px;
  height: 20px;
  overflow: hidden;
  position: relative;
  float: left;
  top: 6px;
  right: -1px;
}

.message-box .arrow .outer {
  width: 0;
  height: 0;
  border-right: 20px solid #000000;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  position: absolute;
  top: 0;
  left: 0;
}

.message-box .arrow .inner {
  width: 0;
  height: 0;
  border-right: 20px solid #ffffff;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  position: absolute;
  top: 0;
  left: 2px;
}

.message-box .message-body {
  cursor: default;
  float: left;
  width: 300px;
  height: auto;
  border: 1px solid #CCC;
  background-color: #ffffff;
  border: 1px solid #000000;
  padding: 6px 8px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -o-border-radius: 5px;
  border-radius: 1px;
}

.message-box .message-body p {
  margin: 0;
}
</style>

<?php $this->start('script_own')?>
<script>

$(document).ready(function(){
	$(".dialog").dialog({
		autoOpen: false,
		width: '500px',
		modal: true,
		dialogClass: 'ui-dialog-blue'
	});

	
	$(".showDialog").on('mouseover',function(){
		 var id = $(this).data('id');
		 var rdbValue=$(this).data('rdbValue');
		 var hover = $(this).data('hover');
		 var selected = $("input[name='data[Type][type]']:checked").val();
		$('.message-dialog').addClass("hide");
		 $("#"+id).removeClass('hide'); 
		}).mouseout(function() {
			var id = $(this).data('id');
			var hover = $(this).data('hover');
			var selected = $("input[name='data[Type][type]']:checked").val();
			$("#"+id).addClass('hide');
			$('.'+selected).removeClass('hide');
		});
	$(".showDialog").on('click',function(){
		$(this).attr('data-selected','true');
		var id = $(this).data('id');
		 $("#"+id).removeClass('hide'); 
		 $('#btn-save').removeClass('hide');
	});
})


</script>
<?php $this->end()?>