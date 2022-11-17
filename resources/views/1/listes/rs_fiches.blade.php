@extends('layouts.app', ['page' => 'Liste fiches renvoyés', 'pageSlug' => 'rs_fiches', 'sup' => ''])

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
                    <th>Status</th>
                    @if (session('level') == '1' || session('level') == '3' || session('level') == '4')
                        <th>TO</th>
                    @endif 
                    <th>Action</th>
                </thead>
                <tbody class=" text-center">
                    @if ($fiches->isNotEmpty())
                        @php
                            $cnt = 1;
                            $delmodal = 'del' . $cnt;
                            $tdcmodal = 'tdc' . $cnt;
                            $tdsimodal = 'tdsi' . $cnt;
                            $transmodal = 'trans' . $cnt;
                            $reassignermodal = 'reas' . $cnt;
                            $sendmodal = 'send' . $cnt;
                        @endphp

                        @foreach ($fiches as $key => $fiche)
                            @php
                                $avis = $fiche->avis_nv2;
                                $commente = $fiche->obs_nv2;
                                $status = $fiche->status;
                                $color_avis = 'white';
                                $color_status = 'white';
                                $editbtn = '';
                                if ($avis == null) {
                                    $avis = "Pas d'avis";
                                    $color_avis = 'bg-white text-dark';
                                } elseif ($avis == 'OK') {
                                    $color_avis = 'bg-success text-white';
                                    $avis = 'Favorable';
                                } elseif ($avis == 'NO') {
                                    $color_avis = 'bg-danger text-white';
                                    $avis = 'Défavorable';
                                } elseif ($avis == 'Annulé') {
                                    $color_avis = 'bg-warning text-dark';
                                }
                                
                                if ($status == 'Cloturé') {
                                    $color_status = 'bg-success text-dark';
                                } elseif ($status == 'Rejeté') {
                                    $color_status = 'bg-danger text-white';
                                } else {
                                    $color_status = 'bg-white text-dark';
                                }
                                
                                if ($commente == null) {
                                    $commente = 'Non';
                                } else {
                                    $commente = 'Oui';
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
                                <td class="{{ $color_avis }}">{{ $avis }}</td>
                                <td class="{{ $color_status }}">{{ $status }}</td>
                                @if (session('level') == '1' || session('level') == '3' || session('level') == '4')
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
                                           {{--  @if (session('level') == 3 || session('level') == 4)
                                                <button type="button" class="btn btn-link dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#{{ $reassignermodal }}">
                                                    <i class="fas fa-share-alt" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Réassigner"></i>
                                                    Réassigner
                                                </button>
                                            @endif
                                            @if (session('level') == 4)
                                                <button type="button" class="btn btn-link dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#{{ $sendmodal }}">
                                                    <i class="fas fa-share fa-flip-horizontal" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Renvoyer"></i>
                                                    Renvoyer
                                                </button>
                                            @endif --}}
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

                            <div class="modal fade" id="{{ $tdsimodal }}" tabindex="-1" aria-labelledby="dsiModal"
                                aria-hidden="true">
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


                            <div class="modal fade" id="{{ $reassignermodal }}" tabindex="-1"
                                aria-labelledby="reasFicheModal" aria-hidden="true">
                                <div class="modal-dialog   modal-dialog-centered  " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4>Réassigner la fiche</h4>
                                        </div>
                                        <form action="{{ url('fiches/update', $fiche) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body ">
                                                <div class="form-group control-label mb-1 ">
                                                    <label class="control-label">User <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select js-select2" name="assignedto" required>
                                                        <option value="" disabled selected>Select user</option>
                                                        @foreach ($users as $user)
                                                            @if ($user->level == '2')
                                                                @if ($user->username == $fiche->assignedto)
                                                                    <option value="{{ $user->username }}" selected>
                                                                        {{ $user->name }}</option>
                                                                @else
                                                                    <option value="{{ $user->username }}">
                                                                        {{ $user->name }}
                                                                    </option>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button class="btn btn-primary fw-bold" type="submit">Soumettre</button>
                                                <button type="reset" class="btn btn-outline-danger  fw-bold"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="{{ $transmodal }}" tabindex="-1"
                                aria-labelledby="transModal" aria-hidden="true">
                                <div class="modal-dialog   modal-dialog-centered  " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4>Transmettre la fiche</h4>
                                        </div>
                                        <form action="{{ url('fiches/transmettre', $fiche) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body ">
                                                <div class="form-group control-label mb-1 ">
                                                    <label class="control-label">Direction <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select js-select2" name="trans" required>
                                                        <option value="" disabled selected>Select Direction</option>
                                                        <option value="dsi">DSI</option>
                                                        <option value="dc">DC</option>
                                                        <option value="dg">DG</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button class="btn btn-primary fw-bold" type="submit">Soumettre</button>
                                                <button type="reset" class="btn btn-outline-danger  fw-bold"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <x-resend-to :sendmodal="$sendmodal" :users="$users" :fiche="$fiche" />

                            @php
                                $cnt = $cnt + 1;
                                $delmodal = 'del' . $cnt;
                                $tdcmodal = 'tdc' . $cnt;
                                $tdsimodal = 'tdsi' . $cnt;
                                $reassignermodal = 'reas' . $cnt;
                                $transmodal = 'trans' . $cnt;
                                $sendmodal = 'send' . $cnt;
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
