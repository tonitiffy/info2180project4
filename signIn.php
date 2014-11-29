<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CheapoMail - Sign in</title>
        <link href="stylesheet.css" type="text/css" rel="stylesheet" />
        <script src="//ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
        <script src="cheapomail.js" type="text/javascript"></script>
    </head>
    </head>
    <body id="body">
        <div>
            <h1>Welcome to CheapoMail!</h1>
            <div class="formLayout">
            <form onsubmit="return verifyUser();">
                <fieldset>
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username"/><br /><br />
                    <label for="password">Password</label>
                    <input id="password" type="text" name="password"/><br /><br />
                    <div class="buttonLayout">
                        <input type="submit" value="Sign In"/>
                    </div>
                </fieldset>
            </form>
            </div>
        </div>
    </body>
</html>