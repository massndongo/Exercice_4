<?php 
    include_once "fonctions.php";
    $tabphrases=[];
    $resultat=[];
    $phrasesFausses=[];
    if (isset($_POST['valider'])) {
        $texte=$_POST['phrase'];
        if (empty($texte)) {
            $error="Veuillez remplir le champ";
        }else {
            $tabphrases=decoupage_texte_en_phrase($texte);
            foreach ($tabphrases as $value) {
                $value=delete_spc_inutile($value);
                if (!is_phrase($value) || taille($value)>200) {
                    array_push($phrasesFausses,$value);
                }else {
                    array_push($resultat,$value);
                }
            }
        }
    }
?>
<html>
    <head>
        <title>EXO4</title>
        <link rel="stylesheet" href="EXO4.css">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <form action="" method="POST">
            <h3>Saisir le texte :</h3>
            <textarea name="phrase" id="phrase" cols="30" rows="10"><?= isset($texte) ? $texte : ''  ?></textarea>
            <input type="submit" name="valider">
            <?php if (!empty($error)) {
                echo '<p class="erreur">'.$error.'</p>';
            }else { 
                if (!empty($phrasesFausses)) {
                    echo '<p class="fausse">La ou les phrases incorrectes : <br>';
                    foreach ($phrasesFausses as $pf) {
                        echo '( '.$pf.' ) ';}
                        echo "</p>";
                }
                if(isset($_POST['valider']) && !empty($resultat)){ ?>
                    <h3 class="r">Résultat(s) :</h3>
                    <textarea readonly="readonly" name="" id="resultat" cols="30" rows="10"><?php foreach ($resultat as $r) {
                        echo $r;
                    } ?></textarea>
               <?php }
            } ?>
        </form>
    </body>
</html>