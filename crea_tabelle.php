<?php
  include("config.php");
  
  $query="
    create table if not exists corsa(
      num_corsa int(11) primary key auto_increment,
      nome_corsa varchar(50),
      tariffa float(5,2)
    );
  ";
  mysqli_query($conn,$query) or die("Errore nella creazione della tabella".mysqli_error());  
  echo"Tabella CORSA creata correttamente";
  
  $query="
    create table if not exists biglietto(
      num_ordine int(11) primary key auto_increment,
      codice_corsa int(11),
      stato varchar(40),
      Data_ora_creazione datetime,
      Data_ora_obliterato datetime,
      foreign key (codice_corsa) references corsa(num_corsa) on update cascade on delete cascade
    );
  ";
  
  mysqli_query($conn,$query) or die("Errore nella creazione della tabella".mysqli_error());  
  echo"Tabella BIGLIETTO creata correttamente";

  mysqli_close($conn);
?>