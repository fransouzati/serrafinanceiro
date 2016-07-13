<?php
/* Smarty version 3.1.28, created on 2016-07-12 05:08:39
  from "/home/serra601/public_html/financeiro/app/viewer/Client/viewPendencies.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a587bb1c27_27289420',
  'file_dependency' => 
  array (
    '00c0b39e0c2f6610a6baf5658c683a40e2ff8ff2' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/Client/viewPendencies.tpl',
      1 => 1467942177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a587bb1c27_27289420 ($_smarty_tpl) {
?>


<!-- Modal -->
<div class="modal fade" id="viewPendenciesModal" tabindex="-1" role="dialog" aria-labelledby="viewPendencies" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pendências de cliente</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 id="_client_name" class="page-header"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Vencimento</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-pendencies">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div><?php }
}
