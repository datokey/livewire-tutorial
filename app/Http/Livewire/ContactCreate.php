<?php

namespace App\Http\Livewire;

use App\Item;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name;
    public $phone;
    

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store()
    {
        $this->validate([
            'name'=> 'required|min:3',
            'phone'=> 'required|max:15'
        ]);

        $Item = Item::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);
        $this->resetInput();
        $this->emit('itemStored',$Item);
      

    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}
