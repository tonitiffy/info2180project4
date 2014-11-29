<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CheapoMial - Compose Message</title>
        <link href="stylesheet.css" type="text/css" rel="stylesheet"/>
        <script src="cheapomail.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="formLayout">
        <form onsubmit="return sendMsg();">
            <fieldset>
                <label for="subject">Subject</label>
                <input id="subject" type="text" name="subject"/><br /><br />
                <label for="recipients">Recipients</label>
                <input id="recipients" type="text" name="recipients"/><br /><br />
                <textarea id="body" rows="4" cols="50"></textarea>
                <div class="buttonLayout">
                    <input type="submit" value="Send"/>
                    <input type="button" value="Cancel" onclick="returnToHome()"/>
                </div>
            </fieldset>
        </form>
        </div>
    </body>
</html>