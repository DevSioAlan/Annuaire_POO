<?php

class Gerer
{
    private $pdo;
    public function __construct()
    {
        $this->pdo=PdoBridge::getPdoBridge();
    }
    public function accueil():void
    {
        $message="Ce site permet d'enregistrer les participants à une épreuve.";
        include("views/v_accueil.php");
    }
    public function lister(): void
    {
        $les_membres=$this->pdo->getLesMembres();
        require 'views/v_listemembres.php';
    }
    public function ajouter(): void   
    {
         $les_membres=$this->pdo->getLesMembres();
        require 'views/v_ajoutermembre.php';
    }
    public function choisir():void
    {
        $les_membres = $this->pdo->getLesMembres();
        require 'views/v_choisirmembre.php';
    }
   
    public function modifier():void
    {
        $id=$_REQUEST['id'];
        $unMembre=$this->pdo->getUnMembre($id);
        $unMembre=$unMembre[0];
        require "views/v_saisiemembre.php";
    }
    public function supprimer(): void
{
    $les_membres = $this->pdo->getLesMembres();
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
        $id = (int) $_POST["id"];
        if ($this->pdo->getunMembre($id)) {
            $_SESSION["message_succes"] = "Le membre a bien été supprimé.";
            header("Location: index.php?uc=Gerer&action=lister");
            exit();
        } else {
            $_SESSION["message_erreur"] = "Impossible de supprimer ce membre.";
        }
    }
    require "views/v_supprimermembre.php";
}

    
    public function error():void
    {
        $_SESSION["message_erreur"] = "Site en construction";
        include("views/404.php");
    }
}
