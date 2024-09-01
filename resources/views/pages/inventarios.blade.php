@extends('layouts.app')
@section('title', 'Inventario')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Gestión de Inventario</h1>

    <!-- Formulario para agregar/actualizar un producto -->
    <form id="productForm" class="mb-6">
        <input type="hidden" id="producto_id_hidden">
        <input type="number" id="producto_id" placeholder="Id del producto" class="border p-2 rounded">
        <input type="number" id="cantidad" placeholder="Cantidad" class="border p-2 rounded">
        <input type="text" id="movimiento" placeholder="Movimiento" class="border p-2 rounded">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Guardar Producto</button>
    </form>

    <!-- Lista de productos -->
    <div id="productosList" class="grid grid-cols-1 gap-4"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let isUpdating = false; // Flag para saber si estamos actualizando un producto

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
                            <p>Movimiento: ${producto.tipo_movimiento}</p>
                            <button onclick="editarProducto(${producto.id})" class="bg-yellow-500 text-white p-2 rounded mt-2">Editar</button>
                            <button onclick="eliminarProducto(${producto.id})" class="bg-red-500 text-white p-2 rounded mt-2">Eliminar</button>
                        `;
                        productosList.appendChild(productoElement);
                    });
                });
        }

        // Cargar productos al iniciar
        cargarProductos();

        // Guardar o actualizar un producto
        document.getElementById('productForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const producto_id = document.getElementById('producto_id').value;
            const cantidad = document.getElementById('cantidad').value;
            const tipo_movimiento = document.getElementById('movimiento').value;
            const producto_id_hidden = document.getElementById('producto_id_hidden').value;

            if (producto_id && cantidad && tipo_movimiento) {
                const data = {
                    producto_id: parseInt(producto_id, 10),
                    cantidad: parseInt(cantidad, 10),
                    tipo_movimiento: tipo_movimiento.trim()
                };

                if (isUpdating && producto_id_hidden) {
                    // Actualizar el producto existente
                    fetch(`/api/inventarios/${producto_id_hidden}`, {
                        method: 'PUT',
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
                        isUpdating = false;
                        cargarProductos();
                        limpiarFormulario();
                        console.log('Producto actualizado:', data);
                    })
                    .catch(error => {
                        console.error('Hubo un problema con la solicitud fetch:', error);
                    });
                } else {
                    // Agregar un nuevo producto
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
                        limpiarFormulario();
                        console.log('Producto agregado:', data);
                    })
                    .catch(error => {
                        console.error('Hubo un problema con la solicitud fetch:', error);
                    });
                }
            } else {
                console.error('Faltan datos para enviar el formulario.');
            }
        });

        // Editar producto
        window.editarProducto = function (id) {
            fetch(`/api/inventarios/${id}`)
                .then(response => response.json())
                .then(producto => {
                    isUpdating = true;
                    document.getElementById('producto_id_hidden').value = id;
                    document.getElementById('producto_id').value = producto.producto_id;
                    document.getElementById('cantidad').value = producto.cantidad;
                    document.getElementById('movimiento').value = producto.tipo_movimiento;
                });
        };

        // Eliminar producto
        window.eliminarProducto = function (id) {
            fetch(`/api/inventarios/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => cargarProductos());
        };

        // Limpiar el formulario después de agregar/actualizar un producto
        function limpiarFormulario() {
            document.getElementById('producto_id_hidden').value = '';
            document.getElementById('producto_id').value = '';
            document.getElementById('cantidad').value = '';
            document.getElementById('movimiento').value = '';
        }
    });
</script>
@endsection