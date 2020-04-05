<?php
// FONCTION POUR DEFINIR LA LONGUEUR D'UN TABLEAU OU D'UNE CHAINE
function taille($tab){
    $i=0;
    while (isset($tab[$i])) {
        $i++;
    }
    return $i;
}
//  FONCTION POUR SUPPRIMER LES ESPACES AVANT ET APRES D'UNE CHAINE
function delete_spc_before_after($chaine){
    $debut=0;
    $fin=taille($chaine)-1;
    $newChaine="";
    if (!isset($chaine[$debut])) {
        return "";
    }
    while ($chaine[$debut]==' ') {
        $debut++;
        if (!isset($chaine[$debut])) {
            return "";
        }
    }
    while ($chaine[$fin]==' ') {
        $fin--;
    }
    for ($i=$debut; $i <= $fin ; $i++) { 
        $newChaine.=$chaine[$i];
    }
    return $newChaine;
}
function print_error($tab){
    $chaine="";
    foreach ($tab as $t) {
        $chaine .= $t." - ";
    }
    return $chaine;
}
//   FONCTION POUR TESTER LA VALIDITE D UNE PHRASE
function is_phrase($chaine){
    $debut=0;
    $fin=taille($chaine)-1;
    $point=".?!";
    if (!isset($chaine[$debut])) {
        return false;
    }
    for ($i=0; $i < taille($chaine) ; $i++) {
        if (preg_match('/^[A-Z0-9]/',$chaine[$i])) {
            if ($chaine[$fin]=='.' || $chaine[$fin]=='?' || $chaine[$fin]=='!') {
                return true;
            }else {
                return false;
            }
        }
        return false;   
    }
}
//   FONCTION POUR DECOUPER UN TEXTE EN PHRASE
function decoupage_texte_en_phrase($chaine){
    $tabPhrase=[];
    $phrase=preg_split('/([^.?!]+[.?!]+)/',$chaine,-1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
    foreach ($phrase as $value) {
        array_push($tabPhrase,$value);
    }
    return $tabPhrase;
}

//    FONCTION POUR ELIMINER LES ESPACES INUTILES
function delete_spc_inutile($chaine){
    $pattern='%\s\s{2,}%';
    $replacement=' ';
    $newChaine=delete_spc_before_after($chaine);
    $resultat=preg_replace($pattern,$replacement,$newChaine);
    return $resultat;
}   
?>