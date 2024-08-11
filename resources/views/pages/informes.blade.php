@extends('layouts.app')

@section('title', 'Generación de Informes')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Generación de Informes</h1>

        <form action="#" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Tipo de Informe:</label>
                <select class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option>Inventarios</option>
                    <option>Pedidos</option>
                    <option>Ubicaciones</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Generar Informe</button>
        </form>

        <h2 class="text-xl font-bold text-gray-800 mt-6">Informes Generados</h2>
        <ul class="mt-4 space-y-2">
            <!-- Ejemplo de informe generado -->
            <li class="bg-gray-100 p-4 rounded-lg shadow-md">
                <a href="#" class="text-blue-500 hover:underline">Informe de Inventarios - Julio 2024</a>
            </li>
            <!-- Repite los informes según sea necesario -->
        </ul>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            cargarInformes(); // Carga los informes al inicio
        });

        function cargarInformes() {
            fetch('/api/informes')
                .then(response => response.json())
                .then(data => {
                    const informesList = document.getElementById('informesList');
                    informesList.innerHTML = ''; // Limpiar la lista

                    data.forEach(informe => {
                        const informeElement = document.createElement('div');
                        informeElement.className = 'p-4 bg-white rounded shadow';
                        informeElement.innerHTML = `
                            <h2 class="text-xl font-bold">${informe.titulo}</h2>
                            <p>${informe.contenido}</p>
                        `;
                        informesList.appendChild(informeElement);
                    });
                })
                .catch(error => console.error('Error fetching informes:', error));
        }
    </script>
@endsection
