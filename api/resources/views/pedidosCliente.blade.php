<x-app-layout>
    <div class="pedido-container py-12">
        Sus pedidos:
        <div class="pedidos">
            <table>
            <tr>
                <th colspan="2"></th>
                <th>metodo pago</th>
                <th>Monto total</th>
                <th>Estado</th>
            </tr>
            @foreach ($pedidos as $pedido)
            <tr>
                <div class="pedido">
                       <th>{{ $pedido-> id_p }}</th>
                       <th>{{ $pedido-> id_e }}</th>

                    </div>
                </div>    
            </tr>
            @endforeach
            </table>
        </div>
    </div>    
</x-app-layout>