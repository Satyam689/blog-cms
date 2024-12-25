<?php

class BlogPost {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Returns all posts from the database
     * @return array
     * @throws PDOException
     */
    public function getAllPosts() {
        $query = "SELECT * FROM blog_posts";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Returns a post from the database by id
     * @param int $id
     * @return array
     * @throws PDOException
     */
    public function getPostById($id) {
        $query = "SELECT * FROM blog_posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Creates a new post in the database
     * @param string $title
     * @param string $content
     * @return int
     * @throws PDOException
     */
    public function createPost($title, $content) {
        $query = "INSERT INTO blog_posts (title, content) VALUES (:title, :content)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['title' => $title, 'content' => $content]);
        return $this->db->lastInsertId();
    }

    /**
     * Updates a post in the database
     * @param int $id
     * @param string $title
     * @param string $content
     * @return int
     * @throws PDOException
     */
    public function updatePost($id, $title, $content) {
        $query = "UPDATE blog_posts SET title = :title, content = :content WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['title' => $title, 'content' => $content, 'id' => $id]);
        return $stmt->rowCount();
    }

    /**
     * Deletes a post from the database
     * @param int $id
     * @return int
     * @throws PDOException
     */
    public function deletePost($id) {
        $query = "DELETE FROM blog_posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}
