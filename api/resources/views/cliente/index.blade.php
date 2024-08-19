<x-appAdmin-layout>
            <table>
                <th colspan="2"></th>
                <th>Id</th>
                <th>Nombre</th>
                <th>email</th>
                <th>tipo</th>

            @foreach ($clientes as $cliente)
                <tr>
                    <div class="cliente">
                            <form action="{{ route('cliente.destroy', $cliente -> id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                           <th>
                                <button class="cliente-delete-button">Eliminar</button>
                           </th>
                           </form>

                           <th><a href="{{ route('cliente.show', $cliente -> id)}}" class="note-edit-button">Ver</a></th>

                           <th>{{ $cliente-> id }}</th>
                           <th>{{ $cliente-> name }}</th>
                           <th>{{ $cliente-> email }}</th> 
                           <th>
                            @if ($cliente -> id_type == 2)
                                Usuario
                            @else
                                Admin
                            @endif
                           </th>
                            <th>
                                <form action="{{ route('cliente.updateIdType', $cliente)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                @if ($cliente -> id_type == 2)
                                    <button type="submit">Hacer administrador</button>
                                    </form>
                                @else
                                     <button type="submit">Hacer Usuario</button>
                                    </form>
                                @endif
                            
                            </th>
                        
                        </div>
                    </div>    
                </tr>
            @endforeach
        </table>
</x-appAdmin-layout>