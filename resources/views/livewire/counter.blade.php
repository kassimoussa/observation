<div class=" ">

    <div class="d-flex justify-content-between mb-2">
        <div class="cm6 input-group  mb-3">
            <span class="input-group-text bg-dark text-white fw-bold ">Recherche</span>
            <input type="text" class="form-control " wire:model="searche"
                placeholder="Par N° fiche, N° facture, N° compte,raison sociale, type ou service ">
        </div>
        @if (session('level') == 1)
           <a href="newfiche" class="btn btn-primary newf fw-bold">Nouvelle Fiche</a> 
        @endif
        
    </div>

    <div>
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
                                <a href="{{ url('show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Voir la fiche ">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if (session('level') == '1')
                                    <a href="{{ url('edit', $fiche) }}" class="btn btn-link {{ $editbtn }} "
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Modifier la fiche ">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif

                                <form action="{{ url('delete_fiche', $fiche) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-link" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Supprimer la fiche de la base des données "
                                        onclick="confirm('Etes vous sûr de supprimer la fiche ?') ? this.parentElement.submit() : ''">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
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
        <div class="d-flex justify-content-evenly">
            {{ $fiches->links() }}
        </div>

    </div>
</div>

<style>
    .cm6 {
        width: 80%;
    }
    .newf{
        height : 10%;
    }

</style>
