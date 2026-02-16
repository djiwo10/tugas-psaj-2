@extends('layouts.app')

@section('title', 'Setelan')
@section('header-subtitle', 'Kelola pengaturan akun dan preferensi')

@section('content')

@php
$user = auth()->user();
@endphp

<div class="w-full max-w-4xl">

<h2 class="text-2xl font-bold mb-6">Pengaturan</h2>






<!-- ================= PROFILE ================= -->
<div class="bg-white rounded-xl p-6 mb-6">

<h3 class="text-lg font-bold mb-4">Profil Pengguna</h3>

<form method="POST" action="{{ route('profile.updateProfile') }}" enctype="multipart/form-data">
@csrf

<div class="flex items-start gap-6 mb-6">

<div class="relative">

<div class="w-24 h-24 rounded-full overflow-hidden bg-gray-200">

<img 
src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('AKU1.jpeg') }}" 
class="w-full h-full object-cover">

</div>

<input type="file" name="avatar" class="mt-2 text-sm">

</div>


<div class="flex-1">
<p class="text-xs text-text-muted">JPG, PNG atau GIF. Max 2MB</p>
</div>

</div>


<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

<div>
<label class="block text-sm font-semibold mb-2">Nama Lengkap</label>

<input 
type="text" 
name="name"
value="{{ old('name',$user->name) }}"
class="w-full px-4 py-2 border border-border rounded-lg outline-none focus:border-primary">
</div>


<div>
<label class="block text-sm font-semibold mb-2">Email</label>

<input 
type="email" 
name="email"
value="{{ old('email',$user->email) }}"
class="w-full px-4 py-2 border border-border rounded-lg outline-none focus:border-primary">
</div>

</div>


<div class="mt-4">
<button class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
Simpan Perubahan
</button>
</div>

</form>

</div>



<!-- ================= SECURITY PASSWORD ================= -->

<div class="bg-white rounded-xl p-6 mb-6">

<h3 class="text-lg font-bold mb-4">Keamanan</h3>

<form method="POST" action="{{ route('profile.updatePassword') }}">
@csrf

<div class="space-y-4">

<div>
<label>Password Lama</label>
<input type="password"
name="old_password"
class="w-full px-4 py-2 border rounded-lg"
required>
</div>

<div>
<label>Password Baru</label>
<input type="password"
name="password"
class="w-full px-4 py-2 border rounded-lg"
required>
</div>

<div>
<label>Konfirmasi Password Baru</label>
<input type="password"
name="password_confirmation"
class="w-full px-4 py-2 border rounded-lg"
required>
</div>

<button type="submit"
class="px-6 py-2 bg-primary text-white rounded-lg">
Update Password
</button>

</div>

</form>


</div>

</div>

@endsection
