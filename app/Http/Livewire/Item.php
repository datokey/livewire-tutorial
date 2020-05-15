<?php

namespace App\Http\Livewire;

use App\Item as AppItem;
use Livewire\Component;
use Livewire\WithPagination;
class Item extends Component
{
    use WithPagination;
    
    protected $listeners =[
        'itemStored' => 'handleStored',
        'itemUpdate' => 'handelUpdate'
    ];
    public $statusUpdate = false;
    public $data;
    
    public function render()
    {
        //$this->data =AppItem::latest()->get(); 
        return view('livewire.item',[
            'item'=>AppItem::latest()->paginate(5),
        ]);
    }

    public function getItem($id)
    {
        $this ->statusUpdate = true;
        $item = AppItem::find($id);
        $this->emit('getItem',$item);
    }

    public function destroy($id)
    {
        if($id){
            $item = AppItem::find($id);
            $item->delete();
            session()->flash('message', 'Item telah dihapus');
        }
    }

    public function handleStored($Item)
    {
       session()->flash('message',$Item['name'].' Telah diinputkan');
    }
    
    public function handelUpdate($Item)
    {
       session()->flash('message',$Item['name'].' Telah diupdate');
    }
}
