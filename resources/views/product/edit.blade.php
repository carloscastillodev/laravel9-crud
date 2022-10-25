@extends('layouts.app') 

@section('content') 
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card border-0 mt-4 mb-4 shadow">
                <div class="card-header text-secondary">
                    <strong>Editar producto {{ $product->id }}</strong>
                </div>
                <div class="card-body">
                    @if ( $errors->any() )
                        <div class="alert alert-danger">
                            @foreach ( $errors->all() as $error )
                            - {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('product.update', $product->id) }}" method="POST" class="row g-3">
                        <div class="col-12">
                            <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ $product->name }}">
                        </div>
                        <div class="col-12">
                            <textarea name="description" class="form-control" placeholder="Descripción">{{ $product->description }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="quantity_per_unit" class="form-control" placeholder="Unidad de medida" value="{{ $product->quantity_per_unit }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="unit_price" class="form-control" placeholder="Precio unitario" value="{{ $product->unit_price }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="units_in_stock" class="form-control" placeholder="Existencias" value="{{ $product->units_in_stock }}">
                        </div>
                        <div class="col-12">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a class="btn btn-primary" href="{{ route('product.index') }}">Regresar</a>
                        </div>
                    </form>
                </div> 
            </div>
        </div>     
    </div>
</div> 
@endsection
