
<x-app-layout>
@if (!isset($pedidos) || $pedidos->isEmpty())
    @if (request()->path() == 'historialUser')
        <p>Aún no se han realizado compras!</p>
    @else
        <p>No hay pedidos pendientes!</p>
    @endif
@else
    <div class="pedido-container py-12">
        Sus pedidos:
        <div class="pedidos">
            <table>
            <tr>
                <th>Numero de pedido</th>
                <th>metodo pago</th>
                <th>Monto total</th>
                <th>Estado</th>
            </tr>
            @foreach ($pedidos as $pedido)
            <tr>
                <div class="pedido">
                       <th>{{$pedido -> id}}</th>
                       <th>{{$pedido -> id_p}}</th>
                       <th>{{ $pedido-> precio_total}}</th>
                       <th>
                        @if ($pedido -> id_e == 2)  
                            Entregado  
                        @elseif ($pedido -> id_e == 1)
                            Pendiente
                         @endif
                    </th>
                       <th>
                            <form action="{{ route('pedido.destroyUser', $pedido) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="pedido-delete-button">Cancelar</button>
                            </form>
                       </th>
                       <th><a href="{{ route('pedido.showUser', $pedido) }}">Detalles</a></th>
                    </div>
                </div>    
            </tr>
            @endforeach
            </table>
        </div>   
@endif
</x-app-layout> 