<x-layout>
    <div class="max-w-3xl mx-auto py-10">
      <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Pengguna</h2>
  
      @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
  
      <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
        @csrf
        @method('PUT')
  
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold mb-2">Nama</label>
          <input type="text" name="name" value="{{ old('name', $user->name) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
        </div>
  
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold mb-2">Email</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
        </div>
  
        <div class="mb-6">
          <label class="block text-gray-700 font-semibold mb-2">Role</label>
          <select name="role"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
          </select>
        </div>
  
        <div class="flex justify-between items-center">
          <a href="{{ route('users.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition">Kembali</a>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Simpan</button>
        </div>
      </form>
    </div>
  </x-layout>
  