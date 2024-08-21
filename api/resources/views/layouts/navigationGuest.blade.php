<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('producto.indexUser')" :active="request()->routeIs('producto.indexUser')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                </div>
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('login')" :active="request()->routeIs('pedido.indexUser')">
                    {{ __('Mis Pedidos') }}
                </x-nav-link>
            </div>
        </div>

            <!-- Settings Dropdown -->
            
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="inline-flex items-center px-3 py-2  border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Iniciar sesión') }}
                    </x-nav-link>
                 </div>
                 <div class="inline-flex items-center px-3 py-2  border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500">
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Registrarse') }}
                    </x-nav-link>
                 </div>


            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->


            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
</nav>