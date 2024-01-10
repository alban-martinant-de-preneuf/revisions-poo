<?php

interface StockableInterface
{
    /**
     * Add stocks
     *
     * @param integer $stocks
     * @return self
     */
    public function addStocks(int $stocks): self;

    /**
     * Remove stocks
     *
     * @param integer $stocks
     * @return self
     */
    public function removeStocks(int $stocks): self;
}
