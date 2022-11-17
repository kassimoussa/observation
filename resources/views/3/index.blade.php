@extends('layouts.app', ['page' => 'Accueil', 'pageSlug' => 'accueil', 'sup' => ''])

@section('content') 
    <div class="row justify-content-center"> 

        <x-card-icon icon="fa-paperclip" title="Nouvelles fiches" url="fiches/new-fiches-list" :cnt="$nf" />
        <x-card-icon icon="fa-file-import" title="Au niveau 2" url="fiches/nv2-fiches-list" :cnt="$nv2f" />
        <x-card-icon icon="fa-file-export" title="Au niveau 3" url="fiches/nv3-fiches-list" :cnt="$nv3f" />
        <x-card-icon icon="fa-share fa-flip-horizontal" title="Renvoyés" url="fiches/rs-fiches-list" :cnt="$rsf" /> 
        <x-card-icon icon="fa-share" title="Transmises" url="fiches/dc-fiches-list" :cnt="$dcf" />
         {{-- @livewire('counter') --}}
    </div>
@endsection
