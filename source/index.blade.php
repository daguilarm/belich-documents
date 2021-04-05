@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-2 sm:px-6 my-4">
    <div class="hidden sm:flex justify-center w-full mb-12">
        <img class="w-3/4 rounded-lg shadow" src="assets/images/thumbnail.jpg">
    </div>
    <div class="w-full block my-4 mx-auto p-2 rounded-lg bg-red-100 text-red-700 shadow-lg">
        I am working in the new versión of the package. This new versión use Laravel Livewire and AlpineJS, and will be available soo... so this documentation is now deprecated. I am working in the new package, as soon as possible it will be release with the new documentation.
    </div>
    <div class="sm:flex sm:-mt-6 mx-auto">
        <div class="w-full mx-0 sm:mx-4 mb-4 sm:mb-0 bg-white rounded-lg p-6 shadow-lg">
            <h2 class="text-blue-800 mb-4 text-2xl">The dashboard admin for Laravel</h2>
            <ul class="p-2 mx-6 text-gray-600">
                <li>No JS frameworks, just vanilla JS.</li>
                <li>Focus on PHP.</li>
                <li>Fast development: built it in minutes...</li>
                <li>Fully configurable.</li>
                <li>Php 7.4, Laravel 6.x, Tailwindcss, ChartistJS...</li>
                <li>Note: This version is for testing only. At the moment I am working on a new version based on Laravel Livewire and AlpineJS to manage all javascript, but keeping the essence of Belich intact.</li>
                <li>Belich v2.0 will be release soon...</li>
            </ul>
            <div class="flex justify-center">
                <a href="en/home/about" class="bg-blue-500 hover:bg-blue-700 hover:text-blue-100 text-white font-bold py-2 px-4 rounded">Documents</a>
            </div>
        </div>
        <div class="w-full mx-0 sm:mx-4 bg-white rounded-lg p-6 shadow-lg">
            <h2 class="text-blue-800 mb-4 text-2xl">Panel de administración para Laravel</h2>
            <ul class="p-2 mx-6 text-gray-600">
                <li>Sin frameworks JS, solo vanilla JS.</li>
                <li>Centrado en PHP.</li>
                <li>Desarrollo rápido: construyelo en minutos...</li>
                <li>Totalmente configurable.</li>
                <li>Php 7.4, Laravel 6.x, Tailwindcss, ChartistJS...</li>
                <li>Nota: Esta versión es solo apta para pruebas. En este momento, estoy trabajando en una nueva versión basada en Laravel Livewire y AlpineJS para gestionar todo el javascript, pero manteniendo la esencia de Belich intacta.</li>
                <li>Belich v2.0 estará lista muy pronto...</li>
            </ul>
            <div class="flex justify-center">
                <a href="es/home/about" class="bg-blue-500 hover:bg-blue-700 hover:text-blue-100 text-white font-bold py-2 px-4 rounded">Documentación</a>
            </div>
        </div>
    </div>
</section>
@endsection
