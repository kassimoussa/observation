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
                    $tdgmodal = 'tdg' . $cnt;
                    $rsmodal = 'rs' . $cnt;
                @endphp

                @foreach ($fiches as $key => $fiche)
                    @php
                        $avis = $fiche->avis_nv3;
                        $color_avis = 'white';
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
                        <td class="td-actions ">
                            <div class="dropdown dropstart">
                                <button type="button" class="btn btn-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false" id="dropdownMenu2">
                                    <span class="badge rounded-pill bg-primary"><i class="fas fa-ellipsis-h"></i></span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link dropdown-item"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche ">
                                        <i class="fas fa-eye"></i> Voir la fiche
                                    </a>
                                    @if ($fiche->trans == 'dsi')
                                        <a class="btn btn-link dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#{{ $tdgmodal }}" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Transmettre à la DG">
                                            <i class="fas fa-share"></i> Transmettre à la DG
                                        </a>
                                    @endif
                                    <a class="btn btn-link dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#{{ $rsmodal }}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Transmettre à la DG">
                                        <i class="fas fa-share fa-flip-horizontal"></i> Renvoyer
                                    </a>
                                    @if (session('level') == '1')
                                        <button type="button" class="btn btn-link dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#{{ $tdcmodal }}">
                                            <i class="fas fa-share-alt" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="R&assigner"></i>
                                            Réassigner
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="{{ $tdgmodal }}" tabindex="-1" aria-labelledby="transModal"
                        aria-hidden="true">
                        <div class="modal-dialog   modal-dialog-centered  " role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center">
                                    <h4>Transmettre à la DG </h4>
                                </div>
                                <div class="modal-body ">
                                    <h5 class="text-center"><i class="fas fa-exclamation-circle fa-3x info"></i>
                                    </h5>
                                    <h5 class="text-center">Etes-vous sûre de passer la fiche à la DG ?</h5>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <form action="{{ url('fiches/transmettre', $fiche) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('put')
                                        <button class="btn btn-primary fw-bold" type="submit">Soumettre</button>
                                        <button type="reset" class="btn btn-outline-danger  fw-bold"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <input type="text" name="trans" value="dg" hidden>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="{{ $rsmodal }}" tabindex="-1" aria-hidden="true">

                        <div class="modal-dialog   modal-dialog-centered  " role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center">
                                    <h4>Renvoyer la fiche </h4>
                                </div>
                                <form action="{{ url('fiches/update', $fiche) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body ">
                                        <div class="form-group control-label mb-2 ">
                                            <label class="control-label">Motif <span class="text-danger">*</span></label>
                                            <input type="text" name="motif_dsi" class="form-control">
                                        </div>
                    
                                        <div class="form-group control-label mb-2 ">
                                            <label class="control-label">Conmmentaire <span class="text-danger">*</span></label>
                                            <textarea class="form-control textarea" name="com_dsi" id="" cols="5" rows="5" required></textarea>
                                        </div>
                                        <input type="text" name="nivo" value="2" hidden>
                                        <input type="text" name="trans" value="" hidden>

                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button class="btn btn-primary fw-bold" type="submit">Envoyer</button>
                                        <button type="reset" class="btn btn-outline-danger  fw-bold"
                                            data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @php
                        $cnt = $cnt + 1;
                        $tdcmodal = 'tdc' . $cnt;
                        $tdgmodal = 'tdg' . $cnt;
                        $rsmodal = 'rs' . $cnt;
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
