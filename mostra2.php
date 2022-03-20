<?php
  include("config.php");
  echo"<h1 align='left'>Mostra le corse selezionata la data</h1>";
  echo"<form action='$_SERVER[PHP_SELF]' method='post'>";
  echo"
    Selezionare data: <br>
    <input type='datetime('Y-m-d H:i:s')' name='data'> <br>
    <input type='submit' name='ok' value='Mostra'> 
    </form>
  ";

  if(isset($_POST['ok'])){
    if(isset($_POST['data'])){
      $query="select num_corsa,nome_corsa,tariffa,num_ordine,stato,Data_ora_creazione from corsa,biglietto where corsa.num_corsa=biglietto.codice_corsa and biglietto.Data_ora_creazione=$_POST['data'];";
      mysqli_query($conn,$query)or die ("Errore ".mysqli_error());
      echo"<br>";
      echo"<a href='home.php'>HOME</a><br>";
    }
    else
      echo"ERRORE: compila tutti i campi";

  }
?>