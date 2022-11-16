<?php

namespace App\Services;

class CartService
{
    /**
     *
     */
    public $items;
    /**
     *
     */
    public $totalQty = 0;
    /**
     *
     */
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items      = $oldCart->items;
            $this->totalQty   = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = [
            'qty'   => 0,
            'price' => $item->price,
            'item'  => $item,
        ];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;

        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function increaseByOne($id)
    {
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];

        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price'];
    }

    public function decreaseByOne($id)
    {
        // Get item from items based on $id
        // Increase item qty by one
        $this->items[$id]['qty']--;
        // Update item price
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        // Update totalqty
        $this->totalQty--;
        // update total price
        $this->totalPrice -= $this->items[$id]['item']['price'];
        // unset item if qty < 0
        if($this->items[$id]['qty'] < 1) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        // Get item from items based on $id
        // Update totalqty
        $this->totalQty -= $this->items[$id]['qty'];

        // update total price
        $this->totalPrice -= $this->items[$id]['qty']*$this->items[$id]['price'];
        // unset item
        unset($this->items[$id]);
    }
}
