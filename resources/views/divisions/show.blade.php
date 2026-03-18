<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Details de la division</title>

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<script>

tailwind.config = {
darkMode: "class",
theme: {
extend: {
colors: {
primary: "#1f003d",
"background-light": "#f6f6f8",
"background-dark": "#101622",
},
fontFamily: {
display: ["Public Sans"]
},
}
}
}

</script>

<style>

body{
font-family:"Public Sans",sans-serif;
}

.material-symbols-outlined{
font-variation-settings:'FILL'0,'wght'400,'GRAD'0,'opsz'24;
}

.material-symbols-outlined {
  font-family: 'Material Symbols Outlined';
  font-weight: normal;
  font-style: normal;
  font-size: 32px;
  display: inline-block;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  white-space: nowrap;
  direction: ltr;
}

</style>

</head>


<body class="bg-background-light min-h-screen flex items-center justify-center p-6">


<div class="w-full max-w-lg">


<div class="bg-white rounded-xl border border-slate-200 shadow-lg p-8">


<div class="text-center mb-8">

<div class="w-16 h-16 mx-auto rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
<span class="material-icons text-3xl">
account_tree
</span>
</div>

<h2 class="text-2xl font-bold">
Details de la division
</h2>

<p class="text-sm text-slate-500 mt-1">
Voir les informations de la division
</p>

</div>



<div class="space-y-4">


<div class="flex justify-between border-b pb-3">

<span class="text-slate-500 text-sm">
ID
</span>

<span class="font-semibold">
DIV-{{ $division->id }}
</span>

</div>



<div class="flex justify-between border-b pb-3">

<span class="text-slate-500 text-sm">
Nom de la division
</span>

<span class="font-semibold">
{{ $division->name }}
</span>

</div>



<div class="flex justify-between border-b pb-3">

<span class="text-slate-500 text-sm">
Code
</span>

<span class="font-semibold">
{{ $division->code }}
</span>

</div>



<div class="flex justify-between">

<span class="text-slate-500 text-sm">
Statut
</span>

@if($division->is_active)

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



<div class="pt-8 flex gap-3">


<a href="{{ route('divisions.edit',$division->id) }}"
class="flex-1 text-center py-2 bg-primary text-white font-semibold rounded-lg hover:bg-primary/90">

Modifier la division

</a>


<a href="{{ route('divisions.index') }}"
class="flex-1 text-center py-2 text-slate-600 font-semibold hover:bg-slate-100 rounded-lg">

Retour

</a>


</div>


</div>

</div>


</body>
</html>