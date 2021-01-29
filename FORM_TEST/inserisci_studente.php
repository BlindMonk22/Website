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
$utente='Antonio'; 
$password='Antonio'; //metti la passwd qua di cosa? dell'sql?

$connessione = mysqli_connect($host,$utente,$password,$database);
        if(!$connessione){
            die("Errore di connessione ".mysqli_error());
        }

$punteggio = 0;
$totale=0;
$sql = "Select * from domande";
$query = mysqli_query($connessione,$sql);
while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
    $risposta = $_GET[$row["IDDOMANDA"]];
    if($risposta==($row["CORRETTA"])){
        $punteggio+=$row["PUNTEGGIO"];
    }
    $risposte = explode(";",$row["OPZIONI"]);
    echo "<div>";
    echo "Domanda n",$row["IDDOMANDA"],"";
    echo "<br>";
    echo "Risposta corretta: ",$risposte[($row["CORRETTA"])-1]," | ";
    echo "La tua risposta: ",$risposte[($risposta)-1],"\n";
    echo "</div>";
    $totale+=$row["PUNTEGGIO"];
}
echo "Il tuo punteggio finale è ",$punteggio,"/",$totale,"";

//comando SQL
$sql = "insert into studenti(cognome,nome,comune,classe,punteggio) values
('$cognome','$nome','$comune','$classe','$punteggio')";
  
$query = mysqli_query($connessione,$sql);

mysqli_close($connessione);
?>

</body>
</html>