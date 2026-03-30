<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Modifier le service</title>
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


<!-- ICON + TITLE -->

<div class="text-center mb-8">

<div class="w-16 h-16 mx-auto rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">

<span class="material-icons text-3xl">
edit
</span>

</div>

<h2 class="text-2xl font-bold">
Modifier le service
</h2>

<p class="text-sm text-slate-500 mt-1">
Mettre a jour les informations du service
</p>

</div>



<!-- ERRORS -->

@if($errors->any())

<div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">

<ul class="text-sm text-red-600 space-y-1">

@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach

</ul>

</div>

@endif



<!-- FORM -->

<form action="{{ route('services.update',$service->id) }}" method="POST" class="space-y-6">

@csrf
@method('PUT')


<div>

<label class="block text-sm font-semibold text-slate-700 mb-2">
Division
</label>

<select name="division_id"
class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary">

@foreach($divisions as $division)

<option value="{{ $division->id }}"
{{ $service->division_id == $division->id ? 'selected' : '' }}>

{{ $division->name }}

</option>

@endforeach

</select>

</div>



<div>

<label class="block text-sm font-semibold text-slate-700 mb-2">
Nom du service
</label>

<input
type="text"
name="name"
value="{{ $service->name }}"
class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary"
required
>

</div>



<div>

<label class="block text-sm font-semibold text-slate-700 mb-2">
Code du service
</label>

<input
type="text"
name="code"
value="{{ $service->code }}"
class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary"
required
>

</div>



<div class="flex items-center gap-3">

<input
type="checkbox"
name="is_active"
value="1"
{{ $service->is_active ? 'checked' : '' }}
class="w-4 h-4 text-primary border-slate-300 rounded focus:ring-primary"
>

<label class="text-sm font-medium text-slate-700">
Service actif
</label>

</div>



<div class="flex gap-4 pt-4">


<button
type="submit"
class="flex-1 bg-primary text-white py-3 rounded-lg font-semibold hover:bg-primary/90">

Mettre a jour le service

</button>


<a
href="{{ route('services.index') }}"
class="flex-1 text-center py-3 rounded-lg font-semibold text-slate-600 hover:bg-slate-100">

Retour

</a>


</div>


</form>


</div>

</div>


</body>
</html>