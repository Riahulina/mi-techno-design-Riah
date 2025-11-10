<x-layout>
  @section('content')
  
  @php
      // Pastikan user login dan role-nya admin
      $user = Auth::user();
  @endphp
  
  @if($user && $user->role === 'admin')
  <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Tambah Blog</h1>
  
    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
  
      <div class="mb-4">
        <label class="block mb-1 font-semibold">Judul</label>
        <input type="text" name="judul" class="w-full border px-3 py-2 rounded" required>
      </div>
  
      <div class="mb-4">
        <label class="block mb-1 font-semibold">Kategori</label>
        <input type="text" name="kategori" class="w-full border px-3 py-2 rounded">
      </div>
  
      <div class="mb-4">
        <label class="block mb-1 font-semibold">Isi</label>
        <textarea name="isi" class="w-full border px-3 py-2 rounded" rows="4" required></textarea>
      </div>
  
      <div class="mb-4">
        <label class="block mb-1 font-semibold">Gambar</label>
        <input type="file" name="gambar" class="w-full border px-3 py-2 rounded">
      </div>
  
      <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          Simpan
        </button>
      </div>
    </form>
  </div>
  @else
  <div class="max-w-xl mx-auto mt-10 bg-red-100 p-6 rounded shadow text-center text-red-700">
      Kamu tidak memiliki akses untuk menambah blog.
  </div>
  @endif
  
  @endsection
  </x-layout>
  