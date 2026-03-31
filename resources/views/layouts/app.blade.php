<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/regular/style.css">
<link rel="stylesheet" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/fill/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">

<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>

<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    renderMathInElement(document.body, {
        delimiters: [
            {left: "$$", right: "$$", display: true},
            {left: "$", right: "$", display: false}
        ]
    });
});
</script>

<title>Calcera - @yield('title', 'Dashboard')</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

@if(config('app.env') === 'local')
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
theme: {
extend: {
colors: {
primary: {
DEFAULT: '#4F6CFF',
soft: '#EEF2FF',
},
orange: {
DEFAULT: '#FF9F43',
soft: '#FFF3E0',
},
text: {
main: '#0F172A',
muted: '#64748B',
},
bg: {
main: '#F7F8FA',
},
border: '#E5E7EB',
},
fontFamily: {
sans: ['Poppins','system-ui','sans-serif'],
},
letterSpacing: {
logo: '0.22em',
},
}
}
}
</script>
@else
@vite(['resources/css/app.css','resources/js/app.js'])
@endif

@stack('styles')

</head>

<body class="font-sans text-text-main antialiased relative">

<!-- BATIK BACKGROUND -->
<div 
class="fixed inset-0 -z-10"
style="
background-image: url('/images/batik.jpg');
background-size: cover;
background-position: center;
opacity: 0.04;
">
</div>

<div class="flex min-h-screen">

<!-- SIDEBAR -->
@include('layouts.sidebar')

<!-- MAIN CONTENT -->
<main class="flex-1 ml-[280px]">

<!-- HEADER -->
@include('layouts.header')

<!-- PAGE CONTENT -->
<div class="p-6">

@if(session('success'))
<div class="flash-alert mb-4 p-4 bg-green-100 border border-green-200 text-green-800 rounded-lg flex items-center justify-between fade-in">
<span>{{ session('success') }}</span>
<button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800 text-xl leading-none">&times;</button>
</div>
@endif

@if(session('error'))
<div class="flash-alert mb-4 p-4 bg-red-100 border border-red-200 text-red-800 rounded-lg flex items-center justify-between fade-in">
<span>{{ session('error') }}</span>
<button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800 text-xl leading-none">&times;</button>
</div>
@endif

@yield('content')

</div>

</main>

</div>

<script>

// Menu item active state
document.addEventListener('DOMContentLoaded',function(){

const menuItems=document.querySelectorAll('.menu-item');
const currentPath=window.location.pathname;

menuItems.forEach(item=>{

const href=item.getAttribute('href');

if(href && currentPath.includes(href)){

item.classList.add(
'active',
'font-medium',
'text-[rgba(30,30,30,1)]',
'bg-[rgba(79,108,255,0.08)]'
);

item.classList.remove(
'font-normal',
'text-[rgba(30,30,30,0.5)]'
);

const outline=item.querySelector('.outline');
const fill=item.querySelector('.fill');

if(outline) outline.classList.add('hidden');
if(fill) fill.classList.remove('hidden');

}

item.addEventListener('click',function(){

menuItems.forEach(i=>{

i.classList.remove(
'active',
'font-medium',
'text-[rgba(30,30,30,1)]',
'bg-[rgba(79,108,255,0.08)]'
);

i.classList.add(
'font-normal',
'text-[rgba(30,30,30,0.5)]'
);

const outline=i.querySelector('.outline');
const fill=i.querySelector('.fill');

if(outline){
outline.classList.remove('hidden');
outline.classList.add('opacity-50');
}

if(fill) fill.classList.add('hidden');

});

this.classList.add(
'active',
'font-medium',
'text-[rgba(30,30,30,1)]',
'bg-[rgba(79,108,255,0.08)]'
);

this.classList.remove(
'font-normal',
'text-[rgba(30,30,30,0.5)]'
);

const outline=this.querySelector('.outline');
const fill=this.querySelector('.fill');

if(outline) outline.classList.add('hidden');

if(fill){
fill.classList.remove('hidden');
fill.classList.add('opacity-100');
}

});

});

});

setTimeout(()=>{
document.querySelectorAll('.flash-alert').forEach(el=>{
el.style.transition='opacity 0.5s';
el.style.opacity='0';
setTimeout(()=>el.remove(),500);
});
},5000);

</script>

@stack('scripts')

</body>
</html>