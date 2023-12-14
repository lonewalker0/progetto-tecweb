<?php
include "DBAccess.php";

class DBOperation{
    private $db;

    public function __construct(DBAccess $db) {
        $this->db = $db;
    }

    public function registerUser($username, $password) {
        try {
            $this->db->openConnection();

            $checkQuery = "SELECT COUNT(*) as count FROM users WHERE username = ?";
            $checkStmt = mysqli_prepare($this->db->getConnection(), $checkQuery);

            if (!$checkStmt) {
                throw new Exception("Errore nella preparazione della query: " . mysqli_error($this->db->getConnection()));
            }

            mysqli_stmt_bind_param($checkStmt, "s", $username);
            mysqli_stmt_execute($checkStmt);

            $checkResult = mysqli_stmt_get_result($checkStmt);
            $rowCount = mysqli_fetch_assoc($checkResult)['count'];

            if ($rowCount > 0) {
                echo "L'utente esiste già.";
                return false;
            }

            // Hash della password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Esegui la query per inserire l'utente nel database
            $insertQuery = "INSERT INTO users (username, password) VALUES (?, ?)";
            $insertStmt = mysqli_prepare($this->db->getConnection(), $insertQuery);

            if (!$insertStmt) {
                throw new Exception("Errore nella preparazione della query: " . mysqli_error($this->db->getConnection()));
            }

            mysqli_stmt_bind_param($insertStmt, "ss", $username, $hashedPassword);
            $insertSuccess = mysqli_stmt_execute($insertStmt);

            if (!$insertSuccess) {
                throw new Exception("Errore durante l'inserimento dell'utente: " . mysqli_error($this->db->getConnection()));
            }

            echo "Registrazione utente avvenuta con successo!";
            return true;


        } catch (Exception $e) {
            echo "Errore durante la registrazione dell'utente: " . $e->getMessage();
        } finally {
            $this->db->closeConnection();
        }
    }

    public function loginUser($username, $password) {
        try {
            $this->db->openConnection();

            // Esegui la query per ottenere l'hash della password dell'utente
            $query = "SELECT password FROM users WHERE username = ?";
            $stmt = mysqli_prepare($this->db->getConnection(), $query);

            if (!$stmt) {
                throw new Exception("Errore nella preparazione della query: " . mysqli_error($this->db->getConnection()));
            }

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($result->num_rows === 0) {
                echo "L'utente non esiste.";
                return false;
            }

            $row = mysqli_fetch_assoc($result);
            $storedHashedPassword = $row['password'];

            if (password_verify($password, $storedHashedPassword)) {
                echo "Login avvenuto con successo!";
                return true;
            } else {
                echo "Password inserita non corretta.";
                return false;
            }

        } catch (Exception $e) {
            // Registra l'errore nei log del server
            error_log("Errore durante il login: " . $e->getMessage());

            // Restituisci un messaggio di errore generico all'utente
            echo "Si è verificato un errore durante il login. Riprova più tardi.";
            return false;

        } finally {
            $this->db->closeConnection();
        }
    }
}






?>