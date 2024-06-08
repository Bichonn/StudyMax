<?php require('layout/header.php');     
session_destroy();                                      // Détruit la session
echo "<script>location.href = 'index.php'</script>";    // Redirige vers la page d'accueil