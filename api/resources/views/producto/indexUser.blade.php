
@if (Auth::User())
    
<x-app-layout>
            <div class="productos">

                @foreach ($productos as $producto)
                    <div class="producto">
    
                           {{ $producto-> descripcion }}
                           {{ $producto-> precio }}
    
                           <form action="{{ route('carrito.add', $producto->codigo) }}" method="POST">
                            @csrf
                            <button type="submit">Añadir al Carrito</button>
                        </form>
                    </div>  

    
                @endforeach
                </div>  
</x-app-layout>
@else
<x-guest-layout>
    <div class="productos">

        @foreach ($productos as $producto)
            <div class="producto">

                   {{ $producto-> descripcion }}
                   {{ $producto-> precio }}

                   <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <button type="submit">Añadir al Carrito</button>
                </form>
            </div>  


        @endforeach
        </div>  
</x-guest-layout>
@endif