<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Mobil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="mb-4 text-center text-2xl font-bold">Data Mobil</h2>
                    <div class="flex justify-end mb-3">
                        <a href="{{ url('admin.car.create') }}"
                            class="btn btn-success bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Tambah
                            Mobil</a>
                    </div>
                    <div class="card border rounded-lg shadow-lg">
                        <div class="card-body p-4">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">Gambar</th>
                                        <th class="border px-4 py-2">Nama</th>
                                        <th class="border px-4 py-2">Brand</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cars as $car)
                                        <tr>
                                            <td class="border px-4 py-2"><img
                                                    src="{{ asset('storage/car/' . $car->image) }}"
                                                    class="img-thumbnail w-24"></td>
                                            <td class="border px-4 py-2">{{ $car->name }}</td>
                                            <td class="border px-4 py-2">{{ $car->brand }}</td>
                                            <td class="border px-4 py-2 flex space-x-2">
                                                <a href="{{ route('cars.show', $car->id) }}"
                                                    class="btn btn-info bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-600">Lihat</a>
                                                <a href="{{ route('cars.edit', $car->id) }}"
                                                    class="btn btn-primary bg-blue-700 text-white py-1 px-2 rounded hover:bg-blue-800">Edit</a>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('cars.destroy', $car->id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center border px-4 py-2">Belum ada mobil
                                                yang terdaftar</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $cars->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
