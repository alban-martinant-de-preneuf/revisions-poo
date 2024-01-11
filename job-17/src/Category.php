<?php

namespace App;

use App\DbConnect;

class Category
{
    /**
     * constructor
     * @param integer $id
     * @param string $name
     * @param string $description
     * @param \DateTime $createdAt
     * @param \DateTime $updatedAt
     */
    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private \DateTime $createdAt,
        private \DateTime $updatedAt
    ) {
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
     * @return  \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Get the value of updatedAt
     * @return  \DateTime
     */
    public function getUpdatedAt(): \DateTime
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
     * @param  \DateTime  $createdAt
     * @return  self
     */
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Set the value of updatedAt
     * @param  \DateTime  $updatedAt
     * @return  self
     */
    public function setUpdatedAt(\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get the products of this category
     * @return  Product[]
     */
    public function getProducts(): array
    {
        $db = DbConnect::getDb();
        $query = $db->prepare('SELECT * FROM product WHERE category_id = :id');
        $query->execute(['id' => $this->id]);
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        $products = [];
        foreach ($results as $result) {
            $products[] = new Product(
                $result['id'],
                $result['name'],
                json_decode($result['photos']),
                $result['price'],
                $result['description'],
                $result['quantity'],
                new \DateTime($result['created_at']),
                new \DateTime($result['updated_at']),
                $result['category_id']
            );
        }
        return $products;
    }
}
