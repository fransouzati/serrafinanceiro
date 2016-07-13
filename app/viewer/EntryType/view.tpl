		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="entryType/add">
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
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach $entryTypes as $entryType}
								<tr>
									<td>{$entryType->get('name')}</td>
									<td>
										<a href="entryType/view/{$entryType->get('id')}">
											<button class="btn btn-primary">
												Visualizar
											</button>
										</a>
                                        <a href="entryType/edit/{$entryType->get('id')}">
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
