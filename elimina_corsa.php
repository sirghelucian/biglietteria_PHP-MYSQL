<?php
  include("config.php");
  echo"<h1 align='left'>Elimina corsa</h1>";
 
  $query="select * from corsa;";
  $risultato=mysqli_query($conn,$query)or die (mysqli_error($conn));
 
  echo"<form action='$_SERVER[PHP_SELF]' method='post'>
        <select name='ricerca'>";
          while($riga=mysqli_fetch_array($risultato))
            echo"<option value='$riga[num_corsa]'>$riga[nome_corsa]</option>";
          echo"</select>
          <input type='submit' name='ok' value='Elimina'>
        </form>
  ";

  if(isset($_POST['ok'])){
    $query="delete from corsa where num_corsa='$_POST[ricerca]';";
    mysqli_query($conn,$query)or die (mysqli_error($conn));
    echo"Eliminazione avvenuta con successo.<br>
    <a href='home.php'> HOME</a>";
  }
?>