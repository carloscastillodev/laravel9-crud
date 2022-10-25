@extends('layouts.app') 

@section('content') 
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card border-0 mt-4 mb-4 shadow">
                <div class="card-header text-secondary">
                    <strong>Ver producto {{ $product->id }}</strong>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-12">
                            <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ $product->name }}" disabled>
                        </div>
                        <div class="col-12">
                            <textarea name="description" class="form-control" placeholder="Descripción" disabled>{{ $product->description }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="quantity_per_unit" class="form-control" placeholder="Unidad de medida" value="{{ $product->quantity_per_unit }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="unit_price" class="form-control" placeholder="Precio unitario" value="{{ $product->unit_price }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="units_in_stock" class="form-control" placeholder="Existencias" value="{{ $product->units_in_stock }}" disabled>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-primary" href="{{ route('product.index') }}">Regresar</a>
                        </div>
                    </form>
                </div> 
            </div>
        </div>     
    </div>
</div> 
@endsection
