<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data KRS (Kartu Rencana Studi)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('krs.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    + Tambah KRS
                </a>

                <table class="min-w-full mt-4 border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Mahasiswa</th>
                            <th class="px-4 py-2 border">Mata Kuliah</th>
                            <th class="px-4 py-2 border">Semester</th>
                            <th class="px-4 py-2 border">Tahun Ajaran</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($krs as $item)
                            <tr>
                                <td class="px-4 py-2 border">{{ $item->mahasiswa->nama ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $item->mataKuliah->nama_mk ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $item->semester }}</td>
                                <td class="px-4 py-2 border">{{ $item->tahun_ajaran }}</td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('krs.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('krs.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 border text-center">Belum ada data KRS</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>