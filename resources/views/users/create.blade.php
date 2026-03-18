<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Creer un utilisateur</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

<style>
body{
font-family:'Public Sans',sans-serif;
background:#f6f6f8;
}

.primary{
background:#1f003d;
}
</style>

</head>

<body>


<div class="min-h-screen flex items-center justify-center p-6">

<div class="bg-white shadow-xl rounded-xl w-full max-w-xl p-8">

<h2 class="text-2xl font-bold mb-6 text-center">
Creer un nouvel utilisateur
</h2>


@if($errors->any())

<div class="bg-red-100 text-red-700 p-4 rounded mb-4">

<ul class="list-disc pl-5">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif


<form action="{{ route('users.store') }}" method="POST" class="space-y-5">

@csrf


<!-- NAME -->

<div>

<label class="block text-sm font-semibold mb-1">
Nom
</label>

<input
type="text"
name="name"
class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-700"
required>

</div>



<!-- EMAIL -->

<div>

<label class="block text-sm font-semibold mb-1">
Email
</label>

<input
type="email"
name="email"
class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-700"
required>

</div>



<!-- PASSWORD -->

<div>

<label class="block text-sm font-semibold mb-1">
Mot de passe
</label>

<input
type="password"
name="password"
class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-700"
required>

</div>



<!-- CONFIRM PASSWORD -->

<div>

<label class="block text-sm font-semibold mb-1">
Confirmer le mot de passe
</label>

<input
type="password"
name="password_confirmation"
class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-700"
required>

</div>



<!-- SERVICE -->

<div>

<label class="block text-sm font-semibold mb-1">
Service
</label>

<select
name="service_id"
class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-700">

<option value="">-- Choisir un service --</option>

@foreach($services as $service)

<option value="{{ $service->id }}">
{{ $service->name }}
</option>

@endforeach

</select>

</div>



<!-- ROLE -->

<div>

<label class="block text-sm font-semibold mb-1">
Role
</label>

<select
name="role"
class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-700">

<option value="">-- Choisir un role --</option>

@foreach($roles as $role)

<option value="{{ $role->name }}">
{{ $role->name }}
</option>

@endforeach

</select>

</div>



<!-- BUTTONS -->

<div class="flex justify-between pt-4">

<a
href="{{ route('users.index') }}"
class="text-gray-600 hover:text-black">

Retour

</a>

<button
type="submit"
class="primary text-white px-6 py-2 rounded-lg hover:opacity-90 flex items-center gap-2">

<span class="material-symbols-outlined">
person_add
</span>

Creer un utilisateur

</button>

</div>


</form>

</div>

</div>

</body>
</html>