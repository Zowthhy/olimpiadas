<x-app-layout>
    <!-- resources/views/cart/index.blade.php -->

    <h1>Carrito de Compras</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if(empty($carrito))
        <p>El carrito está vacío.</p>
    @else
        <ul>
            @foreach($carrito as $productoId => $details)
                <li>
                    {{ $details['descripcion'] }} - {{ $details['precio'] }} x {{ $details['quantity'] }}
                    <form action="{{ route('carrito.remove', $productoId) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <p>Total: {{ array_sum(array_column($carrito, 'precio')) }}</p>
        <form action="{{ route('carrito.remove', $productoId) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Eliminar</button>
        </form>
    @endif
</x-app-layout>