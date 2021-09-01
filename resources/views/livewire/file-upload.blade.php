<form wire:submit.prevent="save">
    <div class="pt-5 pl-20 pr-20">
        @if (session()->has('message'))
        <div class="alert {{$alert}}">
            {{ session('message') }}
        </div>
        @endif
    </div>
    
    <div class="input-group pl-20 pr-20 pb-20">
        <input type="file" class="form-control" accept=".xlsx, .xls, .csv" wire:model="_file" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <button class="btn btn-outline-primary " type="submit" id="inputGroupFileAddon04">Upload</button>
    </div>



</form>