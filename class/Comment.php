<?php

class Comment
{
	protected $id;
	protected $body;
	protected $createdAt;
	protected $newsId;

	/**
	 * @param int $id
	 * @return Comment
	 */
	public function setId(int $id): Comment
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @param string $body
	 * @return Comment
	 */
	public function setBody(string $body): Comment
	{
		$this->body = $body;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getBody(): ?string
	{
		return $this->body;
	}

	/**
	 * @param string $createdAt
	 * @return Comment
	 */
	public function setCreatedAt(string $createdAt): Comment
	{
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getCreatedAt(): ?string
	{
		return $this->createdAt;
	}

	/**
	 * @return int|null
	 */
	public function getNewsId(): ?int
	{
		return $this->newsId;
	}

	/**
	 * @param int $newsId
	 * @return Comment
	 */
	public function setNewsId(int $newsId): Comment
	{
		$this->newsId = $newsId;
		return $this;
	}
}

/*
	Summary of Changes:

	1.	Added PHPDoc comments to each method to describe parameters, return types, and purpose.
	2. 	Used type hinting in method signatures (int, string, ?int, ?string) to specify expected
		parameter and return types, improving code clarity and reliability.
	3. 	Maintained the basic structure and functionality of the Comment class without altering
		its core purpose.
*/
