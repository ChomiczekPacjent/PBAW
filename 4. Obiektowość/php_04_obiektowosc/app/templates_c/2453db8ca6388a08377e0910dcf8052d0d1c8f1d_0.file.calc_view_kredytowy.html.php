<?php
/* Smarty version 4.2.1, created on 2024-04-08 15:25:37
  from 'C:\xampp\htdocs\php_05_obiektowosc_zadanie\app\calc_view_kredytowy.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6613f051548ab0_34408873',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2453db8ca6388a08377e0910dcf8052d0d1c8f1d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_05_obiektowosc_zadanie\\app\\calc_view_kredytowy.html',
      1 => 1712582646,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6613f051548ab0_34408873 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7716893686613f051522455_69727560', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6328207126613f051522f07_30947120', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'footer'} */
class Block_7716893686613f051522455_69727560 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_7716893686613f051522455_69727560',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Adam Horzela<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_6328207126613f051522f07_30947120 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_6328207126613f051522f07_30947120',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div style="width:90%; margin: 2em auto;">



<section>
        <h3>Wypełnij parametry kredytu</h3>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc_kredytowy.php">
                <div class="row gtr-uniform gtr-50">
                        <div class="col-6 col-12-xsmall">
                            <input id="id_amount" type="text" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
" placeholder="Kwota kredytu" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                               <input id="id_years" type="text" name="years" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->years;?>
" placeholder="Liczba lat" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                               <input id="id_interest" type="text" name="interest" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->interest;?>
" placeholder="Oprocentowanie" />
                        </div>
                        <div class="col-12">
                                <ul class="actions">
                                        <li><input type="submit" value="Oblicz" class="primary" /></li>
                                </ul>
                        </div>
                </div>
        </form>
</section>
	
	
<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	
		<h4>Wystąpiły błędy: </h4>
		<ol class="error">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>

            <h4>Informacje: </h4>
            <ol class="info">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ol>

<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
	<h4>Wynik:</h4>
	<p class="res">
            Wysokość miesięcznej raty wynosi <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
 zł.
        </p>
        <p class="total">
            Całkowita kwota do spłaty wynosi <?php echo $_smarty_tpl->tpl_vars['res']->value->total;?>
 zł.
        </p>
<?php }?>
</div>
<?php
}
}
/* {/block 'content'} */
}
