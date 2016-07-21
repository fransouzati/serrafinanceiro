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

        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-header">
                    Histórico de mudanças
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Valor anterior</th>
                        <th>Novo valor</th>
                        <th>Data</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach $histories as $history}
                        <tr>
                            <td>{$history->get('id_user', true)->get('name')}</td>
                            <td>R${$history->get('value_before', true)}</td>
                            <td>R${$history->get('value_after', true)}</td>
                            <td>{$history->get('date', true)}</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>