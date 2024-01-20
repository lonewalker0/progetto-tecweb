<?php
include('DBAccess.php'); 
include('evententry.php'); 
include('bigliettientry.php');
include('merchItem.php'); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

class DBOperation{
    private $db;

    public function __construct() {
        $db = new DBAccess(); 
        $this->db = $db;
    }

    

    public function checkIfUserExists($username) {
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
    
            return (bool) mysqli_fetch_assoc($checkResult);
    
        } catch (Exception $e) {
            error_log("Error checking if user exists: " . $e->getMessage());
            return false;
        } finally {
            $this->db->closeConnection();
        }
    }

    public function checkIfEmailExists($email) {
        try {
            $this->db->openConnection();
    
            // Check if the username already exists
            $checkQuery = "SELECT 1 FROM users WHERE email = ? LIMIT 1";
            $checkStmt = mysqli_prepare($this->db->getConnection(), $checkQuery);
    
            if (!$checkStmt) {
                throw new Exception("Error preparing the query: " . mysqli_error($this->db->getConnection()));
            }
    
            mysqli_stmt_bind_param($checkStmt, "s", $email);
            mysqli_stmt_execute($checkStmt);
    
            $checkResult = mysqli_stmt_get_result($checkStmt);
    
            return (bool) mysqli_fetch_assoc($checkResult);
    
        } catch (Exception $e) {
            error_log("Error checking if email exists: " . $e->getMessage());
            return false;
        } finally {
            $this->db->closeConnection();
        }
    }

    public function registerUser($username, $password, $nome, $cognome, $datanascita, $indirizzo, $email) {
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
            $insertQuery = "INSERT INTO users (username, password, is_admin, nome, cognome, data_nascita, indirizzo, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($this->db->getConnection(), $insertQuery);
    
            if (!$insertStmt) {
                throw new Exception("Error preparing the query: " . mysqli_error($this->db->getConnection()));
            }
            $is_admin=0;
            mysqli_stmt_bind_param($insertStmt, "ssisssss", $username, $hashedPassword,$is_admin, $nome, $cognome, $datanascita, $indirizzo, $email);
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
    public function deleteUser($username) {
        try {
            $this->db->openConnection();
    
            if ($username === 'admin') {
                throw new Exception("Impossibile eliminare l'utente 'admin'.");
            }
    
            // Verifica se l'utente ha effettuato degli ordini
            $checkOrdersQuery = "SELECT COUNT(*) FROM Ordini WHERE username = ?";
            $checkOrdersStmt = mysqli_prepare($this->db->getConnection(), $checkOrdersQuery);
    
            if (!$checkOrdersStmt) {
                throw new Exception("Error preparing the query to check orders: " . mysqli_error($this->db->getConnection()));
            }
    
            mysqli_stmt_bind_param($checkOrdersStmt, "s", $username);
            mysqli_stmt_execute($checkOrdersStmt);
            mysqli_stmt_bind_result($checkOrdersStmt, $orderCount);
            mysqli_stmt_fetch($checkOrdersStmt);
    
            mysqli_stmt_close($checkOrdersStmt);
    
            // Se l'utente ha effettuato ordini, imposta a NULL nella tabella Ordini
            if ($orderCount > 0) {
                $updateOrdersQuery = "UPDATE Ordini SET username = NULL WHERE username = ?";
                $updateOrdersStmt = mysqli_prepare($this->db->getConnection(), $updateOrdersQuery);
    
                if (!$updateOrdersStmt) {
                    throw new Exception("Error preparing the query to update orders: " . mysqli_error($this->db->getConnection()));
                }
    
                mysqli_stmt_bind_param($updateOrdersStmt, "s", $username);
                $updateOrdersSuccess = mysqli_stmt_execute($updateOrdersStmt);
    
                if (!$updateOrdersSuccess) {
                    throw new Exception("Error updating orders: " . mysqli_error($this->db->getConnection()));
                }
    
                mysqli_stmt_close($updateOrdersStmt);
            }
    
            // Elimina l'utente dalla tabella users
            $deleteQuery = "DELETE FROM users WHERE username = ?";
            $deleteStmt = mysqli_prepare($this->db->getConnection(), $deleteQuery);
    
            if (!$deleteStmt) {
                throw new Exception("Error preparing the query: " . mysqli_error($this->db->getConnection()));
            }
    
            mysqli_stmt_bind_param($deleteStmt, "s", $username);
            $deleteSuccess = mysqli_stmt_execute($deleteStmt);
    
            if (!$deleteSuccess) {
                throw new Exception("Error during user deletion: " . mysqli_error($this->db->getConnection()));
            }
    
            return true;
    
        } catch (Exception $e) {
            error_log("Error during user deletion: " . $e->getMessage());
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

    $query = "SELECT * FROM Programma ORDER BY date, hour";

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

public function getMerchItems(): array
{
    $merchItems = [];

    $query = "SELECT * FROM Shop";

    try {
        $this->db->openConnection();
        $result = $this->db->executeQuery($query);
        while ($row = $result->fetch_assoc()) {
            $merchItem = new MerchItem(
                $row['id'], 
                $row['productImage'],
                $row['productName'],
                $row['productColor'],
                $row['productPrice'],
                $row['productLongDescription']
            );
            $merchItems[] = $merchItem;
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        throw $e;
    } finally {
        $this->db->closeConnection();
    }

    return $merchItems;
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
        $query = "SELECT username, nome, cognome, data_nascita, indirizzo, email FROM users WHERE username = ?";
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






public function verifyOldPassword($username, $oldPassword) :bool {
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
    

public function getBigliettiEntries(): array
{
    $bigliettiEntries = [];

    $query = "SELECT * FROM Biglietti";

    try {
        $this->db->openConnection();
        $result = $this->db->executeQuery($query);

        while ($row = $result->fetch_assoc()) {
            $bigliettoEntry = new BigliettiEntry(
                $row['id'],
                $row['validita'],
                $row['tipologia'],
                $row['prezzo']
            );
            $bigliettiEntries[] = $bigliettoEntry;
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        throw $e;
    } finally {
        $this->db->closeConnection();
    }

    return $bigliettiEntries;
}

public function getPrezzoBiglietto($id) : int {
    try {
        $this->db->openConnection();
        $id = mysqli_real_escape_string($this->db->getConnection(), $id);
        $sql = "SELECT prezzo FROM Biglietti WHERE id = ?";
        $stmt = mysqli_prepare($this->db->getConnection(), $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $prezzo);

        if (mysqli_stmt_fetch($stmt)) {
            // Restituisce il prezzo del biglietto
            return $prezzo;
        } else {
            // Biglietto non trovato
            return null;
        }

    } catch (Exception $e) {
        // Registra l'errore nei log del server
        error_log("Errore durante il recupero del prezzo: " . $e->getMessage());
        return null;

    } finally {
        $this->db->closeConnection();
    }
}



public function addOrder($username, $ticketId, $purchaseDate, $quantity, $prezzo): bool {
    try {
        $this->db->openConnection();
        $sql = "INSERT INTO Ordini (username, id_biglietto, quantita, data_acquisto, prezzo ) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->db->getConnection(), $sql);
        mysqli_stmt_bind_param($stmt, "siisd", $username, $ticketId, $quantity, $purchaseDate,$prezzo);
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

public function getUserOrders($username) {
    try {
        $this->db->openConnection();

        // Esegui una query per ottenere le informazioni sugli ordini dell'utente
        $sql = "SELECT Ordini.id AS numero_ordine, Ordini.data_acquisto, Biglietti.validita AS validita, Biglietti.tipologia as tipologia, Ordini.prezzo
                FROM Ordini
                INNER JOIN Biglietti ON Ordini.id_biglietto = Biglietti.id
                WHERE Ordini.username = ?";
        $stmt = mysqli_prepare($this->db->getConnection(), $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $numero_ordine, $data_acquisto, $validita, $tipologia, $prezzo);

        $orders = [];

        // Recupera tutti gli ordini dell'utente
        while (mysqli_stmt_fetch($stmt)) {
            $orders[] = [
                'numero_ordine' => $numero_ordine,
                'data_acquisto' => $data_acquisto,
                'validita' => $validita,
                'tipologia' => $tipologia,
                'prezzo_totale' => $prezzo
            ];
        }

        return $orders;

    } catch (Exception $e) {
        // Registra l'errore nei log del server
        error_log("Errore durante il recupero degli ordini dell'utente: " . $e->getMessage());
        return [];

    } finally {
        $this->db->closeConnection();
    }
}

}


?>