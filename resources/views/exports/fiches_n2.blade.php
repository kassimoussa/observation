 <style>
     table,
     th,
     td {
         border: 1px solid black;
         border-collapse: collapse;
     }
 </style>

 <table>
     <tr>
        <th>N° Fiche</th>
        <th>Nom du client</th>
        <th>N° Facture</th>
        <th>N° Compte</th>
        <th>Type</th>
        <th>Service</th>
        <th>Montant (DJF)</th>
        <th>Avis</th>
        <th>Status</th>
        <th>TO</th>
        <th>Creation</th>
        <th>Dernière modif</th>
     </tr>
     @foreach ($fiches as $key => $fiche)
     @php
         $avis = $fiche->avis_nv2;
         $commente = $fiche->obs_nv2;
         $status = $fiche->status;
         $color_avis = 'white';
         $color_status = 'white';
         $editbtn = '';
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
         
         if ($status == 'Cloturé') {
             $color_status = 'bg-success text-dark';
         } elseif ($status == 'Rejeté') {
             $color_status = 'bg-danger text-white';
         } else {
             $color_status = 'bg-white text-dark';
         }
         
         if ($commente == null) {
             $commente = 'Non';
         } else {
             $commente = 'Oui';
         }
     @endphp
     <tr>
         <td>{{ $fiche->id }}</td>
         <td>{{ $fiche->nom_client }}</td>
         <td>{{ $fiche->num_facture }}</td>
         <td>{{ $fiche->num_compte }}</td>
         <td>{{ $fiche->type }}</td>
         <td>{{ $fiche->service }}</td>
         <td>{{ $fiche->mont_facture }}</td> 
         <td>{{ $avis }}</td>
         <td>{{ $status }}</td>
         <td>{{ strtoupper($fiche->assignedto) }}</td>
         <td>{{ $fiche->created_at->format('d/m/Y') }}</td>
         <td>{{ $fiche->updated_at->format('d/m/Y') }}</td>
     </tr>
     @endforeach
 </table>