<?php

namespace ShoppingCart;

class Cart
{
    private array $items = [];

    public function addProduct(Product $product,int $quantity){
        foreach ($this->items as $item){
            if ($item->getProduct()->getId() === $product->getId()){


                $item->increaseQuantity($item->getQuantity() + $quantity);
            }
        }
        $cartItem = new  CartItem($product,$quantity);


    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function removeProduct(Product  $product){

    }
    public function getTotalQuantity(){

    }
    public function getTotalSum(){

    }

}