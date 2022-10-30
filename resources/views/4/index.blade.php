@extends('layouts.app', ['page' => 'Accueil', 'pageSlug' => 'accueil', 'sup' => ''])

@section('content')

    <div class="col">


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

        <div class=" mb-3">

            <table class="table table-bordered table-striped hover table-sm align-middle newfiches ">
                <thead class="bg-dark text-white text-center">
                    <th>Date</th>
                    <th>N° Fiche</th>
                    <th>Nom du client</th>
                    <th>N° Facture</th>
                    <th>N° Compte</th>
                    <th>Type</th>
                    <th>Service</th> 
                    <th>Avis</th>  
                    {{-- <th>Status</th> --}}
                    <th>Action</th>
                </thead>
                <tbody class=" text-center">
                    @if (!empty($fiches) && $fiches->count())
                        @php
                            $cnt = 1; 
                            $tdcmodal = 'tdc' . $cnt;
                        @endphp

                        @foreach ($fiches as $key => $fiche)
                            @php
                                $avis = $fiche->avis_nv3;
                                $bg = 'white';
                                $txt = 'white';
                                $text = '';
                                if ($avis == null) {
                                    $avis = "Pas d'avis";
                                    $txt = 'dark';
                                } elseif ($avis == 'OK') {
                                    $bg = 'success';
                                    $avis = 'Favorable';
                                } elseif ($avis == 'NO') {
                                    $bg = 'danger';
                                    $avis = 'Défavorable';
                                } elseif ($avis == 'Annulé') {
                                    $bg = 'warning';
                                    $txt = 'dark';
                                }
                            @endphp
                            <tr>
                                <td>{{ $fiche->updated_at }} </td>
                                <td>{{ $fiche->id }}</td>
                                <td>{{ $fiche->nom_client }}</td>
                                <td>{{ $fiche->num_facture }}</td>
                                <td>{{ $fiche->num_compte }}</td>
                                <td>{{ $fiche->type }}</td>
                                <td>{{ $fiche->service }}</td> 
                                <td class="bg-{{ $bg }} text-{{ $txt }}">{{ $avis }}</td>
                                {{--  <td>{{ $fiche->status }} </td> --}}
                                <td class="td-actions ">
                                    <div class="dropdown dropstart">
                                        <button type="button" class="btn btn-icon dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenu2">
                                            <span class="badge rounded-pill bg-primary"><i
                                                    class="fas fa-ellipsis-h"></i></span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                            <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link dropdown-item"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche ">
                                                <i class="fas fa-eye"></i> Voir la fiche
                                            </a>
                                            @if (session('level') == '1')  
                                                <button type="button" class="btn btn-link dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#{{ $tdcmodal }}">
                                                    <i class="fas fa-share-alt" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="R&assigner"></i>
                                                    Réassigner
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>  
                            @php
                                $cnt = $cnt + 1; 
                                $tdcmodal = 'tdc' . $cnt;
                            @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">Aucune fiche trouvée pour cette recherche.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>

    </div>

@endsection