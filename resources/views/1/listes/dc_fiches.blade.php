@extends('layouts.app', ['page' => 'Liste fiches transmises à la DC', 'pageSlug' => 'ok_fiches', 'sup' => ''])

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

            <x-export-btn i="4" /> 

            <table class="table table-bordered table-striped hover table-sm align-middle newfiches ">
                <thead class="bg-dark text-white text-center  align-middle">
                    <th>Date</th>
                    <th>N° Fiche</th>
                    <th>Nom du client</th>
                    <th>N° Facture</th>
                    <th>N° Compte</th>
                    <th>Type</th>
                    <th>Service</th>
                    <th>Montant (DJF)</th>
                    <th>Avis</th>
                    <th>Status</th>
                    <th>A</th>
                    <th>TO</th>
                    <th>Creation</th>
                    <th>Dernière modif</th>
                    {{-- <th>Status</th> --}}
                    <th>Action</th>
                </thead>
                <tbody class=" text-center">
                    @if ($fiches->isNotEmpty())
                        @php
                            $cnt = 1;
                            $delmodal = 'del' . $cnt;
                            $tdcmodal = 'tdc' . $cnt;
                        @endphp

                        @foreach ($fiches as $key => $fiche)
                            @php
                                $avis = $fiche->avis_nv2;
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
                                <td>{{ $fiche->mont_facture }}</td>
                                <td class="bg-{{ $bg }} text-{{ $txt }}">{{ $avis }}</td>
                                <td>{{ $fiche->status }} </td>
                                <td>{{ strtoupper($fiche->trans) }}</td>
                                <td>{{ strtoupper($fiche->assignedto) }}</td>
                                <td>{{ $fiche->created_at->format('d/m/Y') }}</td>
                                <td>{{ $fiche->updated_at->format('d/m/Y') }}</td>
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
                                            @if (session('level') == '1' || session('level') == 4)
                                                <a href="{{ url('fiches/edit', $fiche) }}"
                                                    class="btn btn-link  dropdown-item" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Modifier la fiche ">
                                                    <i class="fas fa-edit"></i> Modifier la fiche
                                                </a>

                                                <button type="button" class="btn btn-link dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#{{ $delmodal }}">
                                                    <i class="fas fa-trash-alt" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Supprimer la fiche "></i>
                                                    Supprimer la fiche
                                                </button>

                                                <button type="button" class="btn btn-link dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#{{ $tdcmodal }}">
                                                    <i class="fas fa-share-alt" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Réassigner"></i>
                                                    Réassigner
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="{{ $delmodal }}" tabindex="-1"
                                aria-labelledby="deleteFicheModal" aria-hidden="true">
                                <div class="modal-dialog   modal-dialog-centered  " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4>Confirmer Suppression </h4>
                                        </div>
                                        <div class="modal-body ">
                                            <h5 class="text-center"><i class="fas fa-exclamation-circle fa-3x warning"></i>
                                            </h5>
                                            <h5 class="text-center">Etes-vous sûre de supprimer la fiche</h5>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <form action="{{ url('fiches/delete', $fiche) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-primary fw-bold" type="submit">Supprimer</button>
                                                <button type="reset" class="btn btn-outline-danger  fw-bold"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="{{ $tdcmodal }}" tabindex="-1"
                                aria-labelledby="tdcFicheModal" aria-hidden="true">
                                <div class="modal-dialog   modal-dialog-centered  " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4>Réassigner la fiche</h4>
                                        </div>
                                        <form action="{{ url('fiches/update', $fiche) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body ">
                                                <div class="form-group control-label mb-1 ">
                                                    <label class="control-label">User <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select js-select2" name="assignedto" required>
                                                        <option value="" disabled selected>Select user</option>
                                                        @foreach ($users as $user)
                                                            @if ($user->username == $fiche->assignedto)
                                                                <option value="{{ $user->username }}" selected>
                                                                    {{ $user->name }}</option>
                                                            @else
                                                                <option value="{{ $user->username }}">{{ $user->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button class="btn btn-primary fw-bold" type="submit">Soumettre</button>
                                                <button type="reset" class="btn btn-outline-danger  fw-bold"
                                                    data-bs-dismiss="modal">Annuler</button>
                                                <input type="text" name="nivo" value="1" hidden>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @php
                                $cnt = $cnt + 1;
                                $delmodal = 'del' . $cnt;
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
