<div class="flex flex-wrap">
    <div class="w-full md:w-2/12 fixed">
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
                <button class="shadow focus:shadow-outline focus:outline-none text-white font-bold rounded px-4 py-2 @auth hover:bg-pink-500 bg-pink-600 cursor-allowed @else bg-pink-500 cursor-not-allowed @endauth" @auth enabled @else disabled @endauth type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- <div class="flex flex-wrap justify-end">
    <div class="w-full md:w-9/12 sr-only md:not-sr-only">
        <div class="pl-8 py-2">
            <div class="bg-white mt-2 py-2">
                <div class="text-gray-500 text-sm">
                     <p>{{ $discussion->created_at->diffForHumans() }} . {{ $discussion->topic->name }}</p>
                </div>
                <div class="md:flex py-2">
                    <div class="md:flex-shrink-0">
                      <img class="rounded-full" src="https://via.placeholder.com/45x45" alt="Woman paying for a purchase">
                    </div>
                    <div class="mt-4 md:mt-0 md:ml-6">
                      <div class="tracking-wide text-sm text-pink-600 font-bold">
                        Info Penanya : {{ $discussion->user->name }}, Gender, 1 Tahun
                      </div>
                      <p class="block mt-1 text-lg leading-tight font-semibold text-gray-900">
                          {{ $discussion->content }}
                      </p>
                    </div>
                </div>
                <hr>
                @forelse ($discussion->parents as $parent)
                    <div class="md:flex py-2">
                        <div class="md:flex-shrink-0 ml-16">
                        <img class="rounded-full" src="https://via.placeholder.com/45x45" alt="Woman paying for a purchase">
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-6">
                            <div class="tracking-wide text-sm text-pink-600 font-bold">
                                Dijawab oleh : {{ $parent->user->name }}, Gender, 1 Tahun
                            </div>
                            <p class="mt-2 text-gray-600">
                                {{ $parent->content}}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="py-2">
                        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-2 py-2 rounded" role="alert">
                            <span class="block sm:inline">Belum ada jawaban pada pertayaan ini.</span>
                        </div>
                    </div>
                @endforelse
                <hr>
                
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
            <livewire:diskusi.reply :parentId="$discussion->id" :topicId="$discussion->topic_id"/>
    </div>
</div> --}}

<livewire:diskusi.reply :parentId="$discussion->id" :topicId="$discussion->topic_id"/>

