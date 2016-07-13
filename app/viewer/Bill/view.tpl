		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="bill/add">
						<button class="btn btn-primary pull-right">
							Cadastrar
						</button>
					</a>
				</div>
				<hr>
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-hover datatable">
						<thead>
							<tr>
								<th>Tipo</th>
								<th>Dia de pagamento</th>
								<th>Valor (aprox.)</th>
                                <th>Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach $bills as $bill}
								<tr>
									<td>{$bill->get('id_type', true)->get('name')}</td>
                                    <td>{$bill->get('day')}</td>
                                    <td>R${$bill->get('value', true)}</td>
									<td>
                                        <a href="bill/edit/{$bill->get('id')}">
                                            <button class="btn btn-primary">
                                                Editar
                                            </button>
                                        </a>
									</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
	        </div>
		</div>
