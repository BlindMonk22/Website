<html>
<head>
<title> INSERIMENTO NUOVO STUDENTE </title>
</head>
<body bgcolor="lightblue">
<h2 align=left>INSERIMENTO NUOVO STUDENTE</h2> 

<?php

$cognome = $_GET["COGNOME"];
$nome = $_GET["NOME"];
$comune = $_GET["COMUNE"];
$classe = $_GET["CLASSE"];


//parametri necessari per la connessione a MYSQL
$host = 'localhost'; //ipotizzando di accedere ad un server locale.
$database = 'form';
$utente='root'; 
$password='root'; //metti la passwd qua di cosa? dell'sql?

$connessione = mysqli_connect($host,$utente,$password,$database);
        if(!$connessione){
            die("Errore di connessione ".mysqli_error());
        }

 
//comando SQL
$sql = "insert into studenti(cognome,nome,comune,classe) values
('$cognome','$nome','$comune','$classe')";
 //inserire il testo del comando desiderato

echo ("<BR>".$sql);// utile in fase di debug
  
$query = mysqli_query($connessione,$sql);

 mysqli_close($connessione);
?>

</body>
</html>