<x-layout>
    @section('content')
        <h1>Tambah Divisi</h1>

        @if(Auth::check() && Auth::user()->role === 'admin')
            <form method="POST" action="{{ route('divisi.store') }}">
                @csrf
                <input type="text" name="nama" placeholder="Nama Divisi">
                <button type="submit">Simpan</button>
            </form>
        @else
            <p class="text-red-500">Anda tidak memiliki akses untuk menambah divisi.</p>
        @endif
    @endsection
</x-layout>
