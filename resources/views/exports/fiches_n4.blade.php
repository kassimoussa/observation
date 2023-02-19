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
        <th>A</th>
        <th>TO</th>
        <th>Creation</th>
        <th>Dernière modif</th>
     </tr>
     @foreach ($fiches as $key => $fiche)
     @php
         $avis = $fiche->avis_nv2;
         $bg = 'white';
         $txt = 'white';
         $text = '';
         if ($avis == null) {
             $avis = "Pas d'avis";
             $txt = 'dark';
         } elseif ($avis == 'OK') {
             $bg = 'success';
             $avis = 'Favorable';
         } elseif ($avis == 'NO') {
             $bg = 'danger';
             $avis = 'Défavorable';
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
         <td>{{ $fiche->mont_facture }}</td>
         <td>{{ $avis }}</td>
         <td>{{ $fiche->status }} </td>
         <td>{{ strtoupper($fiche->trans) }}</td>
         <td>{{ strtoupper($fiche->assignedto) }}</td>
         <td>{{ $fiche->created_at->format('d/m/Y') }}</td>
         <td>{{ $fiche->updated_at->format('d/m/Y') }}</td>
     </tr>
     @endforeach
 </table>