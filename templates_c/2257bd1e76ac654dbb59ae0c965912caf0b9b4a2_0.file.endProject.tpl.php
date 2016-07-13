<?php
/* Smarty version 3.1.28, created on 2016-07-07 11:44:58
  from "C:\xampp\htdocs\serra\financeiro\app\viewer\Project\endProject.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_577e6aea104cb1_29222674',
  'file_dependency' => 
  array (
    '2257bd1e76ac654dbb59ae0c965912caf0b9b4a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\serra\\financeiro\\app\\viewer\\Project\\endProject.tpl',
      1 => 1467902697,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577e6aea104cb1_29222674 ($_smarty_tpl) {
?>


<!-- Modal -->
<div class="modal fade" id="endModal" tabindex="-1" role="dialog" aria-labelledby="endModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Finalizar projeto</h4>
            </div>
            <div class="modal-body">
                <form action="/project/end/<?php echo $_smarty_tpl->tpl_vars['project']->value->get('id');?>
" method="post">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label class="control-label" for="done_date">Data de término</label>
                            <input type="text" class="form-control mask-date" name="done_date">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">
                                Finalizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div><?php }
}
