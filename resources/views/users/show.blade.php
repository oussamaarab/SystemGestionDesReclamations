<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<title>Details de l'utilisateur</title>
<link rel="icon" type="image/png" href="{{ asset('myicon.png') }}">
<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

<style>

body{
font-family:'Public Sans',sans-serif;
background:#f5f6fa;
}

.primary{
background:#1f003d;
}

</style>

</head>

<body>


<div class="min-h-screen flex items-center justify-center p-8">


<!-- CARD -->

<div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-xl">


<div class="flex flex-col items-center mb-6">

<div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center">

<span class="material-symbols-outlined text-gray-500 text-4xl">
person
</span>

</div>

<h2 class="text-xl font-semibold mt-4">
{{ $user->name }}
</h2>

<p class="text-gray-500 text-sm">
{{ $user->email }}
</p>

</div>


<hr class="mb-6">


<div class="space-y-4 text-sm">


<div class="flex justify-between">

<span class="text-gray-500">ID utilisateur</span>

<span class="font-medium">
USR-{{ $user->id }}
</span>

</div>


<div class="flex justify-between">

<span class="text-gray-500">Service</span>

<span class="font-medium">
{{ $user->service?->name ?? '-' }}
</span>

</div>


<div class="flex justify-between">

<span class="text-gray-500">Role</span>

<span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-lg text-xs font-semibold">

{{ $user->roles->first()?->name }}

</span>

</div>


<div class="flex justify-between">

<span class="text-gray-500">Statut</span>

@if($user->is_active)

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
Actif
</span>

@else

<span class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">
Inactif
</span>

@endif

</div>


</div>



<!-- BUTTONS -->

<div class="flex justify-between mt-8">


<a href="{{ route('users.edit',$user->id) }}"
class="primary text-white px-5 py-2 rounded-lg flex items-center gap-2">

<span class="material-symbols-outlined">
edit
</span>

Modifier l'utilisateur

</a>


<a href="{{ route('users.index') }}"
class="text-gray-600 hover:text-black">

Retour

</a>

</div>


</div>


</div>


</body>
</html>