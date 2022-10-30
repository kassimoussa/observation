@extends('layouts.app', ['page' => 'Liste fiches en cours', 'pageSlug' => 'ec_fiches', 'sup' => ''])

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
                    @if (session('level') == '1' || session('level') == '3')
                        <th>TO</th>
                    @endif
                    {{-- <th>Status</th> --}}
                    <th>Action</th>
                </thead>
                <tbody class=" text-center">
                    @if (!empty($fiches) && $fiches->count())
                        @php
                            $cnt = 1;
                            $delmodal = 'del' . $cnt;
                            $tdcmodal = 'tdc' . $cnt;
                            $tdsimodal = 'tdsi' . $cnt;
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
                                @if (session('level') == '1' || session('level') == '3')
                                    <td>{{ strtoupper($fiche->assignedto) }}</td>
                                @endif
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

                                                @if ($fiche->avis_nv3 == 'OK')
                                                    <button type="button" class="btn btn-link dropdown-item"
                                                        data-bs-toggle="modal" data-bs-target="#{{ $tdsimodal }}">
                                                        <i class="fas fa-paper-plane" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title="Transmettre au DC"></i>
                                                        Transmettre à la DSI
                                                    </button>
                                                @elseif($fiche->avis_nv3 == 'NO')
                                                    <button type="button" class="btn btn-link dropdown-item"
                                                        data-bs-toggle="modal" data-bs-target="#{{ $tdcmodal }}">
                                                        <i class="fas fa-paper-plane" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title="Transmettre au DC"></i>
                                                        Transmettre à la DC
                                                    </button>
                                                @endif
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
                                aria-labelledby="dcdeleteFicheModal" aria-hidden="true">
                                <div class="modal-dialog   modal-dialog-centered  " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4>Transmettre à la Direction Commerciale </h4>
                                        </div>
                                        <div class="modal-body ">
                                            <h5 class="text-center"><i class="fas fa-exclamation-circle fa-3x info"></i>
                                            </h5>
                                            <h5 class="text-center">Etes-vous sûre de passer la fiche à la DC ?</h5>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <form action="{{ url('fiches/transmettre', $fiche) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('put')
                                                <button class="btn btn-primary fw-bold" type="submit">Soumettre</button>
                                                <button type="reset" class="btn btn-outline-danger  fw-bold"
                                                    data-bs-dismiss="modal">Annuler</button>
                                                    <input type="text" name="trans" value="dc" hidden>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="{{ $tdsimodal }}" tabindex="-1"
                                aria-labelledby="dsiModal" aria-hidden="true">
                                <div class="modal-dialog   modal-dialog-centered  " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4>Transmettre à la DSI </h4>
                                        </div>
                                        <div class="modal-body ">
                                            <h5 class="text-center"><i class="fas fa-exclamation-circle fa-3x info"></i>
                                            </h5>
                                            <h5 class="text-center">Etes-vous sûre de passer la fiche à la DSI ?</h5>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <form action="{{ url('fiches/transmettre', $fiche) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('put')
                                                <button class="btn btn-primary fw-bold" type="submit">Soumettre</button>
                                                <button type="reset" class="btn btn-outline-danger  fw-bold"
                                                    data-bs-dismiss="modal">Annuler</button>
                                                    <input type="text" name="trans" value="dsi" hidden>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $cnt = $cnt + 1;
                                $delmodal = 'del' . $cnt;
                                $tdcmodal = 'tdc' . $cnt;
                            $tdsimodal = 'tdsi' . $cnt;
                            @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">Aucune fiche trouvée .</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>

    </div>

@endsection
