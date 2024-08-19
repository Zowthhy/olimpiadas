<x-appAdmin-layout>
    <div class="note-container py-12">
        <div class="notes">
            <table>
                <th colspan="3"></th>
                <th>Id</th>
                <th>Cliente</th>
                <th>Pago</th>
                <th>Estado</th>
            @foreach ($pedidos as $pedido)
                <tr>
                    <div class="pedido">
                            <form action="{{ route('pedido.destroy', $pedido -> id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                           <th>
                                <button class="pedido-delete-button">Anular pedido</button>
                           </th>
                           </form>

                           <th><a href="{{ route('pedido.show', $pedido -> id) }}" class="note-edit-button">Ver</a></th>
                           <th><a href="{{ route('pedido.edit', $pedido -> id) }}" class="pedido-edit-button">Editar</a></th>

                           <th>{{ $pedido-> id }}</th>
                           <th>{{ $pedido-> cliente_id -> name }}</th>
                           <th>{{ $pedido-> id_p }}</th> 
                           <th>
                            @if ($pedido -> id_e === 1)
                                Pendiente
                            @else
                                Entregado
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


