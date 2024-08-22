<x-appAdmin-layout>
    <div class="">
        <a href="{{ route('producto.create') }}" class="">
            Agregar producto
        </a>
        <br>
        <br>
        <div class="">
            <table style="border: 1px solid black;">
            <tr>
                <th colspan="2"></th>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
            @foreach ($productos as $producto)
            <tr>
                <div class="">
                        <form action="{{ route('producto.destroy', $producto -> codigo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                       <th>
                            <button class="">Borrar</button>
                       </th>
                       </form>

                       <th><a href="{{ route('producto.edit', $producto -> codigo) }}" class="">Editar</a></th>
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


