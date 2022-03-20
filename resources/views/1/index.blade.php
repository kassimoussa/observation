@extends('layouts.app', ['page' => 'Accueil', 'pageSlug' => 'accueil', 'sup' => ''])

@section('content')
    <div class="row  py-3 px-3">
        <div class="d-flex justify-content-between mb-4 ">
            <h3 class="over-title ">Fiches d'Observation </h3>
            <a href="/newfiche" class="btn   btn-primary  fw-bold">Nouvelle Fiche</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($message = Session::get('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
{{-- 
        <div class="d-flex justify-content-start mb-2">
            <form action="" class="col-md-12">
                <div class="input-group  mb-3">
                    <button class="btn btn-dark" type="submit">Chercher</button>
                    <input type="text" class="form-control " name="search" value="{{ $search }}"
                        placeholder="Par N° fiche, N° facture, raison sociale,  ">
                </div>
            </form>
        </div>
 --}}
      {{--   <div>
            <table class="table tablesorter table-sm table-hover" id="">
                <thead class=" text-primary text-center">
                    <th scope="col">N° Fiche</th>
                    <th scope="col">Nom du client</th>
                    <th scope="col">N° Facture</th>
                    <th scope="col">N° Compte</th>
                    <th scope="col">Type</th>
                    <th scope="col">Service</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody class=" text-center">
                    @if (!empty($fiches) && $fiches->count())
                        @php
                            $cnt = 1;
                        @endphp

                        @foreach ($fiches as $key => $fiche)
                            @php
                                $status = $fiche->status;
                                $bg = 'white';
                                $txt = 'white';
                                $editbtn = '';
                                if ($status == null) {
                                    $status = "Pas d'avis";
                                    $txt = 'dark';
                                } elseif ($status == 'Favorable') {
                                    $bg = 'success';
                                    $editbtn = 'disabled';
                                } elseif ($status == 'Defavorable') {
                                    $bg = 'danger';
                                }
                            @endphp
                           
                            <tr>
                                <td>{{ $fiche->id }}</td>
                                <td>{{ $fiche->nom_client }}</td>
                                <td>{{ $fiche->num_facture }}</td>
                                <td>{{ $fiche->num_compte }}</td>
                                <td>{{ $fiche->type }}</td>
                                <td>{{ $fiche->service }}</td>
                                <td class="bg-{{ $bg }} text-{{ $txt }}">{{ $status }}</td>
                                <td class="td-actions ">
                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Voir la fiche ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                        {{ $editbtn }}>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $cnt = $cnt + 1;
                            @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">Aucune fiche trouvée pour cette recherche.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div> --}}
        @livewire('counter')
    </div>
 
    <script>
        jQuery(document).ready(function($) {
            $('*[data-href]').on('click', function() {
                window.location = $(this).data("href");
            });
        });
    </script>

@endsection
