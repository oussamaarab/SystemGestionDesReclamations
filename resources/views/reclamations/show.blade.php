<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Details de la reclamation</title>

<script src="https://cdn.tailwindcss.com?plugins=forms"></script>

<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script>
tailwind.config = {
theme:{
extend:{
colors:{
primary:"#1f003d",
"background-light":"#f6f6f8"
},
fontFamily:{
display:["Public Sans"]
}
}
}
}
</script>

<style>
body{
font-family:"Public Sans",sans-serif;
}
</style>

</head>


<body class="bg-background-light min-h-screen p-8 font-display">


<div class="max-w-5xl mx-auto">


@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
{{ session('success') }}
</div>
@endif



<div class="bg-white border border-slate-200 rounded-xl shadow p-8">


<div class="flex items-center justify-between mb-6">

<h1 class="text-2xl font-bold">
Details de la reclamation
</h1>

<a href="{{ route('reclamations.index') }}"
class="flex items-center gap-1 text-slate-600 hover:text-primary">

<span class="material-icons text-[18px]">arrow_back</span>
Retour

</a>

</div>



<div class="grid grid-cols-2 gap-6 text-sm">


<div>
<span class="text-slate-500">Reference</span>
<p class="font-semibold">{{ $reclamation->reference }}</p>
</div>


<div>
<span class="text-slate-500">Date de depot</span>
<p class="font-semibold">{{ $reclamation->depot_date }}</p>
</div>


<div>
<span class="text-slate-500">Citoyen</span>
<p class="font-semibold">{{ $reclamation->citizen_fullname }}</p>
</div>


<div>
<span class="text-slate-500">Telephone</span>
<p class="font-semibold">{{ $reclamation->citizen_phone }}</p>
</div>


<div>
<span class="text-slate-500">CIN</span>
<p class="font-semibold">{{ $reclamation->citizen_cin }}</p>
</div>


<div>
<span class="text-slate-500">Sujet</span>
<p class="font-semibold">{{ $reclamation->subject }}</p>
</div>


<div class="col-span-2">
<span class="text-slate-500">Description</span>
<p class="mt-1">{{ $reclamation->description }}</p>
</div>


<div>
<span class="text-slate-500">Statut</span>

@if($reclamation->status == 'affecte')
<span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">
Affecte
</span>

@elseif($reclamation->status == 'en cours de traite')
<span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">
En cours de traite
</span>

@elseif($reclamation->status == 'traite')
<span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">
Traite
</span>
@endif

</div>


@if($reclamation->scan_path)
<div>
<a href="{{ asset('storage/'.$reclamation->scan_path) }}"
target="_blank"
class="text-primary hover:underline">

<span class="material-icons text-[18px] align-middle">description</span>
Voir le scan

</a>
</div>
@endif


</div>



<div class="flex gap-4 mt-8 flex-wrap">


@can('assign_reclamations')
<a href="{{ route('reclamations.assign',$reclamation->id) }}"
class="bg-primary text-white px-4 py-2 rounded-lg flex items-center gap-2">

<span class="material-icons text-[18px]">assignment_ind</span>
Affecter

</a>
@endcan


@can('transfer_reclamations')
<a href="{{ route('reclamations.transfer',$reclamation->id) }}"
class="bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">

<span class="material-icons text-[18px]">swap_horiz</span>
Transferer

</a>
@endcan


@can('respond_reclamations')
<a href="{{ route('reclamations.response',$reclamation->id) }}"
class="bg-green-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">

<span class="material-icons text-[18px]">reply</span>
Ajouter une reponse

</a>
@endcan


</div>


</div>



<div class="mt-8 bg-white border border-slate-200 rounded-xl overflow-hidden">

<div class="p-4 border-b font-semibold">
Historique des affectations
</div>

<table class="w-full text-sm">

<thead class="bg-slate-50 text-slate-500 text-xs uppercase">

<tr>
<th class="px-4 py-3">De la division</th>
<th class="px-4 py-3">Du service</th>
<th class="px-4 py-3">Vers la division</th>
<th class="px-4 py-3">Vers le service</th>
<th class="px-4 py-3">Commentaire</th>
<th class="px-4 py-3">Affecte par</th>
<th class="px-4 py-3">Date</th>
</tr>

</thead>

<tbody class="divide-y">

@forelse($reclamation->assignments as $assignment)

<tr>

<td class="px-4 py-3">{{ $assignment->fromDivision->name ?? '-' }}</td>
<td class="px-4 py-3">{{ $assignment->fromService->name ?? '-' }}</td>
<td class="px-4 py-3">{{ $assignment->toDivision->name ?? '-' }}</td>
<td class="px-4 py-3">{{ $assignment->toService->name ?? '-' }}</td>
<td class="px-4 py-3">{!! $assignment->comment !!}</td>
<td class="px-4 py-3">{{ $assignment->assignedBy->name ?? '-' }}</td>
<td class="px-4 py-3">{{ $assignment->assigned_at }}</td>

</tr>

@empty

<tr>
<td colspan="7" class="text-center py-4 text-slate-500">
Aucune affectation trouvee
</td>
</tr>

@endforelse

</tbody>

</table>

</div>



<div class="mt-10 bg-white rounded-xl shadow border border-slate-200 overflow-hidden">

<div class="px-6 py-4 border-b border-slate-200">
<h2 class="text-lg font-semibold">Historique des reponses</h2>
</div>

<div class="overflow-x-auto">

<table class="w-full text-sm">

<thead class="bg-slate-50 text-slate-500 uppercase text-xs">

<tr>
<th class="px-6 py-4 text-left">Reponse</th>
<th class="px-6 py-4 text-left">Fichier</th>
<th class="px-6 py-4 text-left">Repondu par</th>
<th class="px-6 py-4 text-left">Date</th>
</tr>

</thead>

<tbody class="divide-y divide-slate-100">

@forelse($reclamation->responses as $response)

<tr class="hover:bg-slate-50 transition">

<td class="px-6 py-4 text-slate-700">
{!! $response->response_text !!}

</td>

<td class="px-6 py-4">

@if($response->response_file_path)

<a href="{{ asset('storage/'.$response->response_file_path) }}"
target="_blank"
class="inline-flex items-center gap-1 text-primary font-medium hover:underline">

<span class="material-icons text-[16px]">description</span>
Voir le fichier

</a>

@else

<span class="text-slate-400">-</span>

@endif

</td>

<td class="px-6 py-4 font-medium text-slate-700">
{{ $response->respondedBy->name ?? '-' }}
</td>

<td class="px-6 py-4 text-slate-500">
{{ $response->responded_at }}
</td>

</tr>

@empty

<tr>
<td colspan="4" class="text-center py-6 text-slate-400">
Aucune reponse trouvee
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</body>
</html>