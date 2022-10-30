@extends('layouts.app', ['page' => 'Nouvelle fiche', 'pageSlug' => 'create', 'sup' => 'fiche'])
@section('content')
    <div class="row mt-3">
        <div class="d-flex justify-content-between mb-3 ">
            <h3 class="fw-bold">Nouvelle Fiche </h3>
            <a href="{{ url('index') }}" class="btn   btn-primary  fw-bold"> <i class="fas fa-arrow-left"></i> RETOURNER</a>
        </div>
        <div class="row"> 

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

            <form action="/fiches/store" role="form" method="post" class="form" enctype="multipart/form-data">
                @csrf

                <div class="card col mb-3">
                    <h4 class="card-header text-center bg-dark text-white">Informations du client</h4>
                    <div class="card-body">
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Nom ou Raison Sociale <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nom_client" required>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">Adresse <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="adresse_client" required>
                        </div>
                        <div class="form-group control-label mb-1">
                            <label class="control-label">N° Compte <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="num_compte" required>
                        </div>
                    </div>
                </div>

                <div class="card col mb-3">
                    <h4 class="card-header text-center bg-dark text-white"> PROPOSITION DC</h4>
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group control-label mb-1 col-md-2">
                                <label class="control-label">Type <span class="text-danger">*</span></label>
                                <select class="form-select js-select2" name="type" id="services" required>
                                    <option value="" disabled selected>Select type</option>
                                    <option value="Dégrevement">Dégrevement</option>
                                    <option value="Ajustement">Ajustement</option>
                                    <option value="OCC">OCC</option>
                                </select>
                            </div>
                            <div class="form-group control-label mb-1 col-md-2">
                                <label class="control-label">Service <span class="text-danger">*</span></label>
                                <select class="form-select js-select2" name="service" required>
                                    <option value="" disabled selected>Select service</option>
                                    <option value="Internet">Internet</option>
                                    <option value="Fix">Fix</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="Internet-Fix">Internet-Fix</option>
                                    <option value="Fix-Mobile">Fix-Mobile</option>
                                    <option value="neon">Neon</option>
                                </select>
                            </div>
                            <div class="form-group control-label mb-1 col-md-2">
                                <label class="control-label">N° Facture <span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="num_facture">
                            </div>
                            <div class="form-group control-label mb-1 col-md-2">
                                <label class="control-label">Montant TTC <span class="text-danger">*</span></label>
                                <input type="number" step=any class="form-control" name="mont_facture" required>
                            </div>
                            <div class="form-group control-label mb-1 col-md-4">
                                <label class="control-label">Documents <span class="text-danger"></span></label>
                                <input class="form-control" type="file" name="files[]" accept=".pdf" multiple>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card col mb-3">
                    <h4 class="card-header text-center bg-dark text-white">Assignation </h4>
                    <div class="card-body">
                        <div class="form-group control-label mb-1 ">
                            <label class="control-label">User <span class="text-danger">*</span></label>
                            <select class="form-select js-select2" name="assignedto" required>
                                <option value="" disabled selected>Select user</option>
                                @foreach ($users as $user )
                                      <option value="{{ $user->username }}">{{ $user->name }}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                </div> 

                <div class="card col mb-3">
                    <h4 class="card-header text-center bg-dark text-white">Observation </h4>
                    <div class="card-body">
                        <textarea class="form-control" aria-label="With textarea" name="obs_nv1" rows="8"> </textarea>
                    </div>
                </div> 

                <div class="row mb-3">
                    <div class=" form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary fw-bold">Ajouter</button>
                        <button type="reset" class="btn btn-outline-danger  fw-bold">Annuler</button>
                        <input type="text" name="date_ajout" value="{{ date('Y-m-d H:i:s') }}" hidden>
                        <input type="text" class="form-control" name="id_time" value="{{ time() }}" hidden>

                    </div>
                </div>

            </form>
        </div>

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
            width: 150px;
            background: lavender;
        }
    </style>

@endsection
