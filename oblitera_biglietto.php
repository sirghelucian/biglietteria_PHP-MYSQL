<?php
  include("config.php");
  
  echo"<h1 align='left'>Oblitera biglietto</h1>";
  echo"<form action='$_SERVER[PHP_SELF]' method='post'>";
  $elenco=mysqli_query($conn,"select * from biglietto;")or die (mysqli_error()); 
  echo"<select name='biglietto'>";
  while($riga=mysqli_fetch_array($elenco))
      echo"<option value='$riga[num_ordine]'>$riga[codice_corsa]</option>";
  echo"</select>Seleziona il biglietto <br>
    <input type='submit' name='ok' value='Oblitera'> 
  </form>
  ";

  if(isset($_POST['ok'])){
    if(isset($_POST['biglietto'])){
      $data = date("Y-m-d H:i:s");    
      $query="insert into biglietto(stato,Data_ora_obliterato)where biglietto.num_ordine=$_POST[biglietto] values ('OBLITERATO','$data')";
      mysqli_query($conn,$query)or die ("Errore ".mysqli_error());
      echo"Biglietto obliterato correttamente<br>";
      echo"<a href='home.php'>HOME</a><br>";
  	}
    else
      echo"ERRORE: compila tutti i campi";
  }
?>