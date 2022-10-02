
<div class="row-fluid">
	<table class="table table-bordered" id="table_records">
		<thead>
			<tr>
				<th>ID</th>
				<th>NAME</th>	
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>
<?php $this->start('script_own')?>
<script>
$(document).ready(function(){
	$("#table_records").dataTable({
		"iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/Record/getData",
        "aoColumns": [
            {mData:"Record.id"},
            {mData:"Record.name"}
        ],
		"sDom": 'lfrtip',
        "fnCreatedRow": function(nRow, aData, iDataIndex){
            // console.log("Data",aData);
        }
	});
})
</script>
<?php $this->end()?>