{if $msgs->isError()}
<div class="error bottom-margin">
	<ol>
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
</div>
{/if}
{if $msgs->isInfo()}
<div class="info bottom-margin">
	<ol>
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
</div>
{/if}
{if isset($res->result)}
	<h4>Wynik:</h4>
	<p class="res">
            Wysokość miesięcznej raty wynosi {$res->result} zł.
        </p>
        <p class="total">
            Całkowita kwota do spłaty wynosi {$res->total} zł.
        </p>
{/if}
