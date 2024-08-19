<x-app-layout>
        <div class="producto-container py-12">
            <br>
            <br>
            <div class="productos">
                <table>
                <tr>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th colspan="1"></th>
                </tr>
                @foreach ($productos as $producto)
                <tr>
                    <div class="producto">
    
                           <th>{{ $producto-> descripcion }}</th>
                           <th>{{ $producto-> precio }}</th> 
    
                           <th><form action="{{ route('carrito.add', $producto->codigo) }}" method="POST">
                            @csrf
                            <button type="submit">Añadir al Carrito</button>
                        </form></th>
                        </div>
                    </div>    
                </tr>
    
                @endforeach
                </table>
                <a href="{{ route('carrito.clear') }}" class="btn btn-danger">Vaciar Carrito</a>
            </div>
        </div>    
</x-app-layout>