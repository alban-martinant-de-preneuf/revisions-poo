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
}
