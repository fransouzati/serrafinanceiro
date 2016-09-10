<div class="row">
    <div class="col-sm-6 form-group">
        <label class="control-label">Nome</label>
        <input disabled type="text" class="form-control" name="name" value="{$salesman->get('name')}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="control-label">Porcentagem de comissão</label>
        <input disabled type="text" class="form-control mask-percentage" name="percentage" value="{$salesman->get('percentage', true)}%">
    </div>
</div>

{if !empty($projects)}
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header">Projetos</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor do projeto</th>
                    <th>Comissão - Total</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                {foreach $projects as $project}
                    <tr>
                        <td>{$project->get('id_project', true)->get('name')}</td>
                        <td>R${$project->get('id_project', true)->get('value', true)}</td>
                        <td>
                            {$project->get('percentage', true)} -
                            {$project->get('percentage') * $project->get('id_project', true)->get('value')}
                        </td>
                        <td>
                            <a href="project/view/{$project->get('id_project')}">
                                <button class="btn btn-primary">
                                    Visualizar projeto
                                </button>
                            </a>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
{/if}

<div class="row">
    <div class="col-sm-offset-4 col-sm-4">
        <a href="salesman/edit/{$salesman->get('id')}">
            <button class="btn btn-success btn-lg btn-block">
                Editar
            </button>
        </a>
    </div>
</div>
