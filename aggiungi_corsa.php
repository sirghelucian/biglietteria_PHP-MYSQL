<?php
  include("config.php");

  echo"<h1 align='left'>Inserisci corsa</h1>";
    echo"<form action='$_SERVER[PHP_SELF]' method='post'>
        Inserisci il nome della corsa: <br><input type='text' name='nome_corsa'> <br>
        Inserisci la tariffa della corsa: <br><input type='float' name='tariffa'> <br>
        <input type='submit' name='ok' value='Invia'> 
      </form>
    ";
  
  if(isset($_POST['ok'])){
  	if($_POST['nome_corsa']=="" || $_POST['tariffa']=="")
  		echo"ERRORE: compila tutti i campi";
  	else{
      $query="insert into corsa(nome_corsa,tariffa) values ('$_POST[nome_corsa]','$_POST[tariffa]')";
      mysqli_query($conn,$query)or die ("Errore negli inserimenti".mysqli_error());
      echo"Corsa aggiunta correttamente<br>";
      echo"<a href='home.php'> HOME </a><br>";
  	}
  }
?>