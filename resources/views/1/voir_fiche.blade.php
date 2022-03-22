@extends('layouts.app', ['page' => "Fiche d'observation", 'pageSlug' => 'fiche', 'sup' => 'fiche'])
@section('content')
    <div class="container ">
        <div class="d-flex justify-content-between mb-3" style="width: 100%">
            <h3 class="over-title ">FICHE D'OBSERVATION </h3>

            <a href="{{ url('fiche_pdf', $fiche) }}" class="btn  btn-primary  fw-bold text-white">IMPRIMER</a>
        </div>
        <div class="d-flex justify-content-between ">
            <h5>N° {{ $fiche->id }}</h5>
            <h5>{{ date('d/m/Y', strtotime($fiche->date_ajout)) }}</h5>
        </div>
        <div class="card col mb-3">
            <h4 class="card-header text-center bg-dark text-white">Informations du client</h4>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text txt fw-bold ">Nom ou Raison Sociale</span>
                        <label class="form-control">{{ $fiche->nom_client }} </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text txt fw-bold ">Adresse</span>
                        <label class="form-control">{{ $fiche->adresse_client }} </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text txt fw-bold ">N° Compte</span>
                        <label class="form-control">{{ $fiche->num_compte }} </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col mb-3">
            <h4 class="card-header text-center bg-dark text-white">PROPOSITION DC</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt2 fw-bold ">Type</span>
                            <label class="form-control">{{ $fiche->type }} </label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt2 fw-bold ">Service</span>
                            <label class="form-control">{{ $fiche->service }} </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt2 fw-bold ">Facture N°</span>
                            <label class="form-control">{{ $fiche->num_facture }} </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt2 fw-bold ">Montant TTC</span>
                            <label class="form-control">{{ $fiche->mont_facture }} FDJ </label>
                        </div>
                    </div>
                </div>

                <div class="card mb-2">
                    <h4 class="card-header text-center bg-dark text-white">Document </h4>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-2">
                            <button type="button" name="add_document" class="btn btn-dark fw-bold" data-bs-toggle="modal"
                                data-bs-target="#new_document">Ajouter</button>
                        </div>
                        <table class="table table-bordered border-dark table-sm table-hover" id="">
                            <thead class="  table-dark text-center">
                                <th>N° Document</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @if (!empty($documents) && $documents->count())
                                    @php
                                        $cnt = 1;
                                        $modaln = 'vdir' . $cnt;
                                    @endphp
                                    @foreach ($documents as $key => $document)
                                        <tr class="text-center ">
                                            <td>{{ $document->id }}</td>
                                            <td class="td-actions ">
                                                <a href="#" class="btn btn-transparent btn-xs" data-bs-toggle="modal"
                                                    data-bs-target="#{{ $modaln }}">
                                                    <i class="fas fa-eye " data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Voir le document "></i>
                                                </a>
                                                <a href="{{ url('download', $document) }}"
                                                    class="btn btn-transparent btn-xs" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Télécharger le document">
                                                    <i class="fas fa-download "></i>
                                                </a>
                                                <form action="{{ url('delete_document', $document) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-transparent btn-xs"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Supprimer le document"
                                                        onclick="confirm('Etes vous sûr de supprimer le document ?') ? this.parentElement.submit() : ''">
                                                        <i class="fas fa-trash "></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="{{ $modaln }}" tabindex="-1"
                                            aria-labelledby="voirtoutrTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn btn-primary fw-bold"
                                                            data-bs-dismiss="modal">Fermer</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe height="900px" width="1000px"
                                                            src="{{ asset($document->path) }}" frameborder="0"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $cnt = $cnt + 1;
                                            $modaln = 'vdir' . $cnt;
                                        @endphp
                                    @endforeach
                                @else
                                    <tr class="text-center ">
                                        <td colspan="10">Aucune document trouvé pour cette fiche.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <div class="modal fade" id="new_document" tabindex="-1" aria-labelledby="newDocument"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-between">
                                        <h3>Nouveau Document </h3>
                                        <button type="button" class="btn btn-primary fw-bold"
                                            data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('add_document') }}" role="form" method="post"
                                            class="form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group control-label mb-3 ">
                                                <label class="control-label">Documents <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="file" name="files[]"
                                                    id="formFile" multiple>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="form-group text-center"> 
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary fw-bold">Ajouter</button>
                                                    <button type="reset"
                                                        class="btn btn-outline-danger fw-bold">Annuler</button>
                                                    <input type="text" name="numero_fiche"
                                                        value="{{ $fiche->id_time }}" hidden>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card  mb-3">
            <h4 class="card-header text-center bg-dark text-white">Observation Chef de Service Facturation</h4>
            <div class="card-body">
                <textarea class="form-control textarea" aria-label="With textarea" name="obs_cs_facturation" rows="5"
                    readonly> {{ $fiche->obs_cs_facturation }}</textarea>
            </div>
        </div>

        @if ($fiche->status != null)
            <div class="card col mb-3">
                <h4 class="card-header text-center bg-dark text-white">Avis et Observation Chef de Division SI</h4>
                <div class="card-body">
                    <div class="col mb-2 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="pcb" value="Favorable"
                                @if ($fiche->status == 'Favorable') checked  @else disabled @endif>
                            <label class="form-check-label" for="pcb">Favorable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="pcp" value="Defavorable"
                                @if ($fiche->status == 'Defavorable') checked  @else disabled @endif>
                            <label class="form-check-label" for="pcp">Defavorable</label>
                        </div>
                    </div>
                    <textarea class="form-control textarea" aria-label="With textarea" name="obs_cd_si"
                        readonly>{{ $fiche->obs_cd_si }} </textarea>
                </div>
            </div>
        @endif
    </div>

    <style>
        .btn-default:hover {
            background-color: red !important;
            color: white;
        }

        .btn-primary {
            color: white;
        }

        .txt {
            width: 170px;
            background: lavender;
        }

        .txt2 {
            /* width: 100px; */
            background: lavender;
        }

        .textarea {
            font-size: 18x;
            font-weight: bold
        }

    </style>

@endsection
