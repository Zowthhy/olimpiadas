<x-appAdmin-layout>
    <h1 class="text-3x1 py-4">pedido: {{ $pedido -> created_at}}</h1>
    <div class="pedido-buttons">
        <a href="{{ route('pedido.edit', $pedido)}}" class="pedido-edit-button">Edit</a>
        <form action="{{ route('pedido.destroy', $pedido) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="pedido-delete-button">Delete</button>
        </form>
<div class="pedido">
    <div class="pedido-body">
        {{ $pedido-> id }}
        {{ $pedido-> cliente }}
        {{ $pedido-> id_e }}
        {{ $pedido-> id_p }}
        {{ $pedido-> precio_total }}

        Productos del pedido:
        <table>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
         @foreach ($items_pedidos as $item){
            <tr>
                <th>{{$item -> producto -> descripcion}}</th>
                <th>{{$item -> cantidad}}</th>
                <th>{{$item -> precio_parcial}}</th>
            </tr>

        }
        @endforeach 
        <tr>
            <th colspan="1"></th>
            <th>Total:</th>
            <th>{{ $pedido -> precio_total }}</th>
        </tr>
        </table>


    </div>
</div>
</div>   
</x-appAdmin-layout>