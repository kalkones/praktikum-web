<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit KRS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('krs.update', $kr->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Mahasiswa</label>
                        <select name="mahasiswa_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach ($mahasiswas as $mhs)
                                <option value="{{ $mhs->id }}" {{ old('mahasiswa_id', $kr->mahasiswa_id) == $mhs->id ? 'selected' : '' }}>
                                    {{ $mhs->nama }} ({{ $mhs->nim }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Mata Kuliah</label>
                        <select name="mata_kuliah_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach ($mataKuliahs as $mk)
                                <option value="{{ $mk->id }}" {{ old('mata_kuliah_id', $kr->mata_kuliah_id) == $mk->id ? 'selected' : '' }}>
                                    {{ $mk->nama_mk }} ({{ $mk->kode_mk }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Semester</label>
                        <select name="semester" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="Ganjil" {{ old('semester', $kr->semester) == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="Genap" {{ old('semester', $kr->semester) == 'Genap' ? 'selected' : '' }}>Genap</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" value="{{ old('tahun_ajaran', $kr->tahun_ajaran) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                            Update
                        </button>
                        <a href="{{ route('krs.index') }}" class="text-gray-600 hover:underline">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>