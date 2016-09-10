		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="salesman/add">
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
								<th>Comissão</th>
                                <th>Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach $salesmans as $salesman}
								<tr>
									<td>{$salesman->get('name')}</td>
									<td>{$salesman->get('percentage', true)}%</td>
                                    <td>
                                        <a href="salesman/view/{$salesman->get('id')}">
                                            <button class="btn btn-primary">
                                                Visualizar
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
