<div class="flex flex-wrap">
    <div class="w-full md:w-3/12 fixed">
        <p class="text-black font-bold px-4 mt-2">Forum Tanya Dokter</p>
        @if (session('message'))
            <div class="px-4 py-2">
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-2 py-2 rounded" role="alert">
                    <span class="block sm:inline">Pertayaan anda telah terkirim.</span>
                </div>
            </div>
        @endif
        <form>
            <div class="flex flex-wrap py-2 px-4">
                <textarea 
                    name="" 
                    id="" 
                    cols="30" 
                    rows="10"
                    class="focus:outline-none focus:shadow-outline border shadow border-gray-300 rounded-md block w-full px-2 py-2" 
                    placeholder="Tulis Pertayaan anda"></textarea>
                <p class="text-gray-500 text-xs py-2">(maks. 500 karakter)</p>
            </div>
            <div class="grid justify-items-end px-4 py-2">
                 <button class="shadow focus:shadow-outline focus:outline-none text-white font-bold rounded px-4 py-2 @auth hover:bg-pink-400 bg-pink-500 cursor-allowed @else bg-pink-400 cursor-not-allowed @endauth" type="button">
                    Kirim
                </button>
            </div>
        </form>
    </div>
</div>

<div class="flex flex-wrap justify-end">
    <div class="w-full md:w-9/12 sr-only md:not-sr-only">
        <div class="pl-8 py-2">
            <div class="bg-white mt-2 py-2">
                <div class="text-gray-500 text-sm">
                     <p>04 Oct 2019, 10:59 . Kategori</p>
                </div>
                <a href="" class="cursor-pointer">
                    <div class="text-black hover:text-pink-600">
                        <span class="font-bold text-2xl">Contoh Pertayan yang diajukan oleh audiens</span>
                    </div>
                    <div class="flex justify-content-start">
                        <div class="items-center py-2">
                            <img src="https://via.placeholder.com/15x15" alt="avatar" class="rounded-full w-8 h-8">
                        </div>
                        <div class="text-gray-500 text-center p-2 ">
                            Info Penanya: SY, Wanita, 1 Tahun
                        </div>
                    </div>
                    <hr>
                    <div class="text-gray-700 text-left px-8 py-2 ">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                </a>
            </div>
        </div>
        <p class="text-black font-bold pl-8 mt-2">Diskusi Pengalaman Anda</p>
        @if (session('message'))
            <div class="px-4 py-2">
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-2 py-2 rounded" role="alert">
                    <span class="block sm:inline">Pertayaan anda telah terkirim.</span>
                </div>
            </div>
        @endif
        <form>
            <div class="flex flex-wrap py-2 pl-8">
                <textarea 
                    name="" 
                    id="" 
                    cols="30" 
                    rows="10"
                    class="focus:outline-none focus:shadow-outline border shadow border-gray-300 rounded-md block w-full px-2 py-2" 
                    placeholder="Tulis Pertayaan anda"></textarea>
                <p class="text-gray-500 text-xs py-2">(maks. 500 karakter)</p>
            </div>
            <div class="grid justify-items-end pl-8 py-2">
                 <button class="shadow focus:shadow-outline focus:outline-none text-white font-bold rounded px-4 py-2 @auth hover:bg-pink-400 bg-pink-500 cursor-allowed @else bg-pink-400 cursor-not-allowed @endauth" type="button">
                    Kirim
                </button>
            </div>
        </form>
    </div>
</div>

