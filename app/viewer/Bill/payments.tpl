		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-hover datatable">
						<thead>
							<tr>
								<th>Conta</th>
								<th>Data</th>
								<th>Valor</th>
							</tr>
						</thead>
						<tbody>
							{foreach $payments as $payment}
								<tr>
									<td>{$payment->get('id_bill', true)->get('id_type', true)->get('name')}</td>
                                    <td>{$payment->get('date', true)}</td>
                                    <td>R${$payment->get('value', true)}</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
	        </div>
		</div>
