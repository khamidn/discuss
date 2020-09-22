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

            <div class="flex justify-between pl-8 py-2">
                <div class="">
                    {{-- <button type="button" class="add_more border bg-pink-600 hover:bg-pink-500 text-white font-bold py-2 px-4 rounded-full">Tambahkan Gambar</button> --}}

                        <div class="w-full" x-data='app()' x-init="init()">
                            <form>
                                <h3>Gambar (<span x-text="imageCount()"></span>)</h3>
                                <template x-for="(image, i) in images" :key="i">
                                    <div class="mt-3">
                                    <label><span x-text="i+1"></span>. Gambar</label>
                                    <div class="">
                                        <input type="file" class="" x-model="image.name">
                                        <div class="">
                                            <span class="font-weigh-normal">
                                            <button type="button" @click.prevent="removeImage(i)" class="border bg-pink-600 hover:bg-pink-500 text-white font-bold py-2 px-4 rounded">hapus</button>
                                            </span>
                                        </div>
                                    </div>
                                    </div>
                                </template>
                                
                                    <button type="button" @click.prevent="addImage()" class="border bg-pink-600 hover:bg-pink-500 text-white font-bold py-2 px-4 rounded-full" :class="{'hidden' : images.length > 2 }" x-ref="addImageButton">Tambah Gambar</button>
                                
                            </form>
                        </div>
                       
                    
                </div>
                <div class="">
                    <button class="shadow focus:shadow-outline focus:outline-none text-white font-bold rounded px-4 py-2 @auth hover:bg-pink-500 bg-pink-600 cursor-allowed @else bg-pink-500 cursor-not-allowed @endauth" type="submit">
                        Kirim
                    </button>
                </div>
                
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


<section class="flex flex-wrap p-4 h-full items-center">

    <div 
        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" 
        style="background-color: rgba(0,0,0,0.5)" 
        x-show="showModal"
    >

        <div 
            class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" 
            x-show="showModal" 
            @click.away="showModal = false" 
            x-transition:enter="ease-out duration-300" 
            x-transition:enter-start="opacity-0 scale-90" 
            x-transition:enter-end="opacity-100 scale-100" 
            x-transition:leave="ease-in duration-300" 
            x-transition:leave-start="opacity-100 scale-100" 
            x-transition:leave-end="opacity-0 scale-90"
        >

            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Masukkan Gambar</p>
                <div class="cursor-pointer z-50" @click="showModal = false">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>
            
            {{-- <div class="flex justify-between pl-8 py-2 ">
                
            </div> --}}
            {{-- <div class="w-full max-w-2xl p-8 mx-auto bg-pink-600 rounded-lg">
                <div class="" x-data="imageData()">
                  <div x-show="previewUrl == ''">
                    <p class="text-center uppercase text-bold">
                      <label for="thumbnail" class="cursor-pointer">
                        Upload a file
                      </label>
                      <input type="file" name="thumbnail" id="thumbnail" class="hidden" @change="updatePreview()">
                    </p>
                  </div>
                  <div x-show="previewUrl !== ''">
                    <img :src="previewUrl" alt="" class="rounded w-32 h-32">
                    <div class="">
                      <button type="button" class="" @click="clearPreview()">change</button>
                    </div>
                  </div>
                </div>
            </div> --}}

            <div class="flex justify-end pt-2">
                <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" @click="alert('Additional Action');">Action</button>
                <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" @click="showModal = false">Close</button>
            </div>

        </div>
        
    </div>

</section>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    
    $(document).ready(function() {
        $('.add_more').click(function(e) {
            e.preventDefault();
            $(this).before("<input class='order bg-pink-600 hover:bg-pink-500 text-white font-bold py-2 px-4 m-2 rounded-full' name='file[]' type='file'/>")
        })
    }) --}}
<script>
class Image {
  constructor() {
    this.name = '';
  }
}

function app() {
  return {
   
    images: [],
    init() {
      //do init stuff here
    },
    imageCount() {
      return this.images.length;
    },
    addImage() {
      console.log('Add');
      this.images.push(new Image());     
    },
    removeImage(index) {
      this.images.splice(index, 1);
    },
  }
}

</script>

