		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="investor/add">
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
								<th>Nome</th>
								<th>Capital inicial</th>
								<th>Sócio</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach $investors as $investor}
								<tr>
									<td>{$investor->get('name')}</td>
									<td>R${$investor->get('initial_capital', true)}</td>
                                    <td>{$investor->get('is_partner', true)}</td>
									<td>
										<a href="investor/view/{$investor->get('id')}">
											<button class="btn btn-primary">
												Visualizar
											</button>
										</a>
                                        <a href="investor/edit/{$investor->get('id')}">
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
