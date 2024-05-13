<?php
/* Smarty version 4.2.1, created on 2024-05-06 18:50:45
  from 'C:\xampp\htdocs\php_07_BD\app\views\results_view_kredytowy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_66390a65844741_81157384',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f983db70d54fadf5cc52cd9e77b557b5fcc76d98' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_07_BD\\app\\views\\results_view_kredytowy.tpl',
      1 => 1715014242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_66390a65844741_81157384 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_49932908166390a65837bd8_40305478', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_210246824566390a65838324_73192955', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_49932908166390a65837bd8_40305478 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_49932908166390a65837bd8_40305478',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Adam Horzela<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_210246824566390a65838324_73192955 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_210246824566390a65838324_73192955',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<header id="header">
	<h1 id="logo"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php">Kalkulator kredytowy</a></h1>
	<nav id="nav">
							
		<ul>
			<li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">Mój kanał YT!</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
/index.php">Strona główna</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" class="button primary">Wyloguj użytkownika: <b><?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</b></a></li>
		</ul>
	</nav>
</header>


<div style="width:90%; margin: 2em auto;">
<section>
	<table>
<thead>
	<tr>
		<th>Kwota</th>
		<th>Ile lat</th>
		<th>Oprocentowanie</th>
		<th>Wysokość miesięcznej raty</th>
                <th>Całkowita kwota do spłaty</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['raty']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["kwota"];?>
 zł</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["lat"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["procent"];?>
 %</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["rata"];?>
 zł</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["total"];?>
 zł</td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
</section>


<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php
}
}
/* {/block 'content'} */
}
