<div class="row">
    <div class="col-sm-12">
        <h4>Filtros</h4>
    </div>
</div>
<div class="row">
    <form action="salesman/export" method="post" target="_blank" class="ignore-wait">
        <div class="col-sm-6">
            <label for="_filter_salesman" class="control-label">Vendedores/Colaboradores</label>
            <select name="_filter_salesman" class="form-control ">
                <option value="">Todos</option>
                {foreach $salesmans as $salesman}
                    <option value="{$salesman->get('id')}">{$salesman->get('name')}</option>
                {/foreach}
            </select>
        </div>
        <div class="col-sm-6 form-group">
            <label for="_filter_period" class="control-label">Projetos finalizados entre</label>
            <input type="text" name="_filter_period" class="form-control mask-dateinterval">
        </div>
        <div class="col-sm-12">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    Exportar <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button class="btn btn-default btn-block" type="submit" name="type" value="pdf">Para PDF
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-default btn-block" type="submit" name="type" value="excel">Para Excel
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>