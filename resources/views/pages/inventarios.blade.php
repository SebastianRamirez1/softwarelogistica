@extends('layouts.app')
@section('title', 'Inventario')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Gestión de Inventario</h1>

    <!-- Formulario para agregar un nuevo producto -->
    <form id="addProductForm" class="mb-6">
        <input type="number" id="producto_id" placeholder="Id del producto" class="border p-2 rounded">
        <input type="number" id="cantidad" placeholder="cantidad" class="border p-2 rounded">
        <input type="text" id="movimiento" placeholder="Movimiento" class="border p-2 rounded">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Agregar Producto</button>
    </form>

    <!-- Lista de productos -->
    <div id="productosList" class="grid grid-cols-1 gap-4"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Función para cargar productos
        function cargarProductos() {
            fetch('/api/inventarios')
                .then(response => response.json())
                .then(data => {
                    const productosList = document.getElementById('productosList');
                    productosList.innerHTML = '';
                    data.forEach(producto => {
                        const productoElement = document.createElement('div');
                        productoElement.className = 'p-4 bg-white rounded shadow';
                        productoElement.innerHTML = `
                            <h2 class="text-xl font-bold">${producto.producto_id}</h2>
                            <p>Cantidad: ${producto.cantidad}</p>
                            <p>movimiento: ${producto.tipo_movimiento}</p>
                            <button onclick="eliminarProducto(${producto.id})" class="bg-red-500 text-white p-2 rounded mt-2">Eliminar</button>
                        `;
                        productosList.appendChild(productoElement);
                    });
                });
        }

        // Cargar productos al iniciar
        cargarProductos();

        // Agregar un nuevo producto
        document.getElementById('addProductForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const producto_id = document.getElementById('producto_id').value;
            const cantidad = document.getElementById('cantidad').value;
            const tipo_movimiento = document.getElementById('movimiento').value;

            if (producto_id && cantidad && tipo_movimiento) {
                // Crear el objeto que se enviará como JSON
                const data = {
                    producto_id: parseInt(producto_id, 10),
                    cantidad: parseInt(cantidad, 10),
                    tipo_movimiento: tipo_movimiento.trim()
                };
                // Enviar la solicitud con el fetch
                fetch('/api/inventarios', {
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
                    cargarProductos();
                    console.log('Respuesta recibida:', data);
                })
                .catch(error => {
                    console.error('Hubo un problema con la solicitud fetch:', error);
                });
            } else {
                console.error('Faltan datos para enviar el formulario.');
            }
        });

        // Eliminar producto
        window.eliminarProducto = function (id) {
            fetch(`/api/inventarios/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => cargarProductos());
        };
    });
</script>
@endsection
