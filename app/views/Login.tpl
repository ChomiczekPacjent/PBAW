{extends "Main.tpl"}

{block name="main"}
    <h1>Logowanie</h1>
    <form action="login" method="POST">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text" value="{$form->nickname}">
        <label for="password">Hasło</label>
        <input id="password" name="password" type="password" value="{$form->password}">
        <input type="submit" value="Zaloguj">
    </form>
{/block}