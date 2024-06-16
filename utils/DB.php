<?php

class DB
{
	private $pdo;
	private static $instance = null;

	// Private constructor to prevent direct instantiation
	private function __construct()
	{
		$dsn = 'mysql:dbname=phptest;host=127.0.0.1';
		$user = 'root';
		$password = 'root';

		try {
			// Initialize PDO connection
			$this->pdo = new \PDO($dsn, $user, $password);
			// Set PDO to throw exceptions on errors
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch (\PDOException $e) {
			// Handle connection errors gracefully
			die('Connection failed: ' . $e->getMessage());
		}
	}

	// Get the singleton instance of DB
	public static function getInstance(): DB
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	// Execute a SELECT query and return all rows
	public function select(string $sql): array
	{
		$sth = $this->pdo->query($sql);
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}

	// Execute a non-query SQL statement (INSERT, UPDATE, DELETE)
	public function exec(string $sql, array $params = []): int
	{
		$sth = $this->pdo->prepare($sql);
		$sth->execute($params);
		return $sth->rowCount();
	}

	// Get the last inserted ID
	public function lastInsertId(): string
	{
		return $this->pdo->lastInsertId();
	}
}

/*
Optimization Summary:
1. 	Singleton Pattern: Implemented the singleton pattern properly in getInstance() to ensure there's only one
	instance of DB, avoiding unnecessary multiple connections to the database.

2. 	PDO Configuration: Configured PDO to throw exceptions on errors ($this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);),
	which helps in debugging and handling database errors more effectively.

3. 	Prepared Statements: Modified the exec() method to use prepared statements and parameter binding ($sth->execute($params);).
	This approach prevents SQL injection attacks and improves performance by reusing query execution plans.

4. 	Fetch Method: Used fetch(\PDO::FETCH_ASSOC) in select() to fetch results as associative arrays, which is often more convenient
	and efficient for PHP applications.

5. 	Error Handling: Added error handling for database connection (\PDOException) in the constructor to provide better feedback and
	handle connection failures gracefully.
*/