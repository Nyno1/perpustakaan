<x-app-layout>
<div id="updateProductModal" tabindex="-1" aria-hidden="true" class="overflow-y-auto fixed top-0 right-0 left-0 bottom-0 z-50 flex justify-center items-center w-full h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Buku
                </h3>
            </div>
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="judul_penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul dan Penulis</label>
                        <input type="text" name="judul_buku" id="judul_penulis" value="{{ old('judul_buku', $book->judul_buku) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Judul dan Penulis Buku">
                    </div>
                    <div>
                        <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                        <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $book->penulis) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Nama Penulis">
                    </div>
                    <div>
                        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Fiksi" {{ $book->kategori == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                            <option value="Novel" {{ $book->kategori == 'Novel' ? 'selected' : '' }}>Novel</option>
                            <option value="Non-Fiksi" {{ $book->kategori == 'Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                            <option value="Pendidikan" {{ $book->kategori == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                            <option value="Teknologi" {{ $book->kategori == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                            <option value="Kewirausahaan" {{ $book->kategori == 'Kewirausahaan' ? 'selected' : '' }}>Kewirausahaan</option>
                            <option value="Kesehatan" {{ $book->kategori == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                            <option value="Desain" {{ $book->kategori == 'Desain' ? 'selected' : '' }}>Desain</option>

                        </select>
                    </div>
                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="1" {{ $book->status == 1 ? 'selected' : '' }}>Tersedia</option>
                            <option value="0" {{ $book->status == 0 ? 'selected' : '' }}>Tidak Tersedia</option>
                        </select>
                    </div>
                    <div>
                        <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Tahun Terbit">
                    </div>

                    <div>
                        <label for="jumlah_stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Stok</label>
                        <input type="number" name="jumlah_stok" id="jumlah_stok" value="{{ old('jumlah_stok', $book->jumlah_stok) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Jumlah Stok">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Deskripsi Buku">{{ old('deskripsi', $book->deskripsi) }}</textarea>                    
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Perbarui
                    </button>
                    <a href="{{ route('books.index') }}" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Tutup
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>