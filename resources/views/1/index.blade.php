@extends('layouts.app', ['page' => 'Accueil', 'pageSlug' => 'accueil', 'sup' => ''])

@section('content')
    <div class="row">
       
        @livewire('counter')
    </div>

@endsection
