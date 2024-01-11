<?php

namespace App\Interface;

interface EntityInterface
{
    /**
     * Get the value of id
     * @return  ?integer
     */
    public function getId(): ?int;
    
    /**
     * Set the value of id
     * @param integer $id
     * @return  self
     */
    public function setId(int $id): self;
}
