<x-appAdmin-layout>
    <div class="note-container py-12">
        <div class="notes">
            <table>
                <th>ID</th>
                <th>ID cliente</th>
                <th>Cliente</th>
                <th>Pago</th>
                <th>Estado</th>
            @foreach ($pedidos as $pedido)
                <tr>
                    <div class="pedido">


                           <th>{{ $pedido-> id }}</th>
                           <td>{{ $pedido-> clientes -> name }}</td>
                           <td>{{ $pedido-> cliente }}</td>
                           <th>{{ $pedido-> id_p }}</th> 
                           <th>
                            @if ($pedido -> id_e === 1)
                                Pendiente
                            @elseif ($pedido -> id_e === 2)
                                Entregado
                            @elseif ($pedido -> id_e === 3)
                                Confirmado
                            @elseif ($pedido -> id_e === 4)
                                Entregado
                            @endif
                        </th>
                        @if ($pedido -> id_e !=2)
                           
                        <form action="{{ route('pedido.destroy', $pedido -> id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                       <th>
                            <button class="pedido-delete-button">Anular pedido</button>
                       </th>
                       </form>
                    @endif
                       <th><a href="{{ route('pedido.show', $pedido -> id) }}" class="note-edit-button">Detalles</a></th>
                        <th>
                            @if ($pedido -> id_e != 2)
                                <a href="{{ route('entrega.add', $pedido -> id) }}" class="pedido-edit-button">Entregar</a>
                            @endif
                        </th>
                        </div>
                    </div>    
                </tr>

            </div>
            @endforeach
        </table>
        </div>
    </div>
</x-appAdmin-layout>


