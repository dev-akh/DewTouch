<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
			<?php echo __($title)?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row-fluid view_info">
			<div class="span12 ">

				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">

						<li class="active">
                            <a href="#tab_item" data-toggle="tab"><?php echo __('Answer')?></a>
                        </li>

					</ul>

					<div class="tab-content">
						
						<div class="tab-pane row-fluid active" id="tab_item">

							<div class="row-fluid">
								<table class="table table-bordered dataTable" id="table_orders">
									<thead>
										<tr>
											<th style="width:10%">S/N</th>
											<th>Receipt No.</th>
											<th>Member No.</th>
											<th>Member Name</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($transactions as $k => $transaction):?>
										<tr class="item_tr" style="background-color:#fff;">
											<td><span class="row-details row-details-close"></span></td>
											<td><?php echo $transaction['Transaction']['receipt_no']?></td>
											<td><?php echo $transaction['Member']['type'].'  '.$transaction['Member']['no']?></td>
											<td><?php echo $transaction['Member']['name']?></td>
											<td><?php echo $transaction['Transaction']['total']?></td>
										</tr>
										<tr class="hide">
											<td></td>
											<td colspan="4">
                                              <strong> Member Detail</strong> 
												<table class="table table-bordered dataTable" style="width:100%">
													<thead>
														<tr>
															<th>No.</th>
															<th>Name</th>
															<th>Company</th>
															<th>Created</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><?php echo $transaction['Member']['type'].'  '.$transaction['Member']['no']?></td>
															<td><?php echo $transaction['Member']['name']?></td>
															<td><?php echo $transaction['Member']['company']?></td>
															<td><?php echo $transaction['Member']['created']?></td>
														</tr>
													</tbody>
												</table>
                                                <br>
                                                <strong>Transaction Detail</strong> 
												<table class="table table-bordered dataTable" style="width:100%">
													<thead>
														<tr>
															<th>Member Paytype</th>
															<th>Date</th>
															<th>Year</th>
															<th>Month</th>
															<th>Ref No.</th>
															<th>Receipt No.</th>
															<th>Payment Method</th>
															<th>Batch No.</th>
															<th>Cheque No.</th>
															<th>Pyament Type</th>
															<th>Renew Year</th>
															<th>Subtotal</th>
															<th>Tax</th>
															<th>Total</th>
															<th>Created</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><?php echo $transaction['Transaction']['member_paytype']?></td>
															<td><?php echo $transaction['Transaction']['date']?></td>
															<td><?php echo $transaction['Transaction']['year']?></td>
															<td><?php echo $transaction['Transaction']['month']?></td>
															<td><?php echo $transaction['Transaction']['ref_no']?></td>
															<td><?php echo $transaction['Transaction']['receipt_no']?></td>
															<td><?php echo $transaction['Transaction']['payment_method']?></td>
															<td><?php echo $transaction['Transaction']['batch_no']?></td>
															<td><?php echo $transaction['Transaction']['cheque_no']?></td>
															<td><?php echo $transaction['Transaction']['payment_type']?></td>
															<td><?php echo $transaction['Transaction']['renewal_year']?></td>
															<td><b><?php echo $transaction['Transaction']['subtotal']?></b></td>
															<td><b><?php echo $transaction['Transaction']['tax']?></b></td>
															<td><strong><?php echo $transaction['Transaction']['total']?></strong></td>
															<td><?php echo $transaction['Transaction']['created']?></td>
														</tr>
													</tbody>
												</table>
                                                <br>
                                                <strong>Transaction Item</strong> 
												<table class="table table-bordered dataTable" style="width:100%">
													<thead>
														<tr>
															<th>Quantity</th>
															<th>Unit Price</th>
															<th>UOM</th>
															<th>Sum</th>
															<th>Description</th>
															<th>Created</th>
														</tr>
													</thead>
													<tbody>
                                                        <?php foreach ($transaction['TransactionItem'] as $key => $trItem) : ?>
                                                        <tr>
															<td><?php echo $trItem['quantity']?></td>
															<td><?php echo $trItem['unit_price']?></td>
															<td><?php echo $trItem['uom']?></td>
															<td><?php echo $trItem['sum']?></td>
															<td><?php echo $trItem['description']?></td>
															<td><?php echo $trItem['created']?></td>
                                                        </tr>
                                                        <?php endforeach;?>
													</tbody>
												</table>
											</td>
										</tr>
									<?php endforeach;?>
									</tbody>
								</table>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->start('script_own')?>
<script>
$(document).ready(function(){
	
	$("body").on('click','tbody tr.item_tr',function(){

	  	if($(this).next().hasClass("hide")) {
			$(this).next().removeClass("hide");
	   		$(this).find("td").eq(0).find("span").eq(0).removeClass("row-details-close").addClass("row-details-open");
	 	}else{
	   		$(this).next().addClass("hide");
	   		$(this).find("td").eq(0).find("span").eq(0).removeClass("row-details-open").addClass("row-details-close");
	 	}

	  return false;
	 });
	
})
</script>
<?php $this->end()?>