<?php
require './lib/php/verif_cnx';
?>

<h2>Ajout réalisateur</h2>

<?php
if (isset($_GET['submit_aut'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (trim($nomReal) != '') {
        $mg2 = new AjoutRealManagement($db);
        $retour = $mg2->addReal($_GET);
        if ($retour == 1) {
            $texte = "<span class='txtGras'>Réalisateur ajouté<br/></span>";
        } else if ($retour == 2) {
            $texte = "<span class='txtGras'>Réalisateur déjà présent<br/></span>";
        }
        if (isset($_SESSION['form'])) {
            unset($_SESSION['form']);
        }
    } else {
        $texte = "Veuillez à bien remplir tout les champs. Merci.";
        if (trim($nomReal) != '') {
            $_SESSION['form']['nomReal'] = $nomReal;
        }
    }
}
?>

<img src="../admin/images/???.jpg" alt="Image réalisateur"/>
&nbsp;
<section id="resultat" class="txtGreen">
    <?php
    if (isset($texte)) {
        print $texte;
    }
    ?>
</section>
<section id="leform">
    <form id="form_ajout_real" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Dev">
            <legend class="txtMauv txtGras">Renseignements sur le réalisateur: </legend>
            <table>
                <tr>
                    <td>Nom réalisateur: </td>
                    <td>
                        <?php if(isset($_SESSION['form']['nomReal'])){ ?>
                        <input type="text" name="nomReal" id="nomReal" value="<?php print $_SESSION['form']['nomReal'];?>"/>
                        <?php
                        }
                        else{
                            ?>
                        <input type="text" name="nomReal" id="nomReal" placeholder="Nom réalisateur" required/>
                        <?php
                        }
                        ?>
                        <div id="error"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                     <input type="submit" name="submit_real" id="submit_reserv" value="Cliquez pour ajouter le réalisateur"/>
                     &nbsp;&nbsp;&nbsp;
                     <input type="reset" id="reset" value="Vider le formulaire"/>
                    </td>
                </tr>
            </table>
        </fieldset>                  
    </form>
</section>