<?php
  include("config.php");

  echo"<h1 align='left'>Acquista biglietto</h1>";
  echo"<form action='$_SERVER[PHP_SELF]' method='post'>";

  $elenco=mysqli_query($conn,"select * from corsa;")or die (mysqli_error()); 
    echo"<select name='corsa'>";
      while($riga=mysqli_fetch_array($elenco)){
        echo"<option value='$riga[num_corsa]'>$riga[nome_corsa]</option>";
      }
    echo"</select>Seleziona la corsa <br>

    <input type='submit' name='ok' value='Acquista'> 

  </form>
  ";

  if(isset($_POST['ok'])){
    if(isset($_POST['corsa'])){

      $data = date("Y-m-d H:i:s");    

      $query="insert into biglietto(codice_corsa,stato,Data_ora_creazione) values ('$_POST[corsa]','NON OBLITERATO','$data')";
      mysqli_query($conn,$query)or die ("Errore nell'acquisto".mysqli_error());
      echo"Biglietto acquistato correttamente<br>";
      echo"<a href='home.php'>HOME</a><br>";   
  	}
    else
      echo"ERRORE: compila tutti i campi";
  
  }
?>