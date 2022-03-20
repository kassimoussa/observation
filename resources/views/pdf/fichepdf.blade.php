@php
use App\Models\Direction;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche</title>

    <style>
        body {
            max-width: 900px;
            margin: auto;
        }

        .card {

            border: 1px solid;

        }


        /* Add some padding inside the card container */
        .container {
            margin-top: auto;
            margin-left: 10px;
            margin-bottom: 20px;
        }

        .title {
            text-align: center;
            border: 1px solid;
        }

        .date {
            text-align: right;
        }

        .card-title {
            text-align: center;
        }

        .row {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .row label {
            display: inline-block;
            padding: 5px;
        }

        .sign {
            justify-content: space-around;
            margin-bottom: 10px;
        }

        .fact {
            display: flex;
            justify-content: space-between;
        }

        label {
            font-size: 18px;
        }

        .input-group {
            display: flex;
            align-content: stretch;
            margin-bottom: 2px;
        }

        .input-group>input {
            flex: 1 0 auto;
        }

        .right {
            float: right;
        }

        .left {
            float: left;
        }

        .flex {
            padding-bottom: 10px;
        }

        img {
            float: left;
            margin-right: 8px;
            width: 150px;
            height: 150px;
        }

        .col {
            margin-bottom: 5px;
        }

        .table,
        .td,
        .th {
            border: 1px solid black;
        }

        th {
            text-align: left;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            font-size: 18px;
        }

        .tt,
        th {
            font-size: 18px;
            font-weight: bold;
        }

        .bold {
            font-weight: bold;
        }

        p {
            font-weight: bold;
            font-size: 18px;
            padding: 5px;
        }

        .split-para {
            display: block;
            margin: 10px;
        }

        .split-para span {
            display: block;
            float: right;
            width: 50%;
            margin-left: 10px;
        }

    </style>
</head>

<body>
    <div>
        <div>
            <img src="{{ url('/dtlogo.png') }}" alt="">
            <h3 style="padding : 0; margin : 0;"><br>DIRECTION DES SYSTEMES D'INFORMATION <br>
                DIVISION OPERATION SI<br>
                SERVICE FACTURATION </h3>
            <h4 style="padding : 0; margin : 0;">Email: abdoulkader_osman@intnet.dj <br>
                Tél: 21321700/21351723 <br>
            </h4>
        </div>
        <br> <br> <br>
        <div></div>
        <div class="sign">
            <h4 class="left">N° {{ $fiche->id }}</h4>
            <h4 class="right"> le {{ date('d/m/Y') }} </h4>
        </div>
        <br>

        <h2 style="text-align: center; border: 1px solid ;">FICHE D'OBSERVATION </h2>


        <div class="card">
            <div style="text-align: center; border-bottom: 1px solid ;">
                <h3>INFORMATION DU CLIENT </h3>
            </div>

            <div class="container">
                <br>
                <div class="col mb-2">
                    <table>
                        <tbody>
                            <tr>
                                <td class="tt">NOM ou RAISON SOCIALE : </td>
                                <td class="tc"> {{ $fiche->nom_client }}</td>
                            </tr>
                            <tr>
                                <td class="tt">Adresse : </td>
                                <td class="tc"> {{ $fiche->adresse_client }}</td>
                            </tr>
                            <tr>
                                <td class="tt">N° COMPTE : </td>
                                <td class="tc"> {{ $fiche->num_compte }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br>

        <table 
            cellpadding="5"
            cellspacing="0"
            border="0"
            width="100%"
        >
            <tr>
                <td align="left"><b><span style="text-decoration: underline"> PROPOSITION DC :</span> </b>{{ $fiche->type }}</td>
                <td align="right"><b><span style="text-decoration: underline">Service :</span>  </b>{{ $fiche->service }}</td>
            </tr> 
        </table>
        <br>
        
{{--         <h3><span style="text-decoration: underline"> PROPOSITION DC :  </span>{{ $fiche->type }}  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="text-decoration: underline">Service :  </span> {{ $fiche->service }} </h3>
 --}}
        <div class="card  ">

            <table 
            cellpadding="5"
            cellspacing="0"
            border="0"
            width="100%"
        >
            <tr>
                <td align="left"><b><span> Facture N°</span> </b>{{ $fiche->num_facture }}</td>
                <td align="right"><b><span>Montant TTC :</span>  </b>{{ $fiche->mont_facture }} FDJ</td>
            </tr> 
        </table>  
        </div>

        <br>

        <h4 style="text-decoration: underline"> OBSERVATION CHEF DE SERVICE FACTURATION </h4>

        <div class="card">
            <p> {{ $fiche->obs_cs_facturation }}</p>
        </div>

        <br>

        <h4 style="text-decoration: underline"> Avis ET OBSERVATION CHEF DE DIVISION SI </h4>

        <div class="card">
            <p>{{ $fiche->obs_cd_si }}</p>
        </div>

    </div>



</body>

</html>
