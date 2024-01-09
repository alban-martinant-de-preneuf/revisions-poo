<?php

include_once 'Product.php';

class Electronic extends Product
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
     * @param ?string $brand
     * @param ?int $warantly_fee
     */
    public function __construct(
        ?int $id,
        ?string $name,
        ?array $photos,
        ?int $price,
        ?string $description,
        ?int $quantity,
        ?DateTime $createdAt,
        ?DateTime $updatedAt,
        ?int $categoryId,
        private ?string $brand,
        private ?int $warantly_fee
    ) {
        parent::__construct(
            $id,
            $name,
            $photos,
            $price,
            $description,
            $quantity,
            $createdAt,
            $updatedAt,
            $categoryId
        );
        $this->brand = $brand;
        $this->warantly_fee = $warantly_fee;
    }

    /**
     * Get the brand of the product
     * @return  ?string
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * Get the warantly_fee of the product
     * @return  ?int
     */
    public function getWarantly_fee(): ?int
    {
        return $this->warantly_fee;
    }

    /**
     * Set the brand of the product
     * @param  ?string  $brand
     * @return  self
     */
    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * Set the warantly_fee of the product
     * @param  ?int  $warantly_fee
     * @return  self
     */
    public function setWarantly_fee(?int $warantly_fee): self
    {
        $this->warantly_fee = $warantly_fee;
        return $this;
    }

    /**
     * Get an Electronic by its id
     * @param integer $id
     * @return Electronic|false
     */
    public static function findById(int $id): Electronic|false
    {
        $db = DbConnect::getDb();
        $query = $db->prepare(
            'SELECT * FROM product
            JOIN electronic ON product.id = electronic.product_id
            WHERE product.id = :id'
        );
        $query->execute([':id' => $id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return false;
        }
        return new Electronic(
            $result['id'],
            $result['name'],
            json_decode($result['photos']),
            $result['price'],
            $result['description'],
            $result['quantity'],
            new DateTime($result['created_at']),
            new DateTime($result['updated_at']),
            $result['category_id'],
            $result['brand'],
            $result['warantly_fee']
        );
    }

    /**
     * Get all Electronics
     * @return Electronic[]|false
     */
    public static function findAll(): array|false
    {
        $db = DbConnect::getDb();
        $query = $db->prepare(
            'SELECT * FROM product
            JOIN electronic ON product.id = electronic.product_id'
        );
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!$results) {
            return false;
        }
        $electronics = [];
        foreach ($results as $result) {
            $electronics[] = new Electronic(
                $result['id'],
                $result['name'],
                json_decode($result['photos']),
                $result['price'],
                $result['description'],
                $result['quantity'],
                new DateTime($result['created_at']),
                new DateTime($result['updated_at']),
                $result['category_id'],
                $result['brand'],
                $result['warantly_fee']
            );
        }
        return $electronics;
    }

    /**
     * Register the Electronic in the database
     * @return Electronic|false
     */
    public function create(): Electronic|false
    {
        parent::create();
        $db = DbConnect::getDb();
        try {
            $query = $db->prepare(
                'INSERT INTO electronic (product_id, brand, warantly_fee)
                VALUES (:product_id, :brand, :warantly_fee)'
            );
            $query->execute([
                ':product_id' => $this->getId(),
                ':brand' => $this->getBrand(),
                ':warantly_fee' => $this->getWarantly_fee()
            ]);
            return $this;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Update the Electronic in the database
     * @return Electronic|false
     */
    public function update(): Electronic|false
    {
        parent::update();
        $db = DbConnect::getDb();
        try {
            $query = $db->prepare(
                'UPDATE electronic
                SET brand = :brand, warantly_fee = :warantly_fee
                WHERE product_id = :product_id'
            );
            $query->execute([
                ':brand' => $this->getBrand(),
                ':warantly_fee' => $this->getWarantly_fee(),
                ':product_id' => $this->getId()
            ]);
            return $this;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
