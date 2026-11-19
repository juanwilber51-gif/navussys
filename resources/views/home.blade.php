{{-- Portada principal pública de NAVUSSYS --}}
@extends('layouts.app') {{-- Hereda de la plantilla principal --}}

@section('content') {{-- Inicia bloque de contenido --}}

    @include('home.partials.hero') {{-- Sección Hero de presentación --}}
    @include('home.partials.stats') {{-- Métricas e indicadores de confianza --}}
    @include('home.partials.catalogo') {{-- Catálogo interactivo de sistemas web --}}
    @include('home.partials.demo') {{-- Simulador interactivo en tiempo real --}}
    @include('home.partials.calculator') {{-- Cotizador dinámico y calculadora --}}
    @include('home.partials.doc_download') {{-- Descarga de informe formal APA 7 --}}
    @include('home.partials.contact') {{-- Formulario de contacto y ubicación --}}
    @include('home.partials.modal_details') {{-- Modal de detalles del sistema --}}
    @include('home.partials.modal_order') {{-- Modal de registro de cotizaciones --}}

@endsection {{-- Cierra bloque de contenido --}}
