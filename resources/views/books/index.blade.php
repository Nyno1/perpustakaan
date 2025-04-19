<x-app-layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">NO</th>
                                <th scope="col" class="px-4 py-3">Judul Buku</th>
                                <th scope="col" class="px-4 py-3">Penulis</th>
                                <th scope="col" class="px-4 py-3">Kategori</th>
                                <th scope="col" class="px-4 py-3">Tahun</th>
                                <th scope="col" class="px-4 py-3">Jumlah Stok</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Deskripsi</th>
                                <th scope="col" class="px-4 py-3">Edit & Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $book->judul_buku }}</td>
                                <td class="px-4 py-3">{{ $book->penulis }}</td>
                                <td class="px-4 py-3">{{ $book->kategori }}</td>
                                <td class="px-4 py-3">{{ $book->tahun_terbit }}</td>
                                <td class="px-4 py-3">{{ $book->jumlah_stok }}</td>
                                <td class="px-4 py-3">
                                    <span class="{{ $book->status ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $book->status ? 'Tersedia' : 'Tidak Tersedia' }}
                                    </span>
                                </td>

                                <td class="px-4 py-3">{{ $book->deskripsi }}</td>

                                <td class="px-4 py-3 flex items-center justify-end">
                                    <div id="apple-imac-27-dropdown" class="z-10 w-44 rounded divide-y divide-gray-100 shadow-none dark:divide-gray-600">
                                        <ul class="">
                                            <li>
                                            <a href="{{ route('books.edit', $book->id) }}" class="text-blue-500">Edit</a>
                                                <br>_______
                                                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
