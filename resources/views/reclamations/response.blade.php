<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<title>Ajouter une reponse</title>

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

<div class="bg-white shadow-lg rounded-xl border border-slate-200 p-8">


<h1 class="text-2xl font-bold mb-6 flex items-center gap-2">

<span class="material-icons text-primary">reply</span>

Ajouter une reponse

</h1>


@if($errors->any())

<div class="mb-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg">

<ul class="list-disc pl-5">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif



<form method="POST"
action="{{ route('reclamations.response.store', $reclamation->id) }}"
enctype="multipart/form-data"
class="space-y-5">

@csrf



<div>

<label class="block text-sm font-semibold text-slate-600 mb-1">

Texte de la reponse

</label>

<textarea
id="response_text"
name="response_text"
class="w-full border-slate-200 rounded-lg">

{{ old('response_text') }}

</textarea>

</div>



<div>

<label class="block text-sm font-semibold text-slate-600 mb-2">

Piece jointe

</label>

<label
class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-slate-300 rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition">

<div class="flex flex-col items-center justify-center pt-5 pb-6">

<span class="material-icons text-slate-400 text-3xl mb-2">
attach_file
</span>

<p class="text-sm text-slate-500">
Cliquer pour televerser un fichier
</p>

<p class="text-xs text-slate-400">
PDF, DOC, PNG, JPG
</p>

</div>

<input
type="file"
name="attachment"
class="hidden"
id="attachment">

</label>

<p id="file-name" class="text-xs text-slate-500 mt-2"></p>

</div>



<div class="flex justify-between pt-4">

<a href="{{ route('reclamations.show',$reclamation->id) }}"
class="px-4 py-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-100 flex items-center gap-1">

<span class="material-icons text-[18px]">arrow_back</span>

Retour

</a>


<button type="submit"
class="px-6 py-2 bg-primary text-white rounded-lg flex items-center gap-2 hover:bg-primary/90">

<span class="material-icons text-[18px]">save</span>

Enregistrer la reponse

</button>

</div>


</form>


</div>

</div>



<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>

<script>

tinymce.init({

selector:'#response_text',

height:180,

menubar:false,

toolbar:'bold italic underline | bullist numlist | link | undo redo',

statusbar:false

});

</script>

<script>

document.getElementById('attachment').addEventListener('change', function(){

let fileName = this.files[0]?.name;

if(fileName){
document.getElementById('file-name').innerText = "Fichier selectionne : " + fileName;
}

});

</script>
</body>
</html>