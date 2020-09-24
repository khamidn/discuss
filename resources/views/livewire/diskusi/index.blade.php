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

            <div class="grid grid-cols-3 gap-4 py-2 pl-8">
                @for($i = 0; $i < $fields; $i++) 
                    <div class="cols-span-3">
                        <div class="mr-4">
                            <input type="file" class="mr-3" wire:change="$emit('file_upload_start')"/>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="handleDetachField" class="bg-gray-300 hover:bg-gray-400 py-2 px-4 rounded inline-flex items-center">    
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </button>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="grid grid-cols-3 gap-4 py-2 pl-8">
                <div class="cols-span-3">
                    <button type="button" wire:click="handleAddField" class="shadow focus:shadow-outline focus:outline-none text-white font-bold rounded px-4 py-2 mr-3 @if($fields==3) bg-pink-500 cursor-not-allowed @endif @auth hover:bg-pink-500 bg-pink-600 cursor-allowed @else bg-pink-500 cursor-not-allowed @endauth" @auth enabled @else disabled @endauth @if($fields==3) disabled @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                    </button>

                    <button class="shadow focus:shadow-outline focus:outline-none text-white font-bold rounded px-4 py-2 @auth hover:bg-pink-500 bg-pink-600 cursor-allowed @else bg-pink-500 cursor-not-allowed @endauth" @auth enabled @else disabled @endauth type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </button>
                </div>
            </div>
            
        </form>
             
        <div class="flex justify-between pl-8 py-2 ">
            <div class="inline-block md:w-2/4 mr-6">
                <input 
                    type="text"
                    wire:model="search"
                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 py-2 px-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Cari pertayaaan dalam forum"
                   >
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


<section class="flex flex-wrap p-4 h-full items-center">

    <div 
        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" 
        style="background-color: rgba(0,0,0,0.5)" 
        x-show="modalSearch"
    >

        <div 
            class="bg-white w-10/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" 
            x-show="modalSearch" 
            @click.away="modalSearch = false" 
            x-transition:enter="ease-out duration-300" 
            x-transition:enter-start="opacity-0 scale-90" 
            x-transition:enter-end="opacity-100 scale-100" 
            x-transition:leave="ease-in duration-300" 
            x-transition:leave-start="opacity-100 scale-100" 
            x-transition:leave-end="opacity-0 scale-90"
        >

            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">SEARCH</p>
                <div class="cursor-pointer z-50" @click="modalSearch = false">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>
            
            <div class="flex w-full items-center">
                <p class="text-gray-600"></p>
                <input 
                    type="text"
                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 py-2 px-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Cari pertayaaan dalam forum"
                >
            </div>
           
            



        </div>
        
    </div>

</section>

<script>



</script>

