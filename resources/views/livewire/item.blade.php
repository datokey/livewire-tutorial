<div>
    @if (session()->has('message'))
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
       <p>{{session('message')}}</p>
    </div>
    @endif

    @if ($statusUpdate)
    <livewire:item-update/>
        @else
    <livewire:contact-create/>
    @endif

    {{$item -> links()}}
    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;?>
            @foreach ($item as $i)
            <?php $no++;?>
            <tr>
                <td>{{$no}}</td>
                <td>{{$i->name}}</td>
                <td>{{$i->phone}}</td>
                <td>
                    <div class="uk-button-group">
                        <button wire:click="getItem({{$i->id}})" class="uk-button uk-button-default">Edit</button>
                        <button wire:click="destroy({{$i->id}})"  class="uk-button uk-button-danger">Delete</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
</div>
