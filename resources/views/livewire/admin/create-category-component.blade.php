<div>
    <p class="card-description">
        <a href="#" style="float:right ;" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#addCategory">
            Add new category
        </a>
    </p>
     <!-- store modal -->
    <div class="modal right fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <form class="forms-sample" wire:submit.prevent="store">           
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="card-title" id="exampleModalLabel">Add categories </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-description">
                                    Basic form layout
                                </p>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Category name</label>
                                    <input type="text" class="form-control @error('name') is-invalid  @enderror " placeholder="Category name" wire:model.defer="name">
                                    @error('name') 
                                        <p class="text-danger">{{ $message }}</p> 
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>  
</div>
