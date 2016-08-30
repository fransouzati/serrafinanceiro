<?php
/* Smarty version 3.1.28, created on 2016-08-30 16:18:53
  from "C:\wamp\www\financeiro3\app\viewer\Project\addInstallment.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57c5dc1d994ff9_44533622',
  'file_dependency' => 
  array (
    'cfd54bb9c6671792af694ab9698282fed1dd2a6a' => 
    array (
      0 => 'C:\\wamp\\www\\financeiro3\\app\\viewer\\Project\\addInstallment.tpl',
      1 => 1472584724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c5dc1d994ff9_44533622 ($_smarty_tpl) {
?>


<!-- Modal -->
<div class="modal fade" id="addInstallmentModal" tabindex="-1" role="dialog" aria-labelledby="addInstallment" aria-hidden="true">
    <div class="modal-dialog">
        <form action="project/addInstallment/<?php echo $_smarty_tpl->tpl_vars['project']->value->get('id');?>
" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Adicionar parcela</h4>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-default" type="button" id="addInstallment">
                                    <span class="fa fa-plus"></span>
                                </button>
                                <button class="btn btn-default" type="button" id="removeInstallment">
                                    <span class="fa fa-minus"></span>
                                </button>
                                <button class="btn btn-default" type="button" id="calculateDates" title="Calcular datas">
                                    <span class="fa fa-calculator"></span>
                                </button>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>
                        <input type="hidden" name="qttInstallments" id="qttInstallments" min="<?php echo $_smarty_tpl->tpl_vars['qttInstallments']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['qttInstallments']->value;?>
">
                        <input type="hidden" name="minInstallments" value="<?php echo $_smarty_tpl->tpl_vars['qttInstallments']->value;?>
">
                        <div id="rowInstallments">

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div><?php }
}
