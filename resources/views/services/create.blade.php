<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer un service</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#1f003d",
                        background: "#f6f6f8"
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Public Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-background min-h-screen text-slate-900">

    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-xl bg-white border border-slate-200 rounded-2xl shadow-sm p-6">

            <div class="mb-6">
                <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">
                    Ajouter un service
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Creer un nouveau service et l'affecter a une division
                </p>
            </div>

            @if($errors->any())
                <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3">
                    <ul class="space-y-1 text-sm text-red-600">
                        @foreach($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('services.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Division
                    </label>
                    <select name="division_id" class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm outline-none focus:border-primary focus:ring-2 focus:ring-primary/10">
                        @foreach($divisions as $division)
                            <option value="{{ $division->id }}">
                                {{ $division->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Nom
                    </label>
                    @error('division_id')
                        <div class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" name="name" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-primary focus:ring-2 focus:ring-primary/10">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Code
                    </label>
                    <input type="text" name="code" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-primary focus:ring-2 focus:ring-primary/10">
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="bg-primary text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:opacity-95 transition">
                        Enregistrer
                    </button>

                    <a href="{{ route('services.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-sm font-medium hover:bg-slate-200 transition">
                        Retour
                    </a>
                </div>
            </form>

        </div>
    </div>

</body>
</html>