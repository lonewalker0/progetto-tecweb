<?php

class DBAccess {
   
   private const HOST_DB = "db";
   private const DATABASE_NAME = "dbtecweb";
   private const USERNAME = "root";
   private const PASSWORD = "root";
   private $connection;

   public function openConnection(): bool{
       mysqli_report(MYSQLI_REPORT_ERROR);

       try {
        $this->connection = mysqli_connect(DBAccess::HOST_DB, DBAccess::USERNAME, DBAccess::PASSWORD, DBAccess::DATABASE_NAME);

        if (!$this->connection) {
            throw new Exception("Errore di connessione al database: " . mysqli_connect_error());
        }
        return true;
        } catch (Exception $e) {
            echo "Errore: " . $e->getMessage();
            return false;
        }
   }

   public function closeConnection(): void{
    try {
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    } catch (Exception $e) {
        echo "Errore durante la chiusura della connessione: " . $e->getMessage();
    }
}
   
   #funzione per eseguire la query, viene usata solo quando non ci sono query parametriche
   public function executeQuery($query){
    try {
        $result = mysqli_query($this->connection, $query); 
        if (!$result) {
            throw new Exception("Errore nella query: " . mysqli_error($this->connection));
        }

        return $result;
    } catch (Exception $e) {
        echo "Errore: " . $e->getMessage();
        return false;
    }
}

    public function getConnection() {
        return $this->connection;
}


}

?>