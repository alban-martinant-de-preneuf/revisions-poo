<?php

class Category
{
    private int $id;
    private string $name;
    private string $description;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    /**
     * constructor
     * @param integer $id
     * @param string $name
     * @param string $description
     * @param DateTime $createdAt
     * @param DateTime $updatedAt
     */
    public function __construct(
        int $id,
        string $name,
        string $description,
        DateTime $createdAt,
        DateTime $updatedAt
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get the value of id
     * @return  integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     * @return  string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of description
     * @return  string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the value of createdAt
     * @return  DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Get the value of updatedAt
     * @return  DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of id
     * @param  integer  $id
     * @return  self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set the value of name
     * @param  string  $name
     * @return  self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the value of description
     * @param  string  $description
     * @return  self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Set the value of createdAt
     * @param  DateTime  $createdAt
     * @return  self
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Set the value of updatedAt
     * @param  DateTime  $updatedAt
     * @return  self
     */
    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
