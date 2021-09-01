<form wire:submit.prevent="save" >
    <div class="pt-5 pl-20 pr-20"> 
        @error('photo')
        <div class="alert alert-primary " role="alert">
            A simple primary <a href="" class="alert-link">alert—check it out</a>!
        </div>
        @enderror
    </div>
    <div class="input-group pl-20 pr-20 pb-20">
        <input type="file" class="form-control" accept=".xlsx, .xls, .csv" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <button class="btn btn-outline-primary " type="submit" id="inputGroupFileAddon04">Upload</button>
    </div>

    

</form>