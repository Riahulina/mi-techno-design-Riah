<x-layout>
    <div class="max-w-6xl mx-auto py-10 px-6">
      <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-extrabold text-gray-800">Kelola Pengguna</h2>
        <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            + Tambah Pengguna
          </a>
      </div>
  
      <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-200">
        <table class="min-w-full">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="py-3 px-4 text-left font-semibold">Nama</th>
              <th class="py-3 px-4 text-left font-semibold">Email</th>
              <th class="py-3 px-4 text-left font-semibold">Role</th>
              <th class="py-3 px-4 text-center font-semibold">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @forelse($users as $user)
            <tr class="hover:bg-blue-50 transition-colors">
              <td class="py-3 px-4 text-gray-800">{{ $user->name }}</td>
              <td class="py-3 px-4 text-gray-600">{{ $user->email }}</td>
              <td class="py-3 px-4">
                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                  {{ $user->role === 'admin' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                  {{ ucfirst($user->role) }}
                </span>
              </td>
              <td class="py-2 px-4 text-center">
                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:underline">Edit</a>
              
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                    class="text-red-600 hover:underline ml-2"
                    onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                    Hapus
                  </button>
                </form>
              </td>              
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-center py-6 text-gray-500">
                Belum ada pengguna terdaftar.
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
  
      <div class="mt-6">
        {{ $users->links() }}
      </div>
    </div>
  </x-layout>
  