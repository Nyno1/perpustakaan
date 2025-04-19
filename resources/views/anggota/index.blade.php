<x-app-layout>
    <section class="bg-white dark:bg-gray-900 p-4 sm:p-5 lg:pl-64">
        <div class="p-24">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Daftar Buku Perpustakaan</h1>
            <div class="flex gap-4 sm:gap-6 grid-cols-1 sm:grid-cols-2 mt-4 ">
                @foreach ($books as $book)
                    <a href="#"
                        class="flex justify-between max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ asset('image/ferrari.png') }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $book->judul_buku }}
                            </h5>
                            <div class="flex-row flex items-center justify-between">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">penulis : {{$book->penulis}}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">stok :{{$book->jumlah_stok}}</p>
                            </div>
                            <div class="flex-row flex items-center justify-between">
                                <p class="{{ $book->status ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $book->status ? 'Tersedia' : 'Tidak Tersedia' }}
                                </p>
                            </div>
                            <div class="flex items-center justify-between">
                                @if ($book->status)
                                    <button data-modal-target="crud-modal-{{ $book->id }}" data-modal-toggle="crud-modal-{{ $book->id }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                        Pinjam Buku
                                    </button>
                                @else
                                    <button disabled
                                        class="block text-white bg-gray-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-600">
                                        Tidak Tersedia
                                    </button>
                                @endif

                                <div id="crud-modal-{{ $book->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Isi form peminjaman buku
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="crud-modal-{{ $book->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5" action="{{ route('anggota.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="sm:col-span-2">
                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anggota</label>
                                                        <input type="text" name="name" value="{{ auth()->user()->name }}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan nama peminjam" disabled>
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label for="judul_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                                                        <input type="text" value="{{ $book->judul_buku }}" name="judul_buku" id="judul_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled>
                                                    </div>
                                                    <div class="sm:col-span">
                                                        <label for="penulis" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Penulis</label>
                                                        <input type="text" value="{{ $book->penulis }}" name="penulis" id="penulis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled>
                                                    </div>
                                                    <div>
                                                        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                                        <select id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled>
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
                                                        <label for="tanggal_pinjam"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pinjam</label>
                                                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                    </div>
                                                    <div>
                                                        <label for="tanggal_kembali"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Kembali</label>
                                                        <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                    </div>
                                                </div>
                                                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                                    Pinjam Buku
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
