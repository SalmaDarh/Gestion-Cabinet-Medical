<?php

//Recherche par login
function recherche_user_byLogin($login)
{
    global $pdo;
    $req = $pdo->prepare("select * from utilisateur where login=?");
    $valeur = array($login);
    $req->execute($valeur);
    $nbr_user = $req->rowCount();
    return $nbr_user;
}

//Recherche par login et id
function recherche_user_byLoginId($login, $id)
{
     global $pdo;
    $req = $pdo->prepare("select * from utilisateur where login=? and id_utilisateur!=?");
    $valeur = array($login, $id);
    $req->execute($valeur);
    $nbr_user = $req->rowCount();
    return $nbr_user;
}

//Recherche par login et pwd (Soit l'utilisateur soit NULL)
function recherche_user_byLoginPwd($login, $pwd)
{
     global $pdo;
	 
    $req = $pdo->prepare("select * from utilisateur where login=? and pwd=?");
    $valeur = array($login, $pwd);
    $req->execute($valeur);
    $nbr_user = $req->rowCount();

    if ($nbr_user == 1) // si l'utilisateur existe
        return $req->fetch(); //Retourner l'utilisateur(id_utilisateur,login,pwd et role)
    else // si l'utilisateur n'existe pas
        return 0;

}
?>