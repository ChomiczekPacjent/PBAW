{extends file="../templates/main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<h3>Prosty kalkulator</h2>


<form class="pure-form pure-form-stacked" action="{$app_url}/app/calc.php" method="post">
	<fieldset>
		<label for="id_kwota">Kwota kredytu</label>
		<input id="id_kwota" type="text" placeholder="zł" name="kwota" value="{$form['kwota']}">
                
		<label for="id_oprocentowanie">Oprocentowanie</label>
		<input id="id_oprocentowanie" type="text" placeholder="%" name="oprocentowanie" value="{$form['oprocentowanie']}">
					
		<label for="id_raty">Ilośc rat</label>
		<input id="id_raty" type="text" placeholder="msc" name="raty" value="{$form['raty']}">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if isset($messages)}
	{if count($messages) > 0} 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if isset($infos)}
	{if count($infos) > 0} 
		<h4>Informacje: </h4>
		<ol class="inf">
		{foreach  $infos as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{if isset($result)}
	<h4>Wynik</h4>
	<p class="res">
	{$result}
	</p>
{/if}

</div>

{/block}