<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<title>Transfer Reclamation</title>

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

<span class="material-icons text-primary">swap_horiz</span>

Transfer Reclamation

</h1>



<form method="POST"
action="{{ route('reclamations.transfer.store', $reclamation->id) }}"
class="space-y-5">

@csrf

@if ($errors->any())
<div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-red-600">
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
</div>
@endif

<div>

<label class="block text-sm font-semibold text-slate-600 mb-1">

Division

</label>

<select name="division_id"
id="division"
class="w-full border-slate-200 rounded-lg">

<option value="">

</option>

@foreach($divisions as $division)

<option value="{{ $division->id }}">
{{ $division->name }}
</option>

@endforeach

</select>

</div>



<div>

<label class="block text-sm font-semibold text-slate-600 mb-1">

Service

</label>

<select name="service_id"
id="service"
class="w-full border-slate-200 rounded-lg">

<option value="">

</option>

@foreach($services as $service)

<option value="{{ $service->id }}"
data-division="{{ $service->division_id }}">

{{ $service->name }}

</option>

@endforeach

</select>

</div>



<div>

<label class="block text-sm font-semibold text-slate-600 mb-1">

Comment

</label>

<textarea name="comment"
id="comment"
class="w-full border-slate-200 rounded-lg"></textarea>

</div>



<div class="flex justify-between pt-4">

<a href="{{ route('reclamations.show',$reclamation->id) }}"
class="px-4 py-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-100 flex items-center gap-1">

<span class="material-icons text-[18px]">arrow_back</span>

Back

</a>

<button type="submit"
class="px-6 py-2 bg-primary text-white rounded-lg flex items-center gap-2 hover:bg-primary/90">

<span class="material-icons text-[18px]">send</span>

Transfer

</button>

</div>



</form>

</div>

</div>



<script>

function filterServices(){

let divisionId = document.getElementById('division').value;

let services = document.querySelectorAll('#service option');

services.forEach(function(service){

if(service.value === ""){

service.style.display = "block";

}else if(divisionId === ""){

service.style.display = "block";

}else if(service.dataset.division == divisionId){

service.style.display = "block";

}else{

service.style.display = "none";

}

});

}

document.getElementById('division').addEventListener('change', function(){

filterServices();

});

filterServices();

</script>



<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>

<script>

tinymce.init({

selector:'#comment',

height:180,

menubar:false,

toolbar:'bold italic underline | bullist numlist | link | undo redo'

});

</script>

</body>
</html>