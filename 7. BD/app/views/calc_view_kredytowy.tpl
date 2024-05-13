{extends file="main.tpl"}

{block name=footer}Adam Horzela{/block}

{block name=content}
    
    
    
<header id="header">
        <h1 id="logo"><a href="{$conf->app_url}/index.php">Kalkulator kredytowy</a></h1>
        <nav id="nav">

                <ul>
                        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">Mój kanał YT!</a></li>
                        <li><a href="{$conf->action_url}results">Historia wyników</a></li>
                        <li><a href="{$conf->action_url}logout" class="button primary">Wyloguj użytkownika: <b>{$user->login}</b></a></li>
                </ul>
        </nav>
</header>
                                                
                                                

<div style="width:90%; margin: 2em auto;">

<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Kalkulator kredytowy</h2>
							<p>Oblicz swoją miesięczną ratę!</p>
                                                        
						</header>

<section>
        <h3>Wypełnij parametry kredytu</h3>
        <form method="post" action="{$conf->action_root}calcCompute">
                <div class="row gtr-uniform gtr-50">
                        <div class="col-6 col-12-xsmall">
                            <input id="id_amount" type="text" name="amount" value="{$form->amount}" placeholder="Kwota kredytu" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                               <input id="id_years" type="text" name="years" value="{$form->years}" placeholder="Liczba lat" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                               <input id="id_interest" type="text" name="interest" value="{$form->interest}" placeholder="Oprocentowanie" />
                        </div>
                        <div class="col-12">
                                <ul class="actions">
                                        <li><input type="submit" value="Oblicz" class="primary" /></li>
                                </ul>
                        </div>
                </div>
        </form>
</section>
	
	
{include file='messages.tpl'}

</div>
{/block}