<?php
class DatabaseConnection {

private $host;
private $dbname;
private $username;
private $password;
private $connection;

public function __construct($host, $dbname, $username, $password) {
    $this->host = $host;
    $this->dbname = $dbname;
    $this->username = $username;
    $this->password = $password;

    $this->connect();
}

private function connect() {
    $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);

    if ($this->connection->connect_errno) {
        throw new Exception("Errore di connessione al database: " . $this->connection->connect_error);
    }

    if (!$this->connection->set_charset('utf8')) {
            printf("Non è possibile usare UTF8: %s\n", $connessione->error);
        } 
        else {
            printf("Set di caratteri: %s\n", $connection->>character_set_name()); 
        }
}

public function query($query) : string {
    $result = $this->connection->query($query);

    if (!$result) {
        throw new Exception("Errore di esecuzione della query: " . $this->connection->error);
    }

    return $result;
}

public function close() {
    $this->connection->close();
}
}

?>