@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Gestión de Pedidos</h1>

    <!-- Formulario para agregar un nuevo pedido -->
    <form id="addPedidoForm" class="mb-6">
        <input type="text" id="producto_id" placeholder="ID del producto" class="border p-2 rounded">
        <input type="number" id="cantidad" placeholder="Cantidad" class="border p-2 rounded">
        <input type="text" id="estado" placeholder="Estado" class="border p-2 rounded">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Agregar Pedido</button>
    </form>

    <!-- Lista de pedidos -->
    <div id="pedidosList" class="grid grid-cols-1 gap-4"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Función para cargar pedidos
        function cargarPedidos() {
            fetch('/api/pedidos')
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    const pedidosList = document.getElementById('pedidosList');
                    pedidosList.innerHTML = '';
                    data.forEach(pedido => {
                        console.log(pedido)
                        const pedidoElement = document.createElement('div');
                        pedidoElement.className = 'p-4 bg-white rounded shadow';
                        pedidoElement.innerHTML = `
                            <h2 class="text-xl font-bold">Pedido #${pedido.id}</h2>
                            <p>Producto: ${pedido.producto_id}</p>
                            <p>Cantidad: ${pedido.cantidad}</p>
                            <p>Cantidad: ${pedido.estado}</p>
                            <button onclick="eliminarPedido(${pedido.id})" class="bg-red-500 text-white p-2 rounded mt-2">Eliminar</button>
                        `;
                        pedidosList.appendChild(pedidoElement);
                    });
                });
        }

        // Cargar pedidos al iniciar
        cargarPedidos();

        // Agregar un nuevo pedido
        document.getElementById('addPedidoForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Obtener los valores de los inputs
            const producto_id = document.getElementById('producto_id').value;
            const cantidad = document.getElementById('cantidad').value;
            const estado = document.getElementById('estado').value;

            // Validar los valores para asegurarse de que son válidos
            if (producto_id && cantidad && estado) {
                // Crear el objeto que se enviará como JSON
                const data = {
                    producto_id: parseInt(producto_id, 10),
                    cantidad: parseInt(cantidad, 10),
                    estado: estado.trim()
                };

                // Enviar la solicitud con el fetch
                fetch('/api/pedidos', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta de la red');
                    }
                    return response.json();
                })
                .then(data => {
                    cargarPedidos();
                    console.log('Respuesta recibida:', data);
                })
                .catch(error => {
                    console.error('Hubo un problema con la solicitud fetch:', error);
                });
            } else {
                console.error('Faltan datos para enviar el formulario.');
            }
        });


        // Eliminar pedido
        window.eliminarPedido = function (id) {
            fetch(`/api/pedidos/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => cargarPedidos());
        };
    });
</script>
@endsection
