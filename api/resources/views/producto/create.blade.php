
    <div class="container">
        <h1>Agregar Nuevo Producto</h1>

        <form action="{{ route('producto.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="codigo">Código del Producto:</label>
                <input type="text" name="codigo" id="codigo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" name="precio" id="precio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>
    </div>
