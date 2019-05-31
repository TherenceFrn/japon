<?php
$adresseURL = 'erreur';
switch($_GET['erreur'])
{
   case '400':
   $erreurPage = 'Échec de l\'analyse HTTP.';
   break;
   case '401':
   $erreurPage = 'Le pseudo ou le mot de passe n\'est pas correct !';
   break;
   case '402':
   $erreurPage = 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
   break;
   case '403':
   $erreurPage = 'Requête interdite !';
   break;
   case '404':
   $erreurPage = 'La page n\'existe pas ou plus !';
   break;
   case '405':
   $erreurPage = 'Méthode non autorisée.';
   break;
   case '500':
   $erreurPage = 'Erreur interne au serveur ou serveur saturé.';
   break;
   case '501':
   $erreurPage = 'Le serveur ne supporte pas le service demandé.';
   break;
   case '502':
   $erreurPage = 'Mauvaise passerelle.';
   break;
   case '503':
   $erreurPage = ' Service indisponible.';
   break;
   case '504':
   $erreurPage = 'Trop de temps à la réponse.';
   break;
   case '505':
   $erreurPage = 'Version HTTP non supportée.';
   break;
   default:
   $erreurPage = 'Erreur !';
}

include 'header.php';
include 'head.php';
?>
