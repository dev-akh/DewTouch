<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
			<?php echo __($type)?>
		</div>
	</div>
	<div class="portlet-body">
			
		<div class="row-fluid view_info">
			<div class="span12 ">
				<ul>
				<?php 
					foreach($descriptions as $description){
						echo "<li>".__($description)."</li>";
					}
				?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php $this->end()?>