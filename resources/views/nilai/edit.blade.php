<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Nilai
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

                <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">KRS (Mahasiswa - Mata Kuliah)</label>
                        <select name="krs_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach ($krsList as $k)
                                <option value="{{ $k->id }}" {{ old('krs_id', $nilai->krs_id) == $k->id ? 'selected' : '' }}>
                                    {{ $k->mahasiswa->nama ?? '-' }} - {{ $k->mataKuliah->nama_mk ?? '-' }} ({{ $k->semester }} {{ $k->tahun_ajaran }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nilai Angka (0-100)</label>
                        <input type="number" step="0.01" name="nilai_angka" value="{{ old('nilai_angka', $nilai->nilai_angka) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nilai Huruf</label>
                        <select name="nilai_huruf" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="A" {{ old('nilai_huruf', $nilai->nilai_huruf) == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('nilai_huruf', $nilai->nilai_huruf) == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ old('nilai_huruf', $nilai->nilai_huruf) == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ old('nilai_huruf', $nilai->nilai_huruf) == 'D' ? 'selected' : '' }}>D</option>
                            <option value="E" {{ old('nilai_huruf', $nilai->nilai_huruf) == 'E' ? 'selected' : '' }}>E</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                            Update
                        </button>
                        <a href="{{ route('nilai.index') }}" class="text-gray-600 hover:underline">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>