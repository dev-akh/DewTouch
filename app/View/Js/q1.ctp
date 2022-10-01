
<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>

<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table class="table table-striped table-bordered table-hover repeater">
<thead>
<th>
	<span id="add_item_button" class="btn mini green addbutton" data-repeater-create>
		<i class="icon-plus"></i>
	</span>
</th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>
<tbody data-repeater-list="data">
	<tr data-repeater-item>
	<td> 
		<button  data-repeater-delete class="delete-a-repater" >
			<i class="icon-remove"></i>
		</button>
	</td>
	<td class="td-description">
		<input name="show-description" id="" class="input-show">
		<textarea name="description" class="m-wrap  description required hide" rows="2"></textarea>
	</td>
	<td class="td-quantitiy">
		<input name="quantity" class="input-show">
	</td>
	<td class="td-unit_price">
		<input name="unit_price"  class="input-show">
	</td>
	
</tr>

</tbody>

</table>
<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="<?php echo Router::url("/video/q3_2.mov") ?>">
Your browser does not support the video tag.
</video>
</p>

<style>
	.input-show{
		border:none;
		background:transparent;
		width:100%;
	}
	.input-show:focus, .input-show:focus ,.input-show:visited{ 
		background:white;
		outline: none;
		border:none;
		min-height:30px;
	}
	.description{
		width:98%;
	}
	.delete-a-repater{
		border: none;
		font-weight: bold;
		background: transparent;
	}
</style>

<?php $this->start('script_own');?>
<script type="text/javascript" src="/js/jquery.repeater.js"></script>
<script>
	
$(document).ready(function(){
	descriptionAdd();
	$('.repeater').repeater({
		show: function () {
                $(this).slideDown();
				descriptionAdd();
            },
		hide: function (deleteElement) {
			if(confirm('Are you sure you want to delete this element?')) {
				$(this).slideUp(deleteElement);
			}
		}
	});
	function descriptionAdd(){
		$('.td-description').click(function(){
			$(this).children('.input-show').addClass('hide');
			$(this).children('.description').removeClass('hide');
			$(this).children('.description').focus();
		});
		$('.td-description .description').on('blur',function(){
			$(this).closest('.td-description').children('.input-show').val($(this).val());
			$(this).closest('.td-description').children('.input-show').removeClass('hide');
			$(this).addClass('hide');
		});
	}
	
});
</script>

<?php $this->end();?>

