<?php

namespace App\Http\Livewire;

use App\Item;
use Livewire\Component;

class ItemUpdate extends Component
{
    public $name;
    public $phone;
    public $itemId;

    protected $listeners = [
        'getItem'=> 'showItem'
    ];

    public function render()
    {
        return view('livewire.item-update');
    }

    public function showItem($Item)
    {
        $this->name = $Item['name'];
        $this->phone = $Item['phone'];
        $this->itemId = $Item['id'];
    }

    public function update()
    {
       $this->validate([
           'name'=>'required|min:3',
           'phone'=>'required|max:15'
       ]) ;

       if($this->itemId){
           $item = Item::find($this->itemId);
           $item->update([
               'name'=> $this->name,
               'phone'=>$this->phone,
           ]);

           $this->resetInput();

           $this->emit('itemUpdate',$item);
       }
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}
