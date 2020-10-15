<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bold b-3">Product List</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{$product->name}}</td>
                                    <td><img src="{{asset('storage/images/'.$product->image)}}" height="100px" width="100px" class="img-fluid" alt="Product preview"></td>
                                    <td>{{$product->qty}}</td>
                                    <td>{{$product->price}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bold b-3">Create Product</h4>
                    <form wire:submit.prevent="store">
                        <div class="form-group">
                            <label>Product Name </label>
                            <input wire:model="name" type="text" class="form-control"
                                placeholder="Please enter Product Name ">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div>
                            <label>Product Image</label>
                            <div class="custom-file">
                                <input type="file" wire:model="image" class="custom-file-input" id="customFile">
                                <label for="customFile" class="custom-file-label">Choose image...</label>
                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            @if ($image)
                                <label class="mt-2">Image Preview</label>
                                <img src="{{$image->temporaryUrl()}}" width="100%" height="100px" class="img-fluid" alt="Preview Image">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea wire:model="description" type="text" class="form-control"
                                placeholder="Please enter Description"></textarea>
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Qty </label>
                            <input wire:model="qty" type="number" class="form-control" placeholder="Please enter Qty ">
                            @error('qty')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Price </label>
                            <input wire:model="price" type="number" class="form-control"
                                placeholder="Please enter Price ">
                            @error('price')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
