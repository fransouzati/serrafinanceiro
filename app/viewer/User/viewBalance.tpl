		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-hover datatable">
						<thead>
							<tr>
								<th>Caixa</th>
								<th>Saldo</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach $investors as $investor}
								<tr>
									<td>{$investor->get('name')}</td>
									<td>R${$investor->get('initial_capital', true)}</td>
									<td>
                                        <a href="user/editBalance/{$investor->get('id')}">
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
