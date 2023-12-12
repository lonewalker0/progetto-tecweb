<?php

class DBAccess {
   
   private const HOST_DB = "localhost";
   private const DATABASE_NAME = "dbtecweb";
   private const USERNAME = "root";
   private const PASSWORD = "root";
   private $connection;

   public function open_connection() {
       mysqli_report(MYSQLI_REPORT_ERROR);

       $this->connection = mysqli_connect(DBAccess::HOST_DB, DBAccess::USERNAME, DBAccess::PASSWORD, DBAccess::DATABASE_NAME);

       if (mysqli_connect_errno()) {
           echo "Errore di connessione al database: " . mysqli_connect_error();
           return false;
       } else {
           return true;
       }
   }

   public function close_connection() {
       if ($this->connection) {
           mysqli_close($this->connection);
           echo "Connessione al database chiusa con successo.";
       }
   }
   
   #funzione per passargli la query
   public function executeQuery($query) {
    $result = mysqli_query($this->connection, $query) or die("Errore DB: " . mysqli_error($this->connection));

    return $result;
}
        #gli va passato il result della funzione precedente per la visualizzazione
    public function fetchAllRows($result) {

        if (!$result) {
            echo "Errore nella query: " . mysqli_error($this->connection);
            return false;
        }



        $rows = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        mysqli_free_result($result);

        return $rows;
    }
}

?>