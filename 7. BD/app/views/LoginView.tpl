{extends file="main.tpl"}

{block name=footer}Adam Horzela{/block}

{block name=content}

<div style="width:90%; margin: 2em auto;">
<section>
        <h3>Podaj dane do logowania</h3>
        <form method="post" action="{$conf->action_url}login">
                <div class="row gtr-uniform gtr-50">
                        <div class="col-6 col-12-xsmall">
                            <input id="id_login" type="text" name="login" placeholder="Login" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                               <input id="id_pass" type="password" name="pass" placeholder="Hasło" />
                        </div>
                        <div class="col-12">
                                <ul class="actions">
                                        <li><input type="submit" value="Zaloguj" class="primary" /></li>
                                </ul>
                        </div>
                </div>
        </form>
</section>


{include file='messages.tpl'}
</div>
{/block}
