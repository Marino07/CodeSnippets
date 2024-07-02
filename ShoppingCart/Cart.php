<?php

namespace ShoppingCart;

class Cart
{
    private array $items = [];

    public function addProduct(Product $product,int $quantity){
        $cartItem = $this->findCartItem($product->getId());
        if($cartItem === null){
            $cartItem = new  CartItem($product,0);

            $this->items[] = $cartItem;

        }

        $cartItem->increaseQuantity($quantity);
        return $cartItem;
    }
    private function findCartItem(int $productId){
        //foreach ($this->items as $item){
        //    if ($item->getProduct()->getId() === $productId) {
        //        return $item->getProduct();
        //}
        //}
        //return null;
        return $this->items[$productId] ?? null;

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
        unset($this->items[$product->getId()]);


    }
    public function getTotalQuantity(){
        $sum = 0;
        foreach ($this->items as $item){
            $sum += $item->getQuantity;
        }
        return $sum;
        }
    public function getTotalSum(){
        $totalSum = 0;
        foreach ($this->items as $item) {
            $totalSum += $item->getQuantity() * $item->getProduct()->getPrice();
        }

    }

}