@extends('layouts.app', ['page' => 'Accueil', 'pageSlug' => 'accueil', 'sup' => ''])

@section('content') 
    <div class="row"> 

        <x-card-icon icon="fa-paperclip" title="Nouvelles fiches" url="fiches/new-fiches-list" :cnt="$nf" />
        <x-card-icon icon="fa-paperclip" title="Au niveau 2" url="fiches/nv2-fiches-list" :cnt="$nv2f" />
        <x-card-icon icon="fa-check" title="Au niveau 3" url="fiches/nv3-fiches-list" :cnt="$nv3f" /> 
        <x-card-icon icon="fa-check" title="Transmises" url="fiches/dc-fiches-list" :cnt="$dcf" />
       {{--  <x-card-icon icon="fa-times" title="Défarovable" url="/fiches/no-fiche-list" :cnt="$nof" /> --}}
        {{--  @livewire('counter') --}}
    </div>
@endsection
