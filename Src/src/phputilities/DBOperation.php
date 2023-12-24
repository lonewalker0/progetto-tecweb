<?php
include('DBAccess.php'); 
include('evententry.php'); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

class DBOperation{
    private $db;

    public function __construct() {
        $db = new DBAccess(); 
        $this->db = $db;
    }

    public static function sanitizeInput($input, $maxLength = 255) : string
    {
        
        $input = substr($input, 0, $maxLength);

        //togli gli spazi bianchi 
        $input = trim($input);

        //per attacchi di tipo xss, hihihi
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        $input = str_replace(['"', "'", "<", ">", ";", "\\"], "", $input);

        $input = preg_replace('/\s/', '', $input);
 

        return $input;
    }

    public function registerUser($username, $password, $nome, $cognome, $eta, $indirizzo, $email) {
        try {
            $this->db->openConnection();
    
            // Check if the username already exists
            $checkQuery = "SELECT 1 FROM users WHERE username = ? LIMIT 1";
            $checkStmt = mysqli_prepare($this->db->getConnection(), $checkQuery);
    
            if (!$checkStmt) {
                throw new Exception("Error preparing the query: " . mysqli_error($this->db->getConnection()));
            }
    
            mysqli_stmt_bind_param($checkStmt, "s", $username);
            mysqli_stmt_execute($checkStmt);
    
            $checkResult = mysqli_stmt_get_result($checkStmt);
    
            if (mysqli_fetch_assoc($checkResult)) {
                return false; // Username already exists
            }
    
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            // Insert the user into the database with is_admin set to false
            $insertQuery = "INSERT INTO users (username, password, is_admin, nome, cognome, eta, indirizzo, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($this->db->getConnection(), $insertQuery);
    
            if (!$insertStmt) {
                throw new Exception("Error preparing the query: " . mysqli_error($this->db->getConnection()));
            }
            $is_admin=0;
            mysqli_stmt_bind_param($insertStmt, "ssississ", $username, $hashedPassword,$is_admin, $nome, $cognome, $eta, $indirizzo, $email);
            $insertSuccess = mysqli_stmt_execute($insertStmt);
    
            if (!$insertSuccess) {
                throw new Exception("Error during user insertion: " . mysqli_error($this->db->getConnection()));
            }
    
            return true; // User successfully registered
    
        } catch (Exception $e) {
            error_log("Error during user registration: " . $e->getMessage());
            return false;
        } finally {
            $this->db->closeConnection();
        }
    }
    

    public function loginUser($username, $password): bool {
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
                
                return false;
            }

            $row = mysqli_fetch_assoc($result);
            $storedHashedPassword = $row['password'];

            if (password_verify($password, $storedHashedPassword)) {
                return true;
            } else {
                return false;
            }

        } catch (Exception $e) {
            // Registra l'errore nei log del server
            error_log("Errore durante il login: " . $e->getMessage());

            return false;

        } finally {
            $this->db->closeConnection();
        }
    }


    public function isAdmin($username): bool {
        try {
            $this->db->openConnection();
            // Execute a query to check if the user is an admin
            $query = "SELECT is_admin FROM users WHERE username = ?";
            $stmt = mysqli_prepare($this->db->getConnection(), $query);
            if (!$stmt) {
                throw new Exception("Error preparing the query: " . mysqli_error($this->db->getConnection()));
            }
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows === 0) {
                return false; // User not found
            }
            $row = mysqli_fetch_assoc($result);
            $isAdmin = $row['is_admin'];
            return (bool) $isAdmin;
        } catch (Exception $e) {
            error_log("Error checking if user is admin: " . $e->getMessage());
            return false;
        } finally {
            $this->db->closeConnection();
        }
    }
    
    public function getEventEntries(): array
{
    $eventEntries = [];

    $query = "SELECT * FROM Programma";

    try {
        $this->db->openConnection();
        $result = $this->db->executeQuery($query);
        while ($row = $result->fetch_assoc()) {
            $event = new EventEntry(
                $row['artist_name'],
                $row['image_path'],
                $row['date'],
                $row['hour'],
                $row['description']
            );
            $eventEntries[] = $event;}
    } catch (Exception $e) {
        error_log($e->getMessage());
        throw $e;
    } finally {
        $this->db->closeConnection(); 
    }

    return $eventEntries;
}

    public function deleteEvent($artistName): bool {
        try {
            $this->db->openConnection();
            $sql = "DELETE FROM Programma WHERE artist_name = ?";
            $stmt = mysqli_prepare($this->db->getConnection(), $sql);
            mysqli_stmt_bind_param($stmt, "s", $artistName);
            mysqli_stmt_execute($stmt);

        
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                return true;
            } else {
                return false; 

            }
        } catch (Exception $e) {
                // Registra l'errore nei log del server
                error_log("Errore durante l'eliminazione: " . $e->getMessage());

                return false;

        } finally {
                $this->db->closeConnection();
            }
    }      

public function addEvent($artistName, $date, $hour, $imagePath, $description): bool {
    try {
        $this->db->openConnection();
        $sql = "INSERT INTO Programma (artist_name, date, hour, image_path, description) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->db->getConnection(), $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $artistName, $date, $hour, $imagePath, $description);
        mysqli_stmt_execute($stmt);

        $success = mysqli_stmt_affected_rows($stmt) > 0;

        return $success;

    } catch (Exception $e) {
            // Registra l'errore nei log del server
            error_log("Errore durante l'inserimento:  " . $e->getMessage());
        return false;

    } finally {
            $this->db->closeConnection();
        }
}  

