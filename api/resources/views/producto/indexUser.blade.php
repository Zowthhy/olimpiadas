
@if (Auth::User())
    
<x-app-layout>

        <div class="productos-categorias">
            <div class="categorias">
                <h1>Categorias</h1>
            </div>
            <div class="productos">
                @foreach ($productos as $producto)
                    <div class="producto">
    
                           {{ $producto-> descripcion }}<br>
                           {{ $producto-> precio }}$
    
                           @if ($producto -> stock > 0)
                           <form action="{{ route('carrito.add', $producto->codigo) }}" method="POST">
                            @csrf
                            <button type="submit">Añadir al Carrito</button>
                        </form>
                            @else
                                <p>Fuera de stock</p>
                            @endif
                    </div>  
                @endforeach
            </div>  
        </div>

</x-app-layout>
@else
<x-guest-layout>
    <div class="productos">

        @foreach ($productos as $producto)
            <div class="producto">

                   {{ $producto-> descripcion }}
                   {{ $producto-> precio }}

                   <form action="{{ route('login') }}" method="GET">
                    @csrf
                    <button type="submit">Añadir al Carrito</button>
                </form>
            </div>  


        @endforeach
        </div>  

</x-guest-layout>
@endif