<div><? echo $controller->error; ?></div>
<br/>
<form method="post" action="/?controller=admin&action=login">
    Login:<br/><input type="text" name="login" value="<? echo $_REQUEST["login"]; ?>" /><br/><br/>
    Passwort:<br/><input type="password" name="loginp" /><br/><br/>
    <input type="submit" value="Login" />
</form>
