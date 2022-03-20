<?php
  include("config.php");

  echo"<h1 align='left'>Mostra biglietti selezionata la corsa</h1>";
  echo"<form action='$_SERVER[PHP_SELF]' method='post'>";
  $elenco=mysqli_query($conn,"select * from corsa;")or die (mysqli_error()); 
  echo"<select name='corsa'>";
  while($riga=mysqli_fetch_array($elenco))
    echo"<option value='$riga[num_corsa]'>$riga[nome_corsa]</option>";
  echo"</select>Seleziona la corsa <br>
    <input type='submit' name='ok' value='Mostra'> 
    </form>
  ";
  if(isset($_POST['ok'])){
    if(isset($_POST['corsa'])){
      $query="select num_corsa,nome_corsa,tariffa,num_ordine,stato,Data_ora_creazione from corsa,biglietto where corsa.num_corsa=biglietto.codice_corsa and biglietto.stato='NON OBLITERATO';";
      mysqli_query($conn,$query)or die ("Errore ".mysqli_error());
      echo"<br>";
      echo"<a href='home.php'>HOME</a><br>";
  	}
    else
      echo"ERRORE: compila tutti i campi";
  }
?>