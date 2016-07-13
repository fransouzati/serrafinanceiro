		<div class="row">
	        <div class="col-sm-12">
				<div class="col-md-12" style="margin-bottom: 20px;">
					<a href="user/add">
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
								<th>Email</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach $users as $user}
								<tr>
									<td>{$user->get('name')}</td>
									<td>{$user->get('email')}</td>
									<td>
										<a href="user/view/{$user->get('id')}">
											<button class="btn btn-primary">
												Visualizar
											</button>
										</a>
										{if $user->get('id') == $actualUser->get('id')}
											<a href="user/edit/{$user->get('id')}">
												<button class="btn btn-primary">
													Editar
												</button>
											</a>
                                        {/if}
									</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
	        </div>
		</div>
