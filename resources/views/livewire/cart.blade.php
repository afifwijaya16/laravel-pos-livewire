<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>Product List</h4>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{asset('storage/images/'.$product->image)}}" height="100px" width="100px" class="card-img-top" alt="Product preview">
                                    
                                    <div class="card-body">
                                        <h6 class="text-center font-weight-bold">{{$product->name}}</h6>
                                        <button wire:click="addItem({{$product->id}})" class="btn btn-primary btn-sm btn-block">Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Cart</h4>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th width="30%">Qty</th>
                                <th>Price</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cartData as $index => $cart)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$cart['name']}}</td>
                                <td>
                                    <button wire:click="addedItem('{{$cart['rowId']}}')" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                                    {{$cart['qty']}}
                                    <button wire:click="decreseItem('{{$cart['rowId']}}')" class="btn btn-warning btn-sm"><i class="fa fa-minus"></i></button></td>
                                <td>{{$cart['price']}}</td>
                                <td> <button wire:click="removeItem('{{$cart['rowId']}}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"><h6 class="text-center">Empty</h6></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bold">Cart Summary</h4>
                    <h6 class="font-weight-bold">Sub Total: {{$summary['sub_total']}}</h6>
                    <h6 class="font-weight-bold">Tax: {{$summary['pajak']}}</h6>
                    <h6 class="font-weight-bold">Total: {{$summary['total']}}</h6>
                    <div>
                        <button wire:click="enableTax" class="btn btn-info btn-block">Add Tax</button>
                        <button wire:click="disabledTax" class="btn btn-danger btn-block">Remove Tax</button>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-success btn-block active">Save Transaction</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