public function getUserInfo($username) {
    try {
        $this->db->openConnection();

        // Esegui la query per ottenere le informazioni dell'utente
        $query = "SELECT username, nome, cognome, eta, indirizzo, email FROM users WHERE username = ?";
        $stmt = mysqli_prepare($this->db->getConnection(), $query);

        if (!$stmt) {
            throw new Exception("Errore nella preparazione della query: " . mysqli_error($this->db->getConnection()));
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows === 0) {
            return false;
        }

        $userInfo = mysqli_fetch_assoc($result);

        return $userInfo;

    } catch (Exception $e) {
        // Registra l'errore nei log del server
        error_log("Errore durante il recupero delle informazioni dell'utente: " . $e->getMessage());

        return false;

    } finally {
        $this->db->closeConnection();
    }
}

public function updateEmail($username, $newEmail) {
    try {
        $this->db->openConnection();

        // Esegui la query per aggiornare l'email dell'utente
        $query = "UPDATE users SET email = ? WHERE username = ?";
        $stmt = mysqli_prepare($this->db->getConnection(), $query);

        if (!$stmt) {
            throw new Exception("Errore nella preparazione della query: " . mysqli_error($this->db->getConnection()));
        }

        mysqli_stmt_bind_param($stmt, "ss", $newEmail, $username);
        $success = mysqli_stmt_execute($stmt);

        if (!$success) {
            throw new Exception("Errore durante l'aggiornamento dell'email: " . mysqli_error($this->db->getConnection()));
        }

        return $success;

    } catch (Exception $e) {
        // Registra l'errore nei log del server
        error_log("Errore durante l'aggiornamento dell'email: " . $e->getMessage());

        return false;

    } finally {
        $this->db->closeConnection();
    }
}

public function updateIndirizzo($username, $newAddress) {
    try {
        $this->db->openConnection();

        // Esegui la query per aggiornare l'email dell'utente
        $query = "UPDATE users SET indirizzo = ? WHERE username = ?";
        $stmt = mysqli_prepare($this->db->getConnection(), $query);

        if (!$stmt) {
            throw new Exception("Errore nella preparazione della query: " . mysqli_error($this->db->getConnection()));
        }

        mysqli_stmt_bind_param($stmt, "ss", $newAddress, $username);
        $success = mysqli_stmt_execute($stmt);

        if (!$success) {
            throw new Exception("Errore durante l'aggiornamento dell'email: " . mysqli_error($this->db->getConnection()));
        }

        return $success;

    } catch (Exception $e) {
        // Registra l'errore nei log del server
        error_log("Errore durante l'aggiornamento dell'email: " . $e->getMessage());

        return false;

    } finally {
        $this->db->closeConnection();
    }
}






public function verifyOldPassword($username, $oldPassword) {
    try {
        $this->db->openConnection();
        // Esegui la query per ottenere la password corrente dell'utente
        $query = "SELECT password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($this->db->getConnection(), $query);

        if (!$stmt) {
            throw new Exception("Errore nella preparazione della query: " . mysqli_error($this->db->getConnection()));
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows === 0) {
            throw new Exception("Utente non trovato.");
        }

        $row = mysqli_fetch_assoc($result);
        $currentPassword = $row['password'];

        // Verifica se la vecchia password è corretta
        if (!password_verify($oldPassword, $currentPassword)) {
            return false;
        }

        return true;

    } catch (Exception $e) {
        // Registra l'errore nei log del server
        error_log("Errore durante la verifica della vecchia password: " . $e->getMessage());

        return false;

    } finally {
        $this->db->closeConnection();
    }
}

public function updatePassword($username, $newPassword) {
    try {
        $this->db->openConnection();

        // Genera l'hash della nuova password
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Esegui la query per aggiornare la password dell'utente
        $query = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = mysqli_prepare($this->db->getConnection(), $query);

        if (!$stmt) {
            throw new Exception("Errore nella preparazione della query: " . mysqli_error($this->db->getConnection()));
        }

        mysqli_stmt_bind_param($stmt, "ss", $hashedNewPassword, $username);
        $success = mysqli_stmt_execute($stmt);

        if (!$success) {
            throw new Exception("Errore durante l'aggiornamento della password: " . mysqli_error($this->db->getConnection()));
        }

        return $success;

    } catch (Exception $e) {
        // Registra l'errore nei log del server
        error_log("Errore durante l'aggiornamento della password: " . $e->getMessage());

        return false;

    } finally {
        $this->db->closeConnection();
    }
}
public function isArtistNameExists($artistName) {
    try {
        $this->db->openConnection();
        $query = "SELECT COUNT(*) FROM Programma WHERE artist_name = ?";
        $stmt = mysqli_prepare($this->db->getConnection(), $query);

        if (!$stmt) {
            throw new Exception("Errore nella preparazione della query: " . mysqli_error($this->db->getConnection()));
        }

        mysqli_stmt_bind_param($stmt, "s", $artistName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $count);
        mysqli_stmt_fetch($stmt);
        

        return $count > 0; #ritorna 1 solo se c'è un una corrispondenza

    } catch (Exception $e) {
        // Registra l'errore nei log del server
        error_log("Errore durante il controllo dell'esistenza del nome dell'artista: " . $e->getMessage());

        return false;

    } finally {
        $this->db->closeConnection();
    }
}
    






}


?>