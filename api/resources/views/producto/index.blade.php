
        <div class="note-container py-12">
        <a href="{{ route('producto.create') }}" class="new-producto-btn">
            Agregar producto
        </a>
        <div class="notes">
            @foreach ($productos as $producto)
            <div class="note">
                <div class="note-body">
                    {{ $producto -> descripcion }}
                </div>
                <div class="note-buttons">
                    <a href="{{ route('producto.show', $producto -> codigo) }}" class="note-edit-button">Ver</a>
                    <a href="{{ route('producto.edit', $producto -> codigo) }}" class="note-edit-button">Editar</a>
                    <form action="{{ route('producto.destroy', $producto -> codigo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="note-delete-button">Borrar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

