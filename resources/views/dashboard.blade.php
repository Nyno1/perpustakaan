<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-16">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col ml-40">
            <div class='p-4 bg-gray-400 border rounded-xl border-gray-500 text-white'>
                <div class='flex flex-row justify-between items-center ml-8 gap-8 p-8'>
                    <img src="image/image.png" alt="" class='w-full max-w-md'/>
                    <div>
                        <h1 classN='font-extrabold text-2xl'>halo , {{ Auth::user()->name }}</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum itaque nihil officiis voluptates ratione delectus eius. Adipisci ad, veritatis error modi deleniti beatae! Hic, enim itaque illum ipsum rem ad!</p>
                        <div class='flex flex-row gap-4 mt-4'>
                            <a href='#' class='bg-black p-2 rounded-xl'>Baca Buku</a>
                            <a href='#' class='bg-white text-black p-2 rounded-xl'>Pinjam Buku</a>
                        </div>
                    </div>
                </div>       
            </div>
    </div>
</x-app-layout>
