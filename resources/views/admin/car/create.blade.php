<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Mobil') }}
        </h2>
    </x-slot>

    <h2 class="mb-4 text-2xl font-bold">Tambahkan Mobil Baru</h2>
    <div class="card border rounded-lg shadow-lg">
        <div class="card-body p-4">
            <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label block text-gray-700">Gambar</label>
                    <input type="file"
                        class="form-control block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                        id="image" name="image">
                    @error('image')
                        <div class="alert alert-danger mt-2 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label block text-gray-700">Nama</label>
                    <input type="text"
                        class="form-control block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                        id="nama" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama">
                    @error('nama')
                        <div class="alert alert-danger mt-2 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label block text-gray-700">Brand</label>
                    <input type="text"
                        class="form-control block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                        id="brand" name="brand" value="{{ old('brand') }}" placeholder="Masukkan Brand">
                    @error('brand')
                        <div class="alert alert-danger mt-2 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit"
                    class="btn btn-success bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 mr-2">Simpan</button>
                <button type="reset"
                    class="btn btn-warning bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600 mr-2">Reset</button>
                <a href="{{ route('admin.mobil') }}"
                    class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Kembali</a>
            </form>
        </div>
    </div>

</x-app-layout>
