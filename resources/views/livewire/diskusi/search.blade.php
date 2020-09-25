<div class="flex flex-wrap">
    <div class="w-full md:w-12/12">
        
        <input 
            type="text"
            wire:model="search"
            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 py-2 px-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Cari pertayaaan dalam forum"
        >
    </div>

    @if( !empty($search) )
        @forelse($searchDiscussions as $discussion)
        <div class="w-full md:w-12/12 ">
            <div class="mt-2">
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
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="w-full md:w-12/12 mt-3">
            <div class="py-2">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Maaf!</strong>
                    <span class="block sm:inline">Pertayaan yang kamu cari tidak ada.</span>
                </div>
            </div>
        </div>
        @endforelse

        <div class="w-full md:w-12/12">
            {{ $searchDiscussions->links('vendor.pagination.tailwind-2') }}
        </div>
    @endif

    

</div>
