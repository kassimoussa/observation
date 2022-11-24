@extends('layouts.app', ['page' => 'Accueil', 'pageSlug' => 'accueil', 'sup' => ''])

@section('content') 
    <div class="row justify-content-center"> 

        <x-card-icon icon="fa-folder" title="Transmises à la DSI" url="fiches/dsi-fiches-list" :cnt="$dsif" />
        <x-card-icon icon="fa-share" title="Transmises à la DG" url="fiches/dg-fiches-list" :cnt="$dgf" /> 
       {{-- <x-card-icon icon="fa-check" title="Au DC" url="/fiches/nv3-fiches-list" :cnt="$dcf" />
          @livewire('counter') --}}
    </div>
@endsection
