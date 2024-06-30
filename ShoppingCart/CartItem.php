<?php

namespace ShoppingCart;

class CartItem
{
    private Product $product;
    private int $quantity;

    /**
     * @param Product $product
     * @param int $quantity
     */
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }


    public function increaseQuantity($amount = 1)
    {
        if ($this->getQuantity() + $amount > $this->getProduct()->getAvailableQuantity()) {
            throw new \Exception('Quantity is far from normal');

        }
        $this->quantity += $amount;

    }

    public function decreaseQuantity($amount = 1)
    {
        if ($this->getQuantity() - $amount < 1) {
            throw new \Exception('Quantity is far less from normal');

        }
        $this->quantity -= $amount;
    }
}
