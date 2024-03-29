@extends('layouts.app', ['page' => 'Accueil', 'pageSlug' => 'accueil', 'sup' => ''])

@section('content') 
    <div class="row justify-content-center"> 

        <x-card-icon icon="fa-file-medical" title="Nouvelles fiches" url="fiches/new-fiches-list" :cnt="$nf" />
        <x-card-icon icon="fa-file-import" title="Au niveau 2" url="fiches/nv2-fiches-list" :cnt="$nv2f" />
        <x-card-icon icon="fa-file-export" title="Au niveau 3" url="fiches/nv3-fiches-list" :cnt="$nv3f" />
       {{-- <x-card-icon icon="fa-check" title="Au DC" url="/fiches/nv3-fiches-list" :cnt="$dcf" />
          @livewire('counter') --}}
    </div>
@endsection
