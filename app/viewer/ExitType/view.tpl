		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="/exitType/add">
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
								<th>Relaciona com sócio</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach $exitTypes as $exitType}
								<tr>
									<td>{$exitType->get('name')}</td>
                                    <td>{$exitType->get('need_partner', true)}</td>
									<td>
										<a href="/exitType/view/{$exitType->get('id')}">
											<button class="btn btn-primary">
												Visualizar
											</button>
										</a>
                                        <a href="/exitType/edit/{$exitType->get('id')}">
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
