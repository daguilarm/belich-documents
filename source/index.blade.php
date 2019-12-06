@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-6 my-4">
    <div class="flex justify-center w-full mb-12">
        <img class="w-3/4 rounded-lg shadow" src="assets/img/thumbnail.jpg">
    </div>
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="flex-1 w-1/2 m-4 bg-white rounded-lg p-6 shadow-lg">
            <h3 class="text-blue-800">Belich: The dashboard admin for Laravel</h3>
            <ul class="p-2 mx-6 text-gray-600">
                <li>No JS frameworks, just vanilla JS.</li>
                <li>Focus on PHP.</li>
                <li>Fast development: built it in minutes...</li>
                <li>Fully configurable.</li>
                <li>Php 7.4, Laravel 6.x, Tailwindcss, ChartistJS...</li>
            </ul>
            <div class="flex justify-end">
                <a href="en/home/about" class="bg-blue-500 hover:bg-blue-700 hover:text-blue-100 text-white font-bold py-2 px-4 rounded">Documents</a>
            </div>
        </div>
        <div class="flex-2 w-1/2 m-4 bg-white rounded-lg p-6 shadow-lg">
            <h3 class="text-blue-800">Belich: Panel de administración para Laravel</h3>
            <ul class="p-2 mx-6 text-gray-600">
                <li>Sin frameworks JS, solo vanilla JS.</li>
                <li>Centrado en PHP.</li>
                <li>Desarrollo rápido: construyelo en minutos...</li>
                <li>Totalmente configurable.</li>
                <li>Php 7.4, Laravel 6.x, Tailwindcss, ChartistJS...</li>
            </ul>
            <div class="flex justify-end">
                <a href="es/home/about" class="bg-blue-500 hover:bg-blue-700 hover:text-blue-100 text-white font-bold py-2 px-4 rounded">Documentación</a>
            </div>
        </div>
    </div>
</section>
@endsection
