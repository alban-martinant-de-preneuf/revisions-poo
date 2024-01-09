<?php

include_once 'Product.php';

class Clothing extends Product
{
    /**
     * constructor
     * @param ?integer $id
     * @param ?string $name
     * @param ?array $photos
     * @param ?integer $price
     * @param ?string $description
     * @param ?integer $quantity
     * @param ?DateTime $createdAt
     * @param ?DateTime $updatedAt
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
        ?DateTime $createdAt,
        ?DateTime $updatedAt,
        ?int $categoryId,
        private ?string $size,
        private ?string $color,
        private ?string $type,
        private ?int $material_fee
    )
    {
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
}
