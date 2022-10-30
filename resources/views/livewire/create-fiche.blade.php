<div>
    <a class="btn  btn-primary  fw-bold" data-bs-toggle="modal" data-bs-target="#create-fiche">Ajouter</a>

    <div class="modal fade" id="create-fiche" tabindex="-1" aria-labelledby="create-ficheModal" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-fullscreen modal-dialog-centered modal-dialog-scrollable" role="document">
            <form wire:submit.prevent="save">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between bg-dark text-white">
                        <h3>Nouvelle fiche</h3>
                        <div class="px-2 ">
                            <button class="btn btn-primary fw-bold" type="submit">
                                Enregistrer
                            </button>
                            <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal"
                                wire:click="cancel">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                    </div>
                    <div class="modal-body">

                        <div class="card col mb-3">
                            <h4 class="card-header text-center bg-dark text-white">Informations du client</h4>
                            <div class="card-body">
                                <div class="form-group control-label mb-1">
                                    <label class="control-label">Nom ou Raison Sociale <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="nom_client" required>
                                </div>
                                <div class="form-group control-label mb-1">
                                    <label class="control-label">Adresse <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="adresse_client" required>
                                </div>
                                <div class="form-group control-label mb-1">
                                    <label class="control-label">N° Compte <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="num_compte" required>
                                </div>
                            </div>
                        </div>

                        <div class="card col mb-3">
                            <h4 class="card-header text-center bg-dark text-white"> PROPOSITION DC</h4>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group control-label mb-1 col-md-2">
                                        <label class="control-label">Type <span class="text-danger">*</span></label>
                                        <select class="form-select js-select2" wire:model="type" id="services"
                                            required>
                                            <option value="" disabled selected>Select type</option>
                                            <option value="Dégrevement">Dégrevement</option>
                                            <option value="Ajustement">Ajustement</option>
                                            <option value="OCC">OCC</option>
                                        </select>
                                    </div>
                                    <div class="form-group control-label mb-1 col-md-2">
                                        <label class="control-label">Service <span class="text-danger">*</span></label>
                                        <select class="form-select js-select2" wire:model="service" required>
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
                                        <label class="control-label">N° Facture <span
                                                class="text-danger"></span></label>
                                        <input type="text" class="form-control" wire:model="num_facture">
                                    </div>
                                    <div class="form-group control-label mb-1 col-md-2">
                                        <label class="control-label">Montant TTC <span
                                                class="text-danger">*</span></label>
                                        <input type="number" step=any class="form-control" wire:model="mont_facture"
                                            required>
                                    </div>
                                    <div class="form-group control-label mb-1 col-md-4">
                                        <label class="control-label">Documents <span class="text-danger"></span></label>
                                        <input class="form-control" type="file" wire:model="files" multiple
                                            accept=".pdf">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
