<?php

namespace App;

use App\DbConnect;
use App\Interface\StockableInterface;
use App\Abstract\AbstractProduct;

class Clothing extends AbstractProduct implements StockableInterface
{
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * constructor
     * @param ?integer $id
     * @param ?string $name
     * @param ?array $photos
     * @param ?integer $price
     * @param ?string $description
     * @param ?integer $quantity
     * @param ?\DateTime $createdAt
     * @param ?\DateTime $updatedAt
     * @param ?integer $categoryId
     * @param ?string $size
     * @param ?string $color
     * @param ?string $type
     * @param ?integer $material_fee
     */
    public function __construct(
        ?int $id,
        ?string $name,
        ?array $photos,
        ?int $price,
        ?string $description,
        ?int $quantity,
        ?\DateTime $createdAt,
        ?\DateTime $updatedAt,
        ?int $categoryId,
        private ?string $size,
        private ?string $color,
        private ?string $type,
        private ?int $material_fee
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
    }

    /**
     * Get the value of size
     * @return  ?string
     */
    public function getSize(): ?string
    {
        return $this->size;
    }

    /**
     * Get the value of color
     * @return  ?string
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * Get the value of type
     * @return  ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Get the value of material_fee
     * @return  ?integer
     */
    public function getMaterialFee(): ?int
    {
        return $this->material_fee;
    }

    /**
     * Set the value of size
     * @param ?string $size
     * @return  self
     */
    public function setSize(?string $size): self
    {
        $this->size = $size;
        return $this;
    }

    /**
     * Set the value of color
     * @param ?string $color
     * @return  self
     */
    public function setColor(?string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Set the value of type
     * @param ?string $type
     * @return  self
     */
    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set the value of material_fee
     * @param ?integer $material_fee
     * @return  self
     */
    public function setMaterialFee(?int $material_fee): self
    {
        $this->material_fee = $material_fee;
        return $this;
    }

    /**
     * Get a Clothing by its id
     * @param integer $id
     * @return Clothing|false
     */
    public static function findOneById(int $id): Clothing|false
    {
        $db = DbConnect::getDb();
        $query = $db->prepare(
            'SELECT * FROM product
            INNER JOIN clothing ON product.id = clothing.product_id
            WHERE product.id = :id'
        );
        $query->execute(['id' => $id]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);
        if (!$result) {
            return false;
        }
        return new Clothing(
            $result['id'],
            $result['name'],
            json_decode($result['photos']),
            $result['price'],
            $result['description'],
            $result['quantity'],
            new \DateTime($result['created_at']),
            new \DateTime($result['updated_at']),
            $result['category_id'],
            $result['size'],
            $result['color'],
            $result['type'],
            $result['material_fee']
        );
    }

    /**
     * Get all clothings
     * @return Clothing[]|false
     */
    public static function findAll(): array|false
    {
        $db = DbConnect::getDb();
        $query = $db->prepare(
            'SELECT * FROM product
            INNER JOIN clothing ON product.id = clothing.product_id'
        );
        $query->execute();
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (!$results) {
            return false;
        }
        $clothings = [];
        foreach ($results as $result) {
            $clothings[] = new Clothing(
                $result['id'],
                $result['name'],
                json_decode($result['photos']),
                $result['price'],
                $result['description'],
                $result['quantity'],
                new \DateTime($result['created_at']),
                new \DateTime($result['updated_at']),
                $result['category_id'],
                $result['size'],
                $result['color'],
                $result['type'],
                $result['material_fee']
            );
        }
        return $clothings;
    }

    /**
     * Register a new clothing in database
     * @return Clothing|false
     */
    public function create(): Clothing|false
    {
        parent::create();
        $db = DbConnect::getDb();
        try {
            $query = $db->prepare(
                'INSERT INTO clothing (size, color, type, material_fee, product_id)
                VALUES (:size, :color, :type, :material_fee, :product_id)'
            );
            $query->execute([
                'size' => $this->getSize(),
                'color' => $this->getColor(),
                'type' => $this->getType(),
                'material_fee' => $this->getMaterialFee(),
                'product_id' => $this->getId()
            ]);
            return $this;
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Update a clothing in database
     * @return Clothing|false
     */
    public function update(): Clothing|false
    {
        parent::update();
        $db = DbConnect::getDb();
        try {
            $query = $db->prepare(
                'UPDATE clothing
                SET size = :size, color = :color, type = :type, material_fee = :material_fee
                WHERE product_id = :product_id'
            );
            $query->execute([
                'size' => $this->getSize(),
                'color' => $this->getColor(),
                'type' => $this->getType(),
                'material_fee' => $this->getMaterialFee(),
                'product_id' => $this->getId()
            ]);
            return $this;
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Add stocks in database
     * @return Clothing
     */
    public function addStocks(int $quantity): Clothing
    {
        parent::setQuantity(parent::getQuantity() + $quantity);
        parent::update();
        return $this;
    }

    /**
     * Remove stocks in database
     * @return Clothing
     */
    public function removeStocks(int $quantity): Clothing
    {
        parent::setQuantity(parent::getQuantity() - $quantity);
        parent::update();
        return $this;
    }

    /**
     * Check if a clothing exists in the database
     * @return  bool
     */
    public function isExists(): bool
    {
        $db = DbConnect::getDb();
        $query = $db->prepare('SELECT COUNT(*) FROM clothing WHERE product_id = :id');
        $query->execute(['id' => parent::getId()]);
        return (bool) $query->fetchColumn() && parent::isExists();
    }

    /**
     * Create or update a clothing in the database
     * @return Clothing|false
     */
    public function save(): Clothing|false
    {
        if ($this->isExists()) {
            return $this->update();
        }
        return $this->create();
    }
}
