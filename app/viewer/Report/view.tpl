		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="report/add">
						<button class="btn btn-primary pull-right">
							Gerar novo relatório
						</button>
					</a>
				</div>
				<hr>
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-hover datatable">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Período</th>
                                <th>Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach $reports as $report}
								<tr>
									<td>{$report->get('name')}</td>
                                    <td>{$report->get('period', true)}</td>
									<td>
                                        <a href="report/view/{$report->get('id')}">
                                            <button class="btn btn-primary">
                                                Visualizar
                                            </button>
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                Exportar <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a target="_blank" href="report/toPdf/{$report->get('id')}">
                                                        Para PDF
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="report/toExcel/{$report->get('id')}">
                                                        Para Excel
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
									</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
	        </div>
		</div>
