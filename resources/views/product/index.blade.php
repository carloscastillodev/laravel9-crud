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
                    <form action="{{ route('product.store') }}" method="POST" class="row g-3 form-store">
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
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card border-0 mt-4 mb-4 shadow">
                <div class="card-header text-secondary">
                    <strong>Listado de productos</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col" class="text-center">Nombre</th>
                                    <th scope="col" class="text-center">Unidad de medida</th>
                                    <th scope="col" class="text-center">Precio</th>
                                    <th scope="col" class="text-center">Existencias</th>
                                    <th scope="col" class="text-center">Pedidos</th>
                                    <th scope="col" class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr id="{{ $product->id }}">
                                    <th scope="row" class="text-center">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity_per_unit }}</td>
                                    <td class="text-center">{{ $product->unit_price }}</td>
                                    <td class="text-center">{{ $product->units_in_stock }}</td>
                                    <td class="text-center">{{ $product->units_on_order }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-sm btn-warning" href="{{ route('product.show', $product->id) }}">Ver</a>
                                            &nbsp;
                                            <a class="btn btn-sm btn-success" href="{{ route('product.edit', $product->id) }}">Editar</a>
                                            &nbsp;
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="form-delete">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                {{ $products->links('pagination::bootstrap-5') }}
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')

@if ( session('created') == 'true' )
<script type="module">
    Swal.fire({
        icon: 'success',
        title: '¡El producto se grabó con éxito!',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@if ( session('deleted') == 'true' )
<script type="module">
    Swal.fire(
        '¡Eliminado!',
        'El producto se eliminó con éxito.',
        'success'
    );
</script>
@endif

<script type="module">
    $('.form-delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Está seguro?',
            text: "¡Este producto se eliminará definitivamente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: '¡No, cancelar!',
        }).then((result) => {
            if (result.isConfirmed) {
            this.submit();
            }
        })
    });
</script>
@endsection