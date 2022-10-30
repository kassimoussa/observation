<div class=" ">
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

    


    <div class="card">
        @if (session('level') == 1)
        <div class=" card-header d-flex justify-content-end mb-2">
            {{-- <div class="@if (session('level') == 1) {{ 'cm6' }} @endif input-group  mb-3">
                <span class="input-group-text bg-dark text-white fw-bold ">Recherche</span>
                <input type="text" class="form-control " wire:model="searche"
                    placeholder="Par N° fiche, N° facture, N° compte,raison sociale, type ou service ">
            </div> --}}
            
                <a href="newfiche" class="btn btn-primary newf fw-bold">Nouvelle Fiche</a>
        </div>
        @endif
        <table class="table tablesorter table-sm table-hover datatables align-middle" id="datatables">
            <thead class=" text-primary text-center">
                <th scope="col">N° Fiche</th>
                <th scope="col">Nom du client</th>
                <th scope="col">N° Facture</th>
                <th scope="col">N° Compte</th>
                <th scope="col">Type</th>
                <th scope="col">Service</th>
                <th scope="col">Avis</th>
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
                            $avis = $fiche->avis;
                            $bg = 'white';
                            $txt = 'white';
                            $editbtn = '';
                            if ($avis == null) {
                                $avis = "Pas d'avis";
                                $txt = 'dark';
                            } elseif ($avis == 'Favorable') {
                                $bg = 'success';
                                $editbtn = ' ';
                            } elseif ($avis == 'Defavorable') {
                                $bg = 'danger';
                            } elseif ($avis == 'Annulé') {
                                $bg = 'warning';
                                $txt = 'dark';
                            }
                        @endphp
                        <tr>
                            <td>{{ $fiche->id }}</td>
                            <td>{{ $fiche->nom_client }}</td>
                            <td>{{ $fiche->num_facture }}</td>
                            <td>{{ $fiche->num_compte }}</td>
                            <td>{{ $fiche->type }}</td>
                            <td>{{ $fiche->service }}</td>
                            <td class="bg-{{ $bg }} text-{{ $txt }}">{{ $avis }}</td>
                            <td>{{ $fiche->status }} </td>
                            <td class="td-actions ">
                                <div class="dropdown dropstart">
                                    <button type="button" class="btn btn-icon dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false" id="dropdownMenu2">
                                        <span class="badge rounded-pill bg-primary"><i
                                                class="fas fa-ellipsis-h"></i></span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                        <a href="{{ url('show', $fiche) }}" class="btn btn-link dropdown-item"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche ">
                                            <i class="fas fa-eye"></i> Voir la fiche
                                        </a>
                                        {{-- @if (session('level') == '1') --}}
                                        <a href="{{ url('edit', $fiche) }}"
                                            class="btn btn-link {{ $editbtn }} dropdown-item"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Modifier la fiche ">
                                            <i class="fas fa-edit"></i> Modifier la fiche
                                        </a>
                                        {{-- @endif --}}

                                        {{-- <form action="{{ url('delete_fiche', $fiche) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link dropdown-item" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                title="Supprimer la fiche de la base des données "
                                                onclick="confirm('Etes vous sûr de supprimer la fiche ?') ? this.parentElement.submit() : ''">
                                                <i class="fas fa-trash-alt"></i> Supprimer la fiche
                                            </button>
                                        </form> --}}
                                        <button type="button" class="btn btn-link dropdown-item"
                                            wire:click="deleteFicheConfirm({{ $fiche->id }})">
                                            <i class="fas fa-trash-alt" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                title="Supprimer le patient de la base des données "></i> Supprimer la
                                            fiche
                                        </button>
                                    </div>
                                </div>
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
      
        <div wire:ignore.self class="modal fade" id="deleteFicheModal" tabindex="-1"
            aria-labelledby="deleteFicheModal" aria-hidden="true">
            <div class="modal-dialog   modal-dialog-centered  " role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h4>Confirmer Suppression </h4> 
                    </div>
                    <div class="modal-body ">
                        <h5 class="text-center" ><i class="fas fa-exclamation-circle fa-3x warning"></i></h5>
                        <h5 class="text-center">Etes-vous sûre de supprimer la fiche</h5>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary fw-bold" data-bs-dismiss="modal"
                            wire:click="deleteFiche()">Supprimer</button>
                        <button type="reset" class="btn btn-outline-danger  fw-bold"
                            data-bs-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addPatient').modal('hide');
        });

        window.addEventListener('show-patient-edit-modal', event => {
            $('#editPatient').modal('show');
        });

        window.addEventListener('show-fiche-delete-modal', event => {
            $('#deleteFicheModal').modal('show');
        });
    </script>
@endpush

<style>
    .cm6 {
        width: 80%;
    }

    .newf {
        height: 10%;
    }
    .card-header {
        background: white;
    }

</style>

<script>
    $(document).ready(function() {
        $('table.datatables').DataTable( {
            "paging":   false, 
            "info":     false,
            /* "scrollY":        "600px",
            "scrollCollapse": true, */
            "filter": true
        } );
    } );
</script>
