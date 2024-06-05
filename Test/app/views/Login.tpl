{extends "main.tpl"}

{block name="main"}
    <h1>Logowanie</h1>
    <form action="login" method="POST">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="name" type="text" value="{$form->name}">
        <label for="password">Hasło</label>
        <input id="password" name="password" type="password" value="{$form->password}">
        <input type="submit" value="Zaloguj">
    </form>
{/block}