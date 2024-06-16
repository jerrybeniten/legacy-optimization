<?php

class News
{
    protected $id;
    protected $title;
    protected $body;
    protected $createdAt;

    /**
     * @param int $id
     * @return News
     */
    public function setId(int $id): News
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
     * @param string $title
     * @return News
     */
    public function setTitle(string $title): News
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $body
     * @return News
     */
    public function setBody(string $body): News
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
     * @return News
     */
    public function setCreatedAt(string $createdAt): News
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
}

/*
	Summary of Changes:

	1.	Added PHPDoc comments to each method to describe parameters, return types, and purpose.
	2. 	Used type hinting in method signatures (int, string, ?int, ?string) to specify expected
		parameter and return types, improving code clarity and reliability.
	3. 	Maintained the basic structure and functionality of the Comment class without altering
		its core purpose.
*/