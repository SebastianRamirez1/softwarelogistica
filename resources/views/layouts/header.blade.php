<header class="bg-white shadow-md">
    <nav class="container mx-auto flex items-center justify-between p-6">
        <a class="text-xl font-bold text-gray-800" href="{{ url('/') }}">Logística de Surtidores</a>
        <div>
            <ul class="flex space-x-4">
                <li><a class="text-gray-700 hover:text-gray-900" href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li><a class="text-gray-700 hover:text-gray-900" href="{{ url('/inventarios') }}">Inventarios</a></li>
                <li><a class="text-gray-700 hover:text-gray-900" href="{{ url('/pedidos') }}">Pedidos</a></li>
                <li><a class="text-gray-700 hover:text-gray-900" href="{{ url('/ubicaciones') }}">Ubicaciones</a></li>
                <li><a class="text-gray-700 hover:text-gray-900" href="{{ url('/informes') }}">Informes</a></li>
            </ul>
        </div>
    </nav>
</header>
