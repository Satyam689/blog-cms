<?php

class User {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Checks if a user with the given username and password exists in the database.
     * @param string $username
     * @param string $password
     * @return bool
     * @throws PDOException
     */
    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && $password === $user['password']) {
            return true;
        }
        return false;
    }

    /**
     * Creates a new user in the database.
     * @param string $username
     * @param string $password
     * @param int $permission
     * @return int
     * @throws PDOException
     */
    public function createUser($username, $password, $permission) {
        $query = "INSERT INTO users (username, password, permission) VALUES (:username, :password, :permission)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['username' => $username, 'password' => $password, 'permission' => $permission]);
        return $this->db->lastInsertId();
    }

    /**
     * Deletes a user from the database.
     * @param int $id
     * @return int
     * @throws PDOException
     */
    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }

    /**
     * Updates a user in the database.
     * @param int $id
     * @param int $permission
     * @return int
     * @throws PDOException
     */
    public function updateUser($id, $permission) {
        $query = "UPDATE users SET permission = :permission WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['permission' => $permission, 'id' => $id]);
        return $stmt->rowCount();
    }


}
