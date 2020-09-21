<div class="flex flex-wrap">
    <div class="w-full md:w-2/12 px-4">
        <div class="bg-white mt-3 px-2 py-2 rounded-lg border border-gray-300">
            <p class="text-black font-bold py-2">Topik Diskusi</p>

            <div class="divide-y divide-gray-300">
                @foreach ($topics as $topicDiscuss)
                    <div class="text-start py-2">
                        <a 
                            wire:click="selectTopic({{ $topicDiscuss->id }})"
                            class="font-light cursor-pointer hover:text-pink-600
                            @if ($topic === $topicDiscuss->id)
                                text-pink-600
                            @else
                                text-gray-700
                            @endif
                            
                            ">
                            {{ $topicDiscuss->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="w-full md:w-10/12 px-4">
        <p class="text-black font-bold pl-8 mt-2">Forum Tanya Dokter</p>
        @if (session('message'))
            <div class="pl-8 py-2">
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-2 py-2 rounded" role="alert">
                    <span class="block sm:inline">Pertayaan anda telah terkirim.</span>
                </div>
            </div>
        @endif
        
        <form wire:submit.prevent="newDiscussion({{ $topic }})">

            <div class="flex flex-wrap pl-8 py-2">
                <textarea 
                    wire:model = "content"
                    cols="30" 
                    rows="5"
                    class="focus:outline-none focus:shadow-outline border shadow border-gray-300 rounded-md block w-full px-2 py-2" 
                    placeholder="Tulis Pertayaan anda"></textarea>
                    @error('content')
                        <div class="text-red-500 text-xs italic mt-2 mb-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
            </div>

            <div class="grid justify-items-end pl-8 py-2">
                <button class="shadow focus:shadow-outline focus:outline-none text-white font-bold rounded px-4 py-2 @auth hover:bg-pink-500 bg-pink-600 cursor-allowed @else bg-pink-500 cursor-not-allowed @endauth" type="submit">
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
                </div>
              </div>
        </div>


        @forelse ($discussions as $discussion)
            <div class="pl-8 py-2">
                <div class="bg-white mt-2 px-2 py-2 rounded-lg border border-gray-300">
                    <div class="text-gray-500 text-sm">
                        <p>{{ $discussion->created_at->diffForHumans() }} . {{ $discussion->topic->name }}</p>
                    </div>
                    <a href="/pertayaan/{{ $discussion->id }}" class="cursor-pointer">
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
                    </a>
                </div>
            </div>    
        
        @empty    
            <div class="pl-8 py-2">
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-2 py-2 rounded" role="alert">
                    <span class="block sm:inline">Di topik ini belum ada diskusi.</span>
                </div>
            </div>
        @endforelse
        

    </div>
</div>

