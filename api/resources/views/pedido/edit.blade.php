<x-appAdmin-layout>
    <div class="producto-container single-producto">
        <h1 class="text-3x1 py-4">Edit your producto</h1>
        <form action=" {{ route('producto.update', $producto)}}" method="POST" class="producto">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="codigo">Código del Producto:</label>
                    <input type="text" name="codigo" id="codigo" class="form-control" value="{{ $producto -> codigo }}" required>
                </div>
    
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{$producto -> precio}}"  required>
                </div>
    
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ $producto -> stock }}"  required>
                </div>
    
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required>{{ $producto -> descripcion }}</textarea>
                </div>
    
            <div class="producto-buttons">
                <a href="{{ route('producto.index')}}" class="producto-cancel-button">Cancel</a>
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
            </div>
        </form>
    </div>
</x-appAdmin-layout>