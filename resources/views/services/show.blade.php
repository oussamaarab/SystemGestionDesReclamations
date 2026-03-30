<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Details du service</title>
<link rel="icon" type="image/png" href="{{ asset('myicon.png') }}">
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


<body class="bg-background-light min-h-screen flex items-center justify-center p-6">


<div class="w-full max-w-xl">


<div class="bg-white border border-slate-200 rounded-xl shadow-lg p-8">


<!-- ICON -->

<div class="text-center mb-8">

<div class="w-16 h-16 mx-auto rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">

<span class="material-icons text-3xl">
settings
</span>

</div>

<h2 class="text-2xl font-bold">
Details du service
</h2>

<p class="text-sm text-slate-500 mt-1">
Voir les informations du service
</p>

</div>



<!-- DATA -->

<div class="space-y-4">


<div class="flex justify-between border-b pb-3">

<span class="text-slate-500 text-sm">
ID
</span>

<span class="font-semibold">
SRV-{{ $service->id }}
</span>

</div>


<div class="flex justify-between border-b pb-3">

<span class="text-slate-500 text-sm">
Division
</span>

<span class="font-semibold">
{{ $service->division->name }}
</span>

</div>


<div class="flex justify-between border-b pb-3">

<span class="text-slate-500 text-sm">
Nom du service
</span>

<span class="font-semibold">
{{ $service->name }}
</span>

</div>


<div class="flex justify-between border-b pb-3">

<span class="text-slate-500 text-sm">
Code
</span>

<span class="font-semibold">
{{ $service->code }}
</span>

</div>


<div class="flex justify-between">

<span class="text-slate-500 text-sm">
Statut
</span>

@if($service->is_active)

<span class="px-3 py-1 text-xs font-bold bg-green-100 text-green-700 rounded-full">
Actif
</span>

@else

<span class="px-3 py-1 text-xs font-bold bg-gray-100 text-gray-600 rounded-full">
Inactif
</span>

@endif

</div>


</div>



<!-- BUTTONS -->

<div class="pt-8 flex gap-3">

@can('manage_services')
<a href="{{ route('services.edit',$service->id) }}"
class="flex-1 text-center py-3 bg-primary text-white font-semibold rounded-lg hover:bg-primary/90">

Modifier le service

</a>
@endcan


{{-- <a href="{{ auth()->user()->can('manage_services') ? route('services.index') : route('services.my') }}"
class="flex-1 text-center py-3 text-slate-600 font-semibold hover:bg-slate-100 rounded-lg">

Back

</a> --}}
<a href="{{ url()->previous() }}"
class="flex-1 text-center py-3 text-slate-600 font-semibold hover:bg-slate-100 rounded-lg">
    Retour
</a>


</div>


</div>

</div>


</body>
</html>