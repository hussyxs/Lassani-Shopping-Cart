<?php

namespace App;

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
    
    public function add($item, $id, $option) {
        
        if (isset($option)) {
            $item->type_price = $option->type_price;
            $item->name = $option->type_name . ' ' . $item->name;
            
            if (!(in_array($item->category_id, array(1, 2)))) {
                $item->price = $item->price + $item->type_price;
            }
        }
        
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

        if ($this->items) {
            if(array_key_exists($id, $this->items)) {
//                if(isset($this->items[$id]['item']->type_price))
                $storedItem = $this->items[$id];
            }
        }
        
        $storedItem['qty']++;
        $storedItem['price'] = ($item->price) * $storedItem['qty'];

        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += ($item->price);
    }
    
    public function reduceByOne($id) {
        
        if (!(in_array($this->items[$id]['item']->category_id, array(1, 2)))) {
                $this->items[$id]['item']->price = $this->items[$id]['item']->price + $this->items[$id]['item']->type_price;
        }
        
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']->price;
        
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']->price;
        
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }
    
    public function increaseByOne($id) {
        
        if (!(in_array($this->items[$id]['item']->category_id, array(1, 2)))) {
                $this->items[$id]['item']->price = $this->items[$id]['item']->price + $this->items[$id]['item']->type_price;
        }
        
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']->price;
        
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']->price;
    }
    
    public function removeItem($id) {
        
        if (!(in_array($this->items[$id]['item']->category_id, array(1, 2)))) {
                $this->items[$id]['item']->price = $this->items[$id]['item']->price + $this->items[$id]['item']->type_price;
        }
        
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= ($this->items[$id]['item']->price * $this->items[$id]['qty']);
        unset($this->items[$id]);
        
    }
    
}
