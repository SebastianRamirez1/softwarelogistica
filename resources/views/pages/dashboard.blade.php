@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard</h1>
        <p class="text-gray-600">Bienvenido al sistema de logística de surtidores. Aquí puedes gestionar inventarios, pedidos, ubicaciones y generar informes.</p>

        <div class="mt-6 grid grid-cols-2 gap-4">
            <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Total Inventarios</h2>
                <p class="text-2xl">100</p>
            </div>
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Pedidos Activos</h2>
                <p class="text-2xl">50</p>
            </div>
        </div>
    </div>
@endsection
