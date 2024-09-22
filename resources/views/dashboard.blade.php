@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard</h1>
        <p class="text-gray-600">Bienvenido al sistema de logística de surtidores. Aquí puedes gestionar inventarios, pedidos, ubicaciones y generar informes.</p>

        <div class="mt-6 grid grid-cols-2 gap-4">
            <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold" id="total_inventarios">Total Inventarios</h2>
                <p class="text-2xl" id="total_inventarios_count">Cargando...</p>
            </div>
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold" id="total_pedidos">Pedidos Activos</h2>
                <p class="text-2xl" id="total_pedidos_count">Cargando...</p>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Función para cargar y calcular el total de inventarios
        function cargarTotalInventarios() {
            fetch('/api/inventarios')
                .then(response => response.json())
                .then(data => {
                    let total = 0;
                    data.forEach(producto => {
                        total += producto.cantidad;
                    });

                    const totalInventariosElement = document.getElementById('total_inventarios_count');
                    totalInventariosElement.textContent = total;
                })
                .catch(error => {
                    console.error('Error al cargar los inventarios:', error);
                    document.getElementById('total_inventarios_count').textContent = 'Error';
                });
        }

        // Llamar a la función al cargar la página
        cargarTotalInventarios();
        // Función para cargar y calcular el total de inventarios
        function cargarTotalPedidos() {
            fetch('/api/pedidos')
                .then(response => response.json())
                .then(data => {
                    let total = 0;
                    data.forEach(pedido => {
                        total += pedido.cantidad;
                    });

                    const totalPedidosElement = document.getElementById('total_pedidos_count');
                    totalPedidosElement.textContent = total;
                })
                .catch(error => {
                    console.error('Error al cargar los inventarios:', error);
                    document.getElementById('total_pedidos_count').textContent = 'Error';
                });
        }

        // Llamar a la función al cargar la página
        cargarTotalPedidos();
    });
    </script>
@endsection