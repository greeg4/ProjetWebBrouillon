<?php
if (isset($_POST['submit_login'])) {
$mg = new seConnecter($db);
$retour = $mg->estAdmin($_POST['login'], $_POST['password']);
if (retour == 1) {
$_SESSION['admin'] = 1;
$message = "Authentifié";
header('Location: http://localhost/ProjetWebBrouillon/admin/index.php');
} else {
$message = $retour;
$message = "Incorrectes";
}
}
?>
<section id="message">
    <?php
    if(isset($message)){
    print $message;
    ?>
    }
</section>
<fieldset id="fieldset_login">
    <legend>Veuillez enter votre accés</legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth">
        <table>
            <tr>
                <td>
                    Login: <?php //print "session : ".$_SESSION['admin'];  ?>
                </td>
                <td>
                    <input type="text" id="login" name="login"/>
                </td>
            </tr>
            <tr>
                <td>
                    Password:
                </td>
                <td>
                    <input type="password" id="password" name="password"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit_login" id="submit_login" value="login"/>    
                    <input type="reset" id="annuler" value="annuler"/>
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<div id="shadow" class="popup"></div>
