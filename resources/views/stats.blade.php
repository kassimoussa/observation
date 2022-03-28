@extends('layouts.app', ['page' => 'Statistique', 'pageSlug' => 'stats', 'sup' => ''])
@section('content')

    <div class="row mt-1"> 

        <div class="d-flex justify-content-between mt-3 mb-4">
            {{-- <h3 class="over-title mb-2">Statistique <span class="text-bold" id="title"> </span>
            </h3> --}}

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
                        <a class="nav-link fw-bold @if (date('m') == "01") {{ 'active' }} @else @endif" href="#janvier" role="tab" aria-controls="janvier"
                            aria-selected="true" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[1] }}" --}}>Janvier ({{ $rentres[1] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "02") {{ 'active' }} @else @endif" href="#fevrier" role="tab" aria-controls="fevrier"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[2] }}" --}}>Février ({{ $rentres[2] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "03") {{ 'active' }} @else @endif" href="#mars" role="tab" aria-controls="mars"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[3] }}" --}}>Mars ({{ $rentres[3] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "04") {{ 'active' }} @else @endif" href="#avril" role="tab" aria-controls="avril"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[4] }}" --}}>Avril ({{ $rentres[4] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "05") {{ 'active' }} @else @endif" href="#mai" role="tab" aria-controls="mai"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[5] }}" --}}>Mai ({{ $rentres[5] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "06") {{ 'active' }} @else @endif" href="#juin" role="tab" aria-controls="juin"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[6] }}" --}}>Juin ({{ $rentres[6] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "07") {{ 'active' }} @else @endif" href="#juillet" role="tab" aria-controls="juillet"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[7] }}" --}}>Juillet ({{ $rentres[7] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "08") {{ 'active' }} @else @endif" href="#aout" role="tab" aria-controls="aout"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[8] }}" --}}>Août ({{ $rentres[8] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "09") {{ 'active' }} @else @endif" href="#septembre" role="tab" aria-controls="septembre"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[9] }}" --}}>Septembre ({{ $rentres[9] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "10") {{ 'active' }} @else @endif" href="#octobre" role="tab" aria-controls="octobre"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[10] }}" --}}>Octobre ({{ $rentres[10] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "11") {{ 'active' }} @else @endif" href="#novembre" role="tab" aria-controls="novembre"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[11] }}" --}}>Novembre ({{ $rentres[11] }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == "12") {{ 'active' }} @else @endif" href="#decembre" role="tab" aria-controls="decembre"
                            aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[12] }}" --}}>Décembre ({{ $rentres[12] }})</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content mt-3">
                    <div class="tab-pane @if (date('m') == "01") {{ 'active' }} @else @endif " id="janvier" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[1] }} </td>
                                    <td>{{ $ajustement_i[1] }} </td>
                                    <td>{{ $occ_i[1] }} </td>
                                    <td>{{ $internet[1] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[1] }} </td>
                                    <td>{{ $ajustement_m[1] }} </td>
                                    <td>{{ $occ_m[1] }} </td>
                                   <td>{{ $mobile[1] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[1] }} </td>
                                    <td>{{ $ajustement_f[1] }} </td>
                                    <td>{{ $occ_f[1] }} </td>
                                   <td>{{ $fix[1] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[1] }} </td>
                                    <td>{{ $ajustement[1] }} </td>
                                    <td>{{ $occ[1] }} </td>
                                   <td>{{ $rentres[1] }}  </td>
                                </tr>
                            </table>
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "02") {{ 'active' }} @else @endif" id="fevrier" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[2] }} </td>
                                    <td>{{ $ajustement_i[2] }} </td>
                                    <td>{{ $occ_i[2] }} </td>
                                    <td>{{ $internet[2] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[2] }} </td>
                                    <td>{{ $ajustement_m[2] }} </td>
                                    <td>{{ $occ_m[2] }} </td>
                                   <td>{{ $mobile[2] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[2] }} </td>
                                    <td>{{ $ajustement_f[2] }} </td>
                                    <td>{{ $occ_f[2] }} </td>
                                   <td>{{ $fix[2] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[2] }} </td>
                                    <td>{{ $ajustement[2] }} </td>
                                    <td>{{ $occ[2] }} </td>
                                   <td>{{ $rentres[2] }}  </td>
                                </tr>
                            </table>
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "03") {{ 'active' }} @else @endif" id="mars" role="tabpanel">  
                        <div class=" "> 
                            
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[3] }} </td>
                                    <td>{{ $ajustement_i[3] }} </td>
                                    <td>{{ $occ_i[3] }} </td>
                                    <td>{{ $internet[3] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[3] }} </td>
                                    <td>{{ $ajustement_m[3] }} </td>
                                    <td>{{ $occ_m[3] }} </td>
                                   <td>{{ $mobile[3] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[3] }} </td>
                                    <td>{{ $ajustement_f[3] }} </td>
                                    <td>{{ $occ_f[3] }} </td>
                                   <td>{{ $fix[3] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[3] }} </td>
                                    <td>{{ $ajustement[3] }} </td>
                                    <td>{{ $occ[3] }} </td>
                                   <td>{{ $rentres[3] }}  </td>
                                </tr>
                            </table>
                            
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "04") {{ 'active' }} @else @endif" id="avril" role="tabpanel">  
                        <div class=" "> 
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[4] }} </td>
                                    <td>{{ $ajustement_i[4] }} </td>
                                    <td>{{ $occ_i[4] }} </td>
                                    <td>{{ $internet[4] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[4] }} </td>
                                    <td>{{ $ajustement_m[4] }} </td>
                                    <td>{{ $occ_m[4] }} </td>
                                   <td>{{ $mobile[4] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[4] }} </td>
                                    <td>{{ $ajustement_f[4] }} </td>
                                    <td>{{ $occ_f[4] }} </td>
                                   <td>{{ $fix[4] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[4] }} </td>
                                    <td>{{ $ajustement[4] }} </td>
                                    <td>{{ $occ[4] }} </td>
                                   <td>{{ $rentres[4] }}  </td>
                                </tr>
                            </table> 
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "05") {{ 'active' }} @else @endif" id="mai" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[5] }} </td>
                                    <td>{{ $ajustement_i[5] }} </td>
                                    <td>{{ $occ_i[5] }} </td>
                                    <td>{{ $internet[5] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[5] }} </td>
                                    <td>{{ $ajustement_m[5] }} </td>
                                    <td>{{ $occ_m[5] }} </td>
                                   <td>{{ $mobile[5] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[5] }} </td>
                                    <td>{{ $ajustement_f[5] }} </td>
                                    <td>{{ $occ_f[5] }} </td>
                                   <td>{{ $fix[5] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[5] }} </td>
                                    <td>{{ $ajustement[5] }} </td>
                                    <td>{{ $occ[5] }} </td>
                                   <td>{{ $rentres[5] }}  </td>
                                </tr>
                            </table>
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "06") {{ 'active' }} @else @endif" id="juin" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[6] }} </td>
                                    <td>{{ $ajustement_i[6] }} </td>
                                    <td>{{ $occ_i[6] }} </td>
                                    <td>{{ $internet[6] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[6] }} </td>
                                    <td>{{ $ajustement_m[6] }} </td>
                                    <td>{{ $occ_m[6] }} </td>
                                   <td>{{ $mobile[6] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[6] }} </td>
                                    <td>{{ $ajustement_f[6] }} </td>
                                    <td>{{ $occ_f[6] }} </td>
                                   <td>{{ $fix[6] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[6] }} </td>
                                    <td>{{ $ajustement[6] }} </td>
                                    <td>{{ $occ[6] }} </td>
                                   <td>{{ $rentres[6] }}  </td>
                                </tr>
                            </table>
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "07") {{ 'active' }} @else @endif" id="juillet" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[7] }} </td>
                                    <td>{{ $ajustement_i[7] }} </td>
                                    <td>{{ $occ_i[7] }} </td>
                                    <td>{{ $internet[7] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[7] }} </td>
                                    <td>{{ $ajustement_m[7] }} </td>
                                    <td>{{ $occ_m[7] }} </td>
                                   <td>{{ $mobile[7] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[7] }} </td>
                                    <td>{{ $ajustement_f[7] }} </td>
                                    <td>{{ $occ_f[7] }} </td>
                                   <td>{{ $fix[7] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[7] }} </td>
                                    <td>{{ $ajustement[7] }} </td>
                                    <td>{{ $occ[7] }} </td>
                                   <td>{{ $rentres[7] }}  </td>
                                </tr>
                            </table>
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "08") {{ 'active' }} @else @endif" id="aout" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[8] }} </td>
                                    <td>{{ $ajustement_i[8] }} </td>
                                    <td>{{ $occ_i[8] }} </td>
                                    <td>{{ $internet[8] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[8] }} </td>
                                    <td>{{ $ajustement_m[8] }} </td>
                                    <td>{{ $occ_m[8] }} </td>
                                   <td>{{ $mobile[8] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[8] }} </td>
                                    <td>{{ $ajustement_f[8] }} </td>
                                    <td>{{ $occ_f[8] }} </td>
                                   <td>{{ $fix[8] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[8] }} </td>
                                    <td>{{ $ajustement[8] }} </td>
                                    <td>{{ $occ[8] }} </td>
                                   <td>{{ $rentres[8] }}  </td>
                                </tr>
                            </table>
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "09") {{ 'active' }} @else @endif" id="septembre" role="tabpanel">  
                        <div class=" "> 
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[9] }} </td>
                                    <td>{{ $ajustement_i[9] }} </td>
                                    <td>{{ $occ_i[9] }} </td>
                                    <td>{{ $internet[9] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[9] }} </td>
                                    <td>{{ $ajustement_m[9] }} </td>
                                    <td>{{ $occ_m[9] }} </td>
                                   <td>{{ $mobile[9] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[9] }} </td>
                                    <td>{{ $ajustement_f[9] }} </td>
                                    <td>{{ $occ_f[9] }} </td>
                                   <td>{{ $fix[9] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[9] }} </td>
                                    <td>{{ $ajustement[9] }} </td>
                                    <td>{{ $occ[9] }} </td>
                                   <td>{{ $rentres[9] }}  </td>
                                </tr>
                            </table> 
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "10") {{ 'active' }} @else @endif" id="octobre" role="tabpanel">  
                        <div class=" ">  
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[10] }} </td>
                                    <td>{{ $ajustement_i[10] }} </td>
                                    <td>{{ $occ_i[10] }} </td>
                                    <td>{{ $internet[10] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[10] }} </td>
                                    <td>{{ $ajustement_m[10] }} </td>
                                    <td>{{ $occ_m[10] }} </td>
                                   <td>{{ $mobile[10] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[10] }} </td>
                                    <td>{{ $ajustement_f[10] }} </td>
                                    <td>{{ $occ_f[10] }} </td>
                                   <td>{{ $fix[10] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[10] }} </td>
                                    <td>{{ $ajustement[10] }} </td>
                                    <td>{{ $occ[10] }} </td>
                                   <td>{{ $rentres[10] }}  </td>
                                </tr>
                            </table>
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "11") {{ 'active' }} @else @endif " id="novembre" role="tabpanel">  
                        <div class=" "> 
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[11] }} </td>
                                    <td>{{ $ajustement_i[11] }} </td>
                                    <td>{{ $occ_i[11] }} </td>
                                    <td>{{ $internet[11] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[11] }} </td>
                                    <td>{{ $ajustement_m[11] }} </td>
                                    <td>{{ $occ_m[11] }} </td>
                                   <td>{{ $mobile[11] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[11] }} </td>
                                    <td>{{ $ajustement_f[11] }} </td>
                                    <td>{{ $occ_f[11] }} </td>
                                   <td>{{ $fix[11] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[11] }} </td>
                                    <td>{{ $ajustement[11] }} </td>
                                    <td>{{ $occ[11] }} </td>
                                   <td>{{ $rentres[11] }}  </td>
                                </tr>
                            </table> 
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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

                    <div class="tab-pane @if (date('m') == "12") {{ 'active' }} @else @endif " id="decembre" role="tabpanel">  
                        <div class=" "> 
                            <table class="table table-bordered border-primary " id="">
                                <tr class="table-dark ">
                                    <th>#</th>
                                    <th>Dégrevement</th>
                                    <th>Ajustement</th>
                                    <th>OCC</th> 
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Internet</th>
                                    <td>{{ $degrevement_i[12] }} </td>
                                    <td>{{ $ajustement_i[12] }} </td>
                                    <td>{{ $occ_i[12] }} </td>
                                    <td>{{ $internet[12] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Mobile</th>
                                    <td>{{ $degrevement_m[12] }} </td>
                                    <td>{{ $ajustement_m[12] }} </td>
                                    <td>{{ $occ_m[12] }} </td>
                                   <td>{{ $mobile[12] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Fix</th>
                                    <td>{{ $degrevement_f[12] }} </td>
                                    <td>{{ $ajustement_f[12] }} </td>
                                    <td>{{ $occ_f[12] }} </td>
                                   <td>{{ $fix[12] }}  </td>
                                </tr>
                                <tr>
                                    <th class="table-dark ">Total</th>
                                    <td>{{ $degrevement[12] }} </td>
                                    <td>{{ $ajustement[12] }} </td>
                                    <td>{{ $occ[12] }} </td>
                                   <td>{{ $rentres[12] }}  </td>
                                </tr>
                            </table> 
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
                                                    </a>{{-- 
                                                    <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voir la fiche "
                                                        {{ $editbtn }}>
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
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
