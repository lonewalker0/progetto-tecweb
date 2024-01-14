<?php

class DBAccess {
   
   private const HOST_DB = "mpiccoli";
   private const DATABASE_NAME = "dbtecweb";
   private const USERNAME = "root";
   private const PASSWORD = "eoshiCocooy5oush";
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
   
   #funzione per passargli la query
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
    //ricordarsi di toglierla se non viene usata
    public function fetchAllRows($result): string{
        try {
        if (!$result) {
            throw new Exception("Errore nella query: " . mysqli_error($this->connection));
        }

        $rows = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        mysqli_free_result($result);

        return $rows;
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