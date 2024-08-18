
    <div class="producto-container single-producto">
        <div class="producto-header">
            <h1 class="text-3x1 py-4">producto: {{ $producto -> created_at}}</h1>
            <div class="producto-buttons">
                <a href="{{ route('producto.edit', $producto)}}" class="producto-edit-button">Edit</a>
                <form action="{{ route('producto.destroy', $producto) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="producto-delete-button">Delete</button>
                </form>
            </div>
        </div>
        <div class="producto">
            <div class="producto-body">
                {{ $producto-> codigo }}
                {{ $producto-> precio }}
                {{ $producto-> stock }}
                {{ $producto-> descripcion }}
            </div>
        </div>
    </div>
