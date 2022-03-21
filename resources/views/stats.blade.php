@extends('layouts.app', ['page' => 'Statistique', 'pageSlug' => 'stats', 'sup' => ''])
@section('content')

    <div class="row mt-3"> 

        <div class="d-flex justify-content-between mt-3 mb-4">
            <h3 class="over-title mb-2">Statistique <span class="text-bold" id="title"> </span>
            </h3>

            {{-- <form action="allrentreeby" method="post">
                @csrf
                <select name="annee" id="list" onchange="this.form.submit()" class="  form-group float-end mb-2 ">
                    <option disabled="disabled">Choisir une année</option>
                    <option selected="true" value="ALL" @if ('ALL' == $annee) selected="selected" @endif>Tout
                    </option>
                    <option value="2021" @if ('2021' == $annee) selected="selected" @endif>2022 </option>
                    <option value="2023" @if ('2023' == $annee) selected="selected" @endif>2023 </option>
                    <option value="2024" @if ('2024' == $annee) selected="selected" @endif>2024 </option>

                </select>
            </form> --}}

        </div> 
        <br>

        <div class="card mb-4 ccal ">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="rentrees" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="#janvier" role="tab" aria-controls="janvier"
                            aria-selected="true" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[1] }}" --}}>Janvier ({{ $rentres[1] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#fevrier" role="tab" aria-controls="fevrier"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[2] }}" --}}>Février ({{ $rentres[2] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#mars" role="tab" aria-controls="mars"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[3] }}" --}}>Mars ({{ $rentres[3] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#avril" role="tab" aria-controls="avril"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[4] }}" --}}>Avril ({{ $rentres[4] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#mai" role="tab" aria-controls="mai"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[5] }}" --}}>Mai ({{ $rentres[5] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#juin" role="tab" aria-controls="juin"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[6] }}" --}}>Juin ({{ $rentres[6] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#juillet" role="tab" aria-controls="juillet"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[7] }}" --}}>Juillet ({{ $rentres[7] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#aout" role="tab" aria-controls="aout"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[8] }}" --}}>Août ({{ $rentres[8] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#septembre" role="tab" aria-controls="septembre"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[9] }}" --}}>Septembre ({{ $rentres[9] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#octobre" role="tab" aria-controls="octobre"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[10] }}" --}}>Octobre ({{ $rentres[10] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#novembre" role="tab" aria-controls="novembre"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[11] }}" --}}>Novembre ({{ $rentres[11] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#decembre" role="tab" aria-controls="decembre"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[12] }}" --}}>Décembre ({{ $rentres[12] }})</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content mt-3">
                    <div class="tab-pane active" id="janvier" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($janvier) && $janvier->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($janvier as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="fevrier" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($fevrier) && $fevrier->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($fevrier as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="mars" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($mars) && $mars->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($mars as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="avril" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($avril) && $avril->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($avril as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="mai" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($mai) && $mai->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($mai as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="juin" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($juin) && $juin->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($juin as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="juillet" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($juillet) && $juillet->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($juillet as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="aout" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($aout) && $aout->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($aout as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="septembre" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($septembre) && $septembre->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($septembre as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="octobre" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($octobre) && $octobre->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($octobre as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane " id="novembre" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($novembre) && $novembre->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($novembre as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane " id="decembre" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
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
                                    @if (!empty($decembre) && $decembre->count())
                                        @php
                                            $cnt = 1;
                                        @endphp
                
                                        @foreach ($decembre as $key => $fiche)
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
                                                    <a href="{{ url('/show', $fiche) }}" class="btn btn-link" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $cnt = $cnt + 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">Aucune fiche trouvée pour ce mois.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>


 
 
                </div>
            </div>
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

        .iput {
            background: white !important;
        }

        .cbox {}

    </style>

<script>
    $('#rentrees a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    }); 
</script>
@endsection
