<div>
    <div>
        <h3>Update</h3>
        <form wire:submit.prevent="update">
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input wire:model="name" class="uk-input" type="text">
                </div>
                <input type="hidden" wire:model="itemId">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: phone"></span>
                    <input wire:model="phone" class="uk-input" type="text">
                </div>
            </div>
            <button class="uk-button uk-button-primary">Submit</button>
        </form>
    </div>
    
</div>
