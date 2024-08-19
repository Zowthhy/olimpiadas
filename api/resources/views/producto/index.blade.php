<x-appAdmin-layout>
    <div class="producto-container py-12">
        <a href="{{ route('producto.create') }}" class="new-producto-btn">
            Agregar producto
        </a>
        <br>
        <br>
        <div class="productos">
            <table>
            <tr>
                <th colspan="2"></th>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
            @foreach ($productos as $producto)
            <tr>
                <div class="producto">
                        <form action="{{ route('producto.destroy', $producto -> codigo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                       <th>
                            <button class="producto-delete-button">Borrar</button>
                       </th>
                       </form>

                       <th><a href="{{ route('producto.edit', $producto -> codigo) }}" class="producto-edit-button">Editar</a></th>
                       <th>{{ $producto-> codigo }}</th>
                       <th>{{ $producto-> descripcion }}</th>
                       <th>{{ $producto-> precio }}</th> 
                       <th>{{ $producto-> stock }}</th>
                    </div>
                </div>    
            </tr>

            @endforeach
            </table>
        </div>
    </div>    
</x-appAdmin-layout>


