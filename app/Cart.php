<?php

namespace App;

use Session;

class Cart
{
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
    	if ($oldCart) {
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }
    // Add product to shopping cart
    public function add($item, $id) {
        $itemPrice = $item->product_price;
        // Calculate discounted price
        if ($item->product_discount_percentage !== null) {
            $itemPrice = $itemPrice - ($itemPrice * ($item->product_discount_percentage/100));
        }
    	$storedItem = ['qty' => 0, 'price' => $itemPrice, 'item' => $item];
    	if ($this->items) {
    		if (array_key_exists($id, $this->items)) {
    			$storedItem = $this->items[$id];
    		}
    	}
    	$storedItem['qty']++;
    	$storedItem['price'] = $itemPrice * $storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	$this->totalQty++;
    	$this->totalPrice += $itemPrice;
    }
    // Remove item from cart
    public function remove($item, $id, $removeAll) {
        $itemPrice = $item->product_price;
        // Calculate discounted price
        if ($item->product_discount_percentage !== null) {
            $itemPrice = $itemPrice - ($itemPrice * ($item->product_discount_percentage/100));
        }
        $storedItem = ['qty' => $this->items[$id]['qty'], 'price' => $this->items[$id]['price'], 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $item = $this->items[$id];
            }
        }
        // Removing all or one from cart
        if ($removeAll === true) {
            $itemPrice = $itemPrice * $storedItem['qty'];

            $this->totalQty -= $storedItem['qty'];
            $this->totalPrice -= $itemPrice;
            unset($this->items[$id]);
        }
        else {
            $storedItem['qty']--;
            $storedItem['price'] = $itemPrice * $storedItem['qty'];
            $this->items[$id] = $storedItem;
            $this->totalQty--;
            $this->totalPrice -= $itemPrice;

            if ($storedItem['qty'] <= 0) {
                unset($this->items[$id]);
            }
        }
    }
}
