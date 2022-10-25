@extends('layouts.app') 

@section('content') 
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card border-0 mt-4 mb-4 shadow">
                <div class="card-header text-secondary">
                    <strong>Nuevo producto</strong>
                </div>
                <div class="card-body">
                    @if ( $errors->any() )
                        <div class="alert alert-danger">
                            @foreach ( $errors->all() as $error )
                            - {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('product.store') }}" method="POST" class="row g-3">
                        <div class="col-12">
                            <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                        </div>
                        <div class="col-12">
                            <textarea name="description" class="form-control" placeholder="Descripción" value="{{ old('description') }}"></textarea>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="quantity_per_unit" class="form-control" placeholder="Unidad de medida" value="{{ old('quantity_per_unit') }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="unit_price" class="form-control" placeholder="Precio unitario" value="{{ old('unit_price') }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="units_in_stock" class="form-control" placeholder="Existencias" value="{{ old('units_in_stock') }}">
                        </div>
                        <div class="col-12">
                            @csrf
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>     
    </div>
</div> 
@endsection
