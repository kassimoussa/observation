@extends('layouts.app', ['page' => 'Statistique', 'pageSlug' => 'stats', 'sup' => ''])
@section('content')

    <div class="col mt-1">

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
            <div class="card-header  ">
                <ul class="nav nav-tabs nav-justified card-header-tabs" id="rentrees" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '01') {{ 'active' }} @else @endif"
                            href="#janvier" role="tab" aria-controls="janvier" aria-selected="true" > 
                            Janvier <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[1] }}
                              </span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '02') {{ 'active' }} @else @endif"
                            href="#fevrier" role="tab" aria-controls="fevrier" aria-selected="false" >
                            Février <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[2] }}
                            </span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '03') {{ 'active' }} @else @endif     "
                            href="#mars" role="tab" aria-controls="mars" aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[3] }}" --}}>Mars 
                            <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[3] }}
                              </span> 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '04') {{ 'active' }} @else @endif     "
                            href="#avril" role="tab" aria-controls="avril" aria-selected="false" {{-- data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Total = {{ $rentres[4] }}" --}}>Avril
                            <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[4] }}
                              </span> 
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '05') {{ 'active' }} @else @endif"
                            href="#mai" role="tab" aria-controls="mai" aria-selected="false" >Mai
                            <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[5] }}
                              </span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '06') {{ 'active' }} @else @endif"
                            href="#juin" role="tab" aria-controls="juin" aria-selected="false" >Juin
                            <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[6] }}
                              </span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '07') {{ 'active' }} @else @endif"
                            href="#juillet" role="tab" aria-controls="juillet" aria-selected="false" >Juillet 
                            <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[7] }}
                              </span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '08') {{ 'active' }} @else @endif"
                            href="#aout" role="tab" aria-controls="aout" aria-selected="false" >Août
                            <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[8] }}
                              </span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '09') {{ 'active' }} @else @endif"
                            href="#septembre" role="tab" aria-controls="septembre" aria-selected="false" >Septembre
                             <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[9] }}
                            </span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '10') {{ 'active' }} @else @endif"
                            href="#octobre" role="tab" aria-controls="octobre" aria-selected="false" >Octobre 
                            <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[10] }}
                            </span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '11') {{ 'active' }} @else @endif"
                            href="#novembre" role="tab" aria-controls="novembre" aria-selected="false" >Novembre 
                            <span class="position-absolute top-1 start-1   badge  bg-primary      ">
                                {{ $rentres[11] }}
                            </span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold @if (date('m') == '12') {{ 'active' }} @else @endif"
                            href="#decembre" role="tab" aria-controls="decembre" aria-selected="false" >Décembre 
                            <span class="position-absolute top-1 start-10   badge  bg-primary      ">
                                {{ $rentres[12] }}
                            </span> </a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content mt-3">
                    <div class="tab-pane @if (date('m') == '01') {{ 'active' }} @else @endif "
                        id="janvier" role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[1] }} </td>
                                    <td>{{ $internet[1] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[1] }} </td>
                                    <td>{{ $mobile[1] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[1] }} </td>
                                    <td>{{ $fix[1] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[1] }} </td>
                                    <td>{{ $fixmobile[1] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[1] }} </td>
                                    <td>{{ $internetfix[1] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[1] }} </td>
                                    <td>{{ $unk[1] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[1] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[1] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[1] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[1] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[1] }} </td> 
                                    <td rowspan="2">{{ $rentres[1] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[1] }} </td>
                                    <td colspan="4">{{ $ajustement[1] }} </td>
                                    <td colspan="4">{{ $occ[1] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover  " id="">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($janvier) && $janvier->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($janvier as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '02') {{ 'active' }} @else @endif" id="fevrier"
                        role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[2] }} </td>
                                    <td>{{ $internet[2] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[2] }} </td>
                                    <td>{{ $mobile[2] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[2] }} </td>
                                    <td>{{ $fix[2] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[2] }} </td>
                                    <td>{{ $fixmobile[2] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[2] }} </td>
                                    <td>{{ $internetfix[2] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[2] }} </td>
                                    <td>{{ $unk[2] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[2] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[2] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[2] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[2] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[2] }} </td> 
                                    <td rowspan="2">{{ $rentres[2] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[2] }} </td>
                                    <td colspan="4">{{ $ajustement[2] }} </td>
                                    <td colspan="4">{{ $occ[2] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($fevrier) && $fevrier->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($fevrier as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '03') {{ 'active' }} @else @endif" id="mars"
                        role="tabpanel">
                        <div class=" ">

                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[3] }} </td>
                                    <td>{{ $internet[3] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[3] }} </td>
                                    <td>{{ $mobile[3] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[3] }} </td>
                                    <td>{{ $fix[3] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[3] }} </td>
                                    <td>{{ $fixmobile[3] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[3] }} </td>
                                    <td>{{ $internetfix[3] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[3] }} </td>
                                    <td>{{ $unk[3] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[3] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[3] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[3] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[3] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[3] }} </td> 
                                    <td rowspan="2">{{ $rentres[3] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[3] }} </td>
                                    <td colspan="4">{{ $ajustement[3] }} </td>
                                    <td colspan="4">{{ $occ[3] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover  " id="display">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($mars) && $mars->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($mars as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '04') {{ 'active' }} @else @endif" id="avril"
                        role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[4] }} </td>
                                    <td>{{ $internet[4] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[4] }} </td>
                                    <td>{{ $mobile[4] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[4] }} </td>
                                    <td>{{ $fix[4] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[4] }} </td>
                                    <td>{{ $fixmobile[4] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[4] }} </td>
                                    <td>{{ $internetfix[4] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[4] }} </td>
                                    <td>{{ $unk[4] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[4] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[4] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[4] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[4] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[4] }} </td> 
                                    <td rowspan="2">{{ $rentres[4] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[4] }} </td>
                                    <td colspan="4">{{ $ajustement[4] }} </td>
                                    <td colspan="4">{{ $occ[4] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover display " id="display">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($avril) && $avril->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($avril as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '05') {{ 'active' }} @else @endif" id="mai"
                        role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[5] }} </td>
                                    <td>{{ $internet[5] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[5] }} </td>
                                    <td>{{ $mobile[5] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[5] }} </td>
                                    <td>{{ $fix[5] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[5] }} </td>
                                    <td>{{ $fixmobile[5] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[5] }} </td>
                                    <td>{{ $internetfix[5] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[5] }} </td>
                                    <td>{{ $unk[5] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[5] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[5] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[5] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[5] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[5] }} </td> 
                                    <td rowspan="2">{{ $rentres[5] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[5] }} </td>
                                    <td colspan="4">{{ $ajustement[5] }} </td>
                                    <td colspan="4">{{ $occ[5] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover  " id="">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($mai) && $mai->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($mai as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '06') {{ 'active' }} @else @endif" id="juin"
                        role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[6] }} </td>
                                    <td>{{ $internet[6] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[6] }} </td>
                                    <td>{{ $mobile[6] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[6] }} </td>
                                    <td>{{ $fix[6] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[6] }} </td>
                                    <td>{{ $fixmobile[6] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[6] }} </td>
                                    <td>{{ $internetfix[6] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[6] }} </td>
                                    <td>{{ $unk[6] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[6] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[6] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[6] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[6] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[6] }} </td> 
                                    <td rowspan="2">{{ $rentres[6] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[6] }} </td>
                                    <td colspan="4">{{ $ajustement[6] }} </td>
                                    <td colspan="4">{{ $occ[6] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($juin) && $juin->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($juin as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '07') {{ 'active' }} @else @endif"
                        id="juillet" role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[7] }} </td>
                                    <td>{{ $internet[7] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[7] }} </td>
                                    <td>{{ $mobile[7] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[7] }} </td>
                                    <td>{{ $fix[7] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[7] }} </td>
                                    <td>{{ $fixmobile[7] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[7] }} </td>
                                    <td>{{ $internetfix[7] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[7] }} </td>
                                    <td>{{ $unk[7] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[7] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[7] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[7] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[7] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[7] }} </td> 
                                    <td rowspan="2">{{ $rentres[7] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[7] }} </td>
                                    <td colspan="4">{{ $ajustement[7] }} </td>
                                    <td colspan="4">{{ $occ[7] }} </td> 
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
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($juillet) && $juillet->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($juillet as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '08') {{ 'active' }} @else @endif" id="aout"
                        role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[8] }} </td>
                                    <td>{{ $internet[8] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[8] }} </td>
                                    <td>{{ $mobile[8] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[8] }} </td>
                                    <td>{{ $fix[8] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[8] }} </td>
                                    <td>{{ $fixmobile[8] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[8] }} </td>
                                    <td>{{ $internetfix[8] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[8] }} </td>
                                    <td>{{ $unk[8] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[8] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[8] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[8] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[8] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[8] }} </td> 
                                    <td rowspan="2">{{ $rentres[8] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[8] }} </td>
                                    <td colspan="4">{{ $ajustement[8] }} </td>
                                    <td colspan="4">{{ $occ[8] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($aout) && $aout->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($aout as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '09') {{ 'active' }} @else @endif"
                        id="septembre" role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[9] }} </td>
                                    <td>{{ $internet[9] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[9] }} </td>
                                    <td>{{ $mobile[9] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[9] }} </td>
                                    <td>{{ $fix[9] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[9] }} </td>
                                    <td>{{ $fixmobile[9] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[9] }} </td>
                                    <td>{{ $internetfix[9] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[9] }} </td>
                                    <td>{{ $unk[9] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[9] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[9] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[9] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[9] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[9] }} </td> 
                                    <td rowspan="2">{{ $rentres[9] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[9] }} </td>
                                    <td colspan="4">{{ $ajustement[9] }} </td>
                                    <td colspan="4">{{ $occ[9] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($septembre) && $septembre->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($septembre as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '10') {{ 'active' }} @else @endif"
                        id="octobre" role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[10] }} </td>
                                    <td>{{ $internet[10] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[10] }} </td>
                                    <td>{{ $mobile[10] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[10] }} </td>
                                    <td>{{ $fix[10] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[10] }} </td>
                                    <td>{{ $fixmobile[10] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[10] }} </td>
                                    <td>{{ $internetfix[10] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[10] }} </td>
                                    <td>{{ $unk[10] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[10] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[10] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[10] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[10] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[10] }} </td> 
                                    <td rowspan="2">{{ $rentres[10] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[10] }} </td>
                                    <td colspan="4">{{ $ajustement[10] }} </td>
                                    <td colspan="4">{{ $occ[10] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($octobre) && $octobre->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($octobre as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '11') {{ 'active' }} @else @endif "
                        id="novembre" role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[11] }} </td>
                                    <td>{{ $internet[11] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[11] }} </td>
                                    <td>{{ $mobile[11] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[11] }} </td>
                                    <td>{{ $fix[11] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[11] }} </td>
                                    <td>{{ $fixmobile[11] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[11] }} </td>
                                    <td>{{ $internetfix[11] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[11] }} </td>
                                    <td>{{ $unk[11] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[11] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[11] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[11] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[11] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[11] }} </td> 
                                    <td rowspan="2">{{ $rentres[11] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[11] }} </td>
                                    <td colspan="4">{{ $ajustement[11] }} </td>
                                    <td colspan="4">{{ $occ[11] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($novembre) && $novembre->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($novembre as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

                    <div class="tab-pane @if (date('m') == '12') {{ 'active' }} @else @endif "
                        id="decembre" role="tabpanel">
                        <div class=" ">
                            <table class="table table-bordered border-dark " id="">
                                <tr class="table-dark text-center">
                                    <th>#</th>
                                    <th colspan="4">Dégrevement</th>
                                    <th colspan="4">Ajustement</th>
                                    <th colspan="4">OCC</th>
                                    <th>Total</th>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet</th>
                                    <td class="bg-success text-white">{{ $degrevement_i_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_i_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_i_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_i_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_i_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_i_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_i_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_i_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $occ_i_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_i_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_i_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_i_annule[12] }} </td>
                                    <td>{{ $internet[12] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_m_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_m_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_m_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_m_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_m_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_m_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_m_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_m_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $occ_m_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_m_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_m_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_m_annule[12] }} </td>
                                    <td>{{ $mobile[12] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_f_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_f_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_f_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_f_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_f_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_f_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_f_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_f_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $occ_f_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_f_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_f_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_f_annule[12] }} </td>
                                    <td>{{ $fix[12] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Fix-Mobile</th>
                                    <td class="bg-success text-white">{{ $degrevement_fm_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_fm_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_fm_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_fm_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fm_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_fm_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_fm_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_fm_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fm_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_fm_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_fm_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_fm_annule[12] }} </td>
                                    <td>{{ $fixmobile[12] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Internet-Fix</th>
                                    <td class="bg-success text-white">{{ $degrevement_if_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_if_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_if_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_if_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_if_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_if_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_if_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_if_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $occ_if_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_if_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_if_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_if_annule[12] }} </td>
                                    <td>{{ $internetfix[12] }} </td>
                                </tr>
                                <tr class="text-center ">
                                    <th class="table-secondary ">Neon</th>
                                    <td class="bg-success text-white">{{ $degrevement_unk_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_unk_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_unk_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_unk_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_unk_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_unk_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_unk_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_unk_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $occ_unk_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_unk_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_unk_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_unk_annule[12] }} </td>
                                    <td>{{ $unk[12] }} </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="table-secondary align-middle" rowspan="2">Total</th>
                                    <td class="bg-success text-white">{{ $degrevement_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $degrevement_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $degrevement_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $degrevement_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $ajustement_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $ajustement_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $ajustement_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $ajustement_annule[12] }} </td>
                                    <td class="bg-success text-white">{{ $occ_fav[12] }} </td>
                                    <td class="bg-danger text-white">{{ $occ_defav[12] }} </td>
                                    <td class="bg-white text-dark">{{ $occ_null[12] }} </td>
                                    <td class="bg-warning text-dark">{{ $occ_annule[12] }} </td> 
                                    <td rowspan="2">{{ $rentres[12] }} </td>
                                </tr>
                                <tr class="text-center "> 
                                    <td colspan="4">{{ $degrevement[12] }} </td>
                                    <td colspan="4">{{ $ajustement[12] }} </td>
                                    <td colspan="4">{{ $occ[12] }} </td> 
                                </tr>
                            </table>

                            <table class="display table table-bordered border-dark table-sm table-hover" id="">
                                <thead class="  table-dark text-center">
                                    <th scope="col">N° Fiche</th>
                                    <th scope="col">Nom du client</th>
                                    <th scope="col">N° Facture</th>
                                    <th scope="col">N° Compte</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Avis</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody class=" text-center">
                                    @if (!empty($decembre) && $decembre->count())
                                        @php
                                            $cnt = 1;
                                        @endphp

                                        @foreach ($decembre as $key => $fiche)
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
                                                <td class="bg-{{ $bg }} text-{{ $txt }}">
                                                    {{ $avis }}</td>
                                                <td class="td-actions ">
                                                    <a href="{{ url('fiches/show', $fiche) }}" class="btn btn-link"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Voir la fiche ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>{{-- <a href="{{ url('/edit', $fiche) }}" class="btn btn-link {{ $editbtn }}"
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

        .btn-dark {
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
            $(this).tab(fiches'show')
        });
    </script>

<script>
    $(document).ready(function() {
        $('display').DataTable( {
            "paging":   false, 
            "info":     false,
            /* "scrollY":        "600px",
            "scrollCollapse": true, */
            "filter": false
        } );
    } );
</script>
@endsection
