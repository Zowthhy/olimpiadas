<x-appAdmin-layout>
    <h1 class="text-3x1 py-4">Cliente: {{ $cliente -> created_at}}</h1>
    <div class="cliente-buttons">
        <form action="{{ route('cliente.destroy', $cliente -> id) }}" method="POST">
            @csrf
            @method('DELETE')
                <button class="cliente-delete-button">Eliminar</button>
           </form>
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
    </div>
    <br>
<div class="cliente">
    <div class="cliente-body">
       ID De usuario: {{ $cliente -> id }}<br>
       Nombre: {{ $cliente -> name }}<br>
       Email: {{ $cliente -> email }}
    </div>
</div>
<br>
<div class="compras">  <!-- Mostrar todos los resultados de la tabla ventas que tengan la ID del usuario en vista -->
    Compras realizadas:
</div>
  
</x-appAdmin-layout>