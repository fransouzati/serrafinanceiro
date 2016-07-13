<?php
/* Smarty version 3.1.28, created on 2016-07-07 09:29:14
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Project\viewInstallments.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577e4b1acb9cd5_19846648',
  'file_dependency' => 
  array (
    'c8f0ada3049ce84b395f22c80fe00b16ac618706' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Project\\viewInstallments.tpl',
      1 => 1467835795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577e4b1acb9cd5_19846648 ($_smarty_tpl) {
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
