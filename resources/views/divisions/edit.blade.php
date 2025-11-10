<x-layout>
    @section('content')
        <h1>Edit Divisi</h1>

        @if(Auth::check() && Auth::user()->role === 'admin')
            <form method="POST" action="{{ route('divisi.update', $divisi->id) }}">
                @csrf 
                @method('PUT')
                <input type="text" name="nama" value="{{ $divisi->nama }}">
                <button type="submit">Update</button>
            </form>
        @else
            <p class="text-red-500">Anda tidak memiliki akses untuk mengedit divisi.</p>
        @endif
    @endsection
</x-layout>
