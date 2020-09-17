<div class="flex flex-wrap">
    <div class="w-full md:w-2/12 fixed">
        <div class="bg-white mt-3 px-2 py-2 rounded-lg border border-gray-300">
            <p class="font-normal py-2">Kategori</p>

            <div class="divide-y divide-gray-300">
                @for ($i = 0; $i < 9; $i++)
                    <div class="text-start py-2">
                        <a href="" class="font-light cursor-pointer hover:text-pink-600">Kategori {{ $i }}</a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>

<div class="flex flex-wrap justify-end">
    <div class="w-full md:w-10/12">
        <p class="font-normal px-8 mt-2">Forum Tanya Dokter</p>
        @if (session('message'))
            <div class="px-4 py-2">
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-2 py-2 rounded" role="alert">
                    <span class="block sm:inline">Pertayaan anda telah terkirim.</span>
                </div>
            </div>
        @endif
        
        <form>
            <div class="flex flex-wrap pl-8 py-2">
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

        <div class="flex justify-between pl-8 py-2 ">
            <div class="inline-block md:w-2/4 mr-6">
                <input type="text" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 py-2 px-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" placeholder="Cari pertayaaan dalam forum">
            </div>
            <div class="md:flex md:items-center md:w-2/4">
                <div class="md:w-1/3">
                  <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Urutkan
                  </label>
                </div>
                <div class="md:w-2/3 inline-block">
                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option>Terbaru </option>
                        <option>Paling Banyak Dilihat</option>
                        <option>Komentar Terbanyak</option>
                      </select>
                      {{-- <div class="pointer-events-none inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                      </div> --}}
                </div>
              </div>
        </div>

        <div class="pl-8 py-2">
            <div class="bg-white mt-2 px-2 py-2 rounded-lg border border-gray-300">
                <div class="text-gray-500 text-sm">
                     <p>04 Oct 2019, 10:59 . Kategori</p>
                </div>
                <a href="/detail-diskusi" class="cursor-pointer">
                    <div class="text-black">
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

        <div class="pl-8 py-2">
            <div class="bg-white mt-2 px-2 py-2 rounded-lg border border-gray-300">
                <div class="text-gray-500 text-sm">
                     <p>04 Oct 2019, 10:59 . Kategori</p>
                </div>
                <a href="/detail-diskusi" class="cursor-pointer">
                    <div class="text-black">
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

        <div class="pl-8 py-2">
            <div class="bg-white mt-2 px-2 py-2 rounded-lg border border-gray-300">
                <div class="text-gray-500 text-sm">
                     <p>04 Oct 2019, 10:59 . Kategori</p>
                </div>
                <a href="/detail-diskusi" class="cursor-pointer">
                    <div class="text-black">
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
        

            
        {{-- {{$products->links('vendor.pagination.tailwind-2')}}     --}}
        
    </div>
</div>
