<?php
/* Smarty version 3.1.28, created on 2016-07-12 05:08:28
  from "/home/serra601/public_html/financeiro/app/viewer/Project/viewInstallments.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5784a57c1ee8e1_22508498',
  'file_dependency' => 
  array (
    '20e598831c505fe69ba1c339a4f47ba55fa7e5bf' => 
    array (
      0 => '/home/serra601/public_html/financeiro/app/viewer/Project/viewInstallments.tpl',
      1 => 1467835795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a57c1ee8e1_22508498 ($_smarty_tpl) {
?>


<!-- Modal -->
<div class="modal fade" id="viewInstallmentModal" tabindex="-1" role="dialog" aria-labelledby="viewInstallment" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pendências de projeto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 id="_project_title" class="page-header"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Valor</th>
                                    <th>Vencimento</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-installments">

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
