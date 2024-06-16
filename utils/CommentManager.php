<?php

class CommentManager
{
    private static $instance = null;
    private $db;

    // Private constructor to prevent direct instantiation
    private function __construct()
    {
        // Initialize database connection
        $this->db = DB::getInstance();
        require_once(ROOT . '/class/Comment.php');
    }

    // Get the singleton instance of CommentManager
    public static function getInstance(): CommentManager
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Fetch all comments from the database
    public function listComments(): array
    {
        $rows = $this->db->select('SELECT * FROM `comment`');
        $comments = [];

        foreach ($rows as $row) {
            $comment = new Comment();
            $comment->setId($row['id'])
                    ->setBody($row['body'])
                    ->setCreatedAt($row['created_at'])
                    ->setNewsId($row['news_id']);

            $comments[] = $comment;
        }

        return $comments;
    }

    // Add a comment for a specific news item
    public function addCommentForNews(string $body, int $newsId): int
    {
        $sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES (?, ?, ?)";
        $params = [$body, date('Y-m-d'), $newsId];
        $this->db->exec($sql, $params);

        return $this->db->lastInsertId();
    }

    // Delete a comment by its ID
    public function deleteComment(int $id): int
    {
        $sql = "DELETE FROM `comment` WHERE `id` = ?";
        $params = [$id];
        return $this->db->exec($sql, $params);
    }
}
