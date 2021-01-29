<html>
<head>
<title> pagina1</title>
</head>	
<body>
<h1> FORM DI INVIO DATI</h1>
<br/>
<form action="inserisci_studente.php" method="GET">
   <fieldset>
    <legend align="center">DATI DELLO STUDENTE</legend>
    <table border="0">
	  <tr><td>COGNOME:<td><input name="COGNOME" type="text" size="20"><tr>
      <tr><td>NOME:<td><input name="NOME" type="text" size="20"><tr>
    </table>
	 </fieldset>
	 <br>
    COMUNE DI NASCITA:<input name="COMUNE" type="text"><br><br>
	 CLASSE ATTUALE:<br>
	<select name="CLASSE">
    <option>1C</option>
    <option>2C</option>
    <option>3C</option>
	<option>4C</option>
    <option>5C</option>
  </select>
  <br>
  <br>
  <br>
  <br>
  <h1>INIZIO DOMANDE</h1>
  <?php
  //Creo una domanda per ogni riga presente nel database
  //parametri necessari per la connessione a MYSQL
  $host = 'localhost'; //ipotizzando di accedere ad un server locale.
  $database = 'form';
  $utente='Antonio'; 
  $password='Antonio'; //metti la passwd qua di cosa? dell'sql?

  $connessione = mysqli_connect($host,$utente,$password,$database);
        if(!$connessione){
            die("Errore di connessione ".mysqli_error());
        }
  $sql = "Select * from domande";
  $query = mysqli_query($connessione,$sql);
  while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
    echo "<p>", $row["TESTO"],"<p>";
    $risp =explode(";",$row["OPZIONI"]);
    $i=1;
    foreach($risp as $value){
        echo "<input type=\"radio\" id=",$row["IDDOMANDA"]," name=",$row["IDDOMANDA"]," value=",$i,">
        <label for=",$i,">$value</label><br>";
        $i+=1;
    }
    $i=0;
  }

  mysqli_close($connessione);
  ?>
	 <INPUT TYPE="submit" NAME="B1"VALUE="Invia" />
<INPUT TYPE="reset" NAME="B2" VALUE="Annulla" />
</form>
</body>
</html>