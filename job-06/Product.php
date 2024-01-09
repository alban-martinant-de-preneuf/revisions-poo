<?php

include_once 'Category.php';

class Product
{
    /**
     * constructor
     * @param ?integer $id
     * @param ?string $name
     * @param ?string[] $photos
     * @param ?integer $price
     * @param ?string $description
     * @param ?integer $quantity
     * @param ?DateTime $createdAt
     * @param ?DateTime $updatedAt
     * @param ?integer $categoryId
     */
    public function __construct(
        private ?int $id = null,
        private ?string $name = null,
        private ?array $photos = null,
        private ?int $price = null,
        private ?string $description = null,
        private ?int $quantity = null,
        private ?DateTime $createdAt = null,
        private ?DateTime $updatedAt = null,
        private ?int $categoryId = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->categoryId = $categoryId;
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
     * Get the value of photos
     * @return  array
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    /**
     * Get the value of price
     * @return  integer
     */
    public function getPrice(): int
    {
        return $this->price;
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
     * Get the value of quantity
     * @return  integer
     */
    public function getQuantity(): int
    {
        return $this->quantity;
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
     * Get the value of categoryId
     * @return  integer
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * Set the value of id
     * @param integer $id
     * @return  self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set the value of name
     * @param string $name
     * @return  self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the value of photos
     * @param array $photos
     * @return  self
     */
    public function setPhotos(array $photos): self
    {
        $this->photos = $photos;
        return $this;
    }

    /**
     * Set the value of price
     * @param integer $price
     * @return  self
     */
    public function setPrice(int $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Set the value of description
     * @param string $description
     * @return  self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Set the value of quantity
     * @param integer $quantity
     * @return  self
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Set the value of createdAt
     * @param DateTime $createdAt
     * @return  self
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Set the value of updatedAt
     * @param DateTime $updatedAt
     * @return  self
     */
    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Set the value of categoryId
     * @param integer $categoryId
     * @return  self
     */
    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * Get the category object associated with the product
     * @return  Category
     */
    public function getCategory(): Category
    {
        $db = new PDO(
            'mysql:host=localhost;dbname=draft-shop;charset=utf8',
            'root',
            ''
        );
        $query = $db->prepare('SELECT * FROM category WHERE id = :id');
        $query->execute(['id' => $this->categoryId]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return new Category(
            $result['id'],
            $result['name'],
            $result['description'],
            new DateTime($result['created_at']),
            new DateTime($result['updated_at'])
        );
    }
}