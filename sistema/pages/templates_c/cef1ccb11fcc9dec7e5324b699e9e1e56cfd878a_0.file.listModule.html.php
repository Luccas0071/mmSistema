<?php
/* Smarty version 4.0.0, created on 2022-04-02 21:33:47
  from 'C:\xampp\htdocs\mmSistema\sistema\pages\templates\module\listModule.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_6248a51bda4da2_01059292',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cef1ccb11fcc9dec7e5324b699e9e1e56cfd878a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mmSistema\\sistema\\pages\\templates\\module\\listModule.html',
      1 => 1648926665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6248a51bda4da2_01059292 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 language="JavaScript">
    jQuery.noConflict();

    function include() {
        window.location = "index.php?do=module&action=edit&share=I";
    }

    function displayModule(code) {
        window.location = "index.php?do=module&action=edit&share=E&code="+code;
    }

    function contentModule(code) {
        window.location = "index.php?do=contents&action=edit&share=I&code="+code;
    }

    function changeModule(code) {
        window.location = "index.php?do=module&action=edit&share=A&code="+code;
    }

    function deleteModule(code) {
        window.location = "index.php?do=module&action=edit&share=D&code="+code;
    }

<?php echo '</script'; ?>
>

<div class="container">
    <div class="row align-items-start">
      <div class="col-12">
          <div class="padding-padrao">
              <h1>Módulo</h1>
          </div>
      </div>

    </div>
    <hr>
    <div class="row align-items-start">
        <div class="col-4">
            <div class="padding-padrao">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pesquisar Módulo">
                    <button type="button" name="btn-incluir" id="btn-incluir" class="btn btn-primary" onclick="incluir();">
                        <i class="fas fa-search"></i> Pesquisar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th class="col-1">#</th>
            <th class="col-1">Codigo</th>
            <th class="col-2">Titulo</th>
            <th class="col-2">Responsável</th>
            <th class="col-1">Ação</th>
          </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['collectionModule']->value, 'objModule');
$_smarty_tpl->tpl_vars['objModule']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['objModule']->value) {
$_smarty_tpl->tpl_vars['objModule']->do_else = false;
?>
                <tr>
                    <th><?php echo $_smarty_tpl->tpl_vars['objModule']->value->getId();?>
</th>
                    <td><?php echo $_smarty_tpl->tpl_vars['objModule']->value->getTitle();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['objModule']->value->getDescription();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['objModule']->value->getUpdateDate();?>
</td>
                    <td>
                        <button type="button" title="Exibir" class="btn btn-primary btn-sm" onclick="javascript: displayModule('<?php echo $_smarty_tpl->tpl_vars['objModule']->value->getId();?>
');">
                            <i class="fas fa-search"></i>
                        </button>
                        <button type="button" title="Conteudo" class="btn btn-info btn-sm" onclick="javascript: contentModule('<?php echo $_smarty_tpl->tpl_vars['objModule']->value->getId();?>
');">
                            <i class="fas fa-align-center"></i>
                        </button>
                        <button type="button" title="Alterar" class="btn btn-warning btn-sm" onclick="javascript: changeModule('<?php echo $_smarty_tpl->tpl_vars['objModule']->value->getId();?>
')">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button type="button" title="Excluir" class="btn btn-danger btn-sm" onclick="javascript: deleteModule('<?php echo $_smarty_tpl->tpl_vars['objModule']->value->getId();?>
')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>
<?php }
}
