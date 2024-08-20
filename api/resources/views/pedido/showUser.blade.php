<x-app-layout>
    <h1 class="text-3x1 py-4">pedido creado: {{ $pedido -> created_at}}</h1>
    <div class="pedido-buttons">

<div class="pedido">
    <div class="pedido-body">
        {{ $pedido-> id }}
        {{ $pedido-> cliente }}
        {{ $pedido-> id_e }}
        {{ $pedido-> id_p }}

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
</x-app-layout>