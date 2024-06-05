{extends "../templates/Main.tpl"}

{block name="main"}
    <h1>Rejestracja</h1>
    <form action="register" method="POST">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text" value="{$form->nickname}">
        <label for="firstName">Imię</label>
        <input id="firstName" name="firstName" type="text" value="{$form->firstName}">
        <label for="lastName">Nazwisko</label>
        <input id="lastName" name="lastName" type="text" value="{$form->lastName}">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{$form->email}">
        <label for="password">Hasło</label>
        <input id="password" name="password" type="password" value="{$form->password}">
        <label for="repeatedPassword">Powtórz hasło</label>
        <input id="repeatedPassword" name="repeatedPassword" type="password" value="{$form->repeatedPassword}">
        <input type="submit" value="Zarejestruj">
    </form>
{/block}