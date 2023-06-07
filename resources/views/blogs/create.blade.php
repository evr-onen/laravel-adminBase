<x-layout.dashboard>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/easymde.min.css') }}">
    <script src="/assets/js/easymde.min.js"></script>
    {{-- <script src="/assets/js/vanillaSelectBox.js"></script>; --}}

    <div class="createBlog pt-5 space-y-8" x-data="form">
        {{-- <button class="sendBlog px-7 py-1 bg-yellow-400">gonder gelsin</button> --}}

        <div class="grid grid-cols-1">
            <!-- Basic -->
            <div class="panel col">
                <div class="flex items-center justify-between mb-5">
                    <h2 class="font-bold  text-2xl dark:text-white-light">Write/Update Blog</h2>

                </div>

                <div class="selectForUpdate grid grid-cols-12">
                    <div class="col-span-8">
                        <label for="location" class="block text-sm font-medium text-gray-700">Cat Selection</label>
                        <select id="selectedBlog" name="selectedCat"
                            class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <option ">Seciniz</option>
  @foreach ($blogs as $blog)
                            <option value="{{ $blog['id'] }}">
                                {{ $blog['title'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-4 flex justify-center">
                        <div class="flex ">
                            <button disabled id="deleteBlogBtn" type="button"
                                class=" btn btn-primary mt-auto mr-4">Delete
                            </button>
                        </div>
                        <div class="flex ">
                            <button disabled id="updateBlogBtn" type="button" class=" btn btn-primary mt-auto">Update
                            </button>
                        </div>
                    </div>
                </div>
                <div id="img-area" class="object-contain w-full mb-8"></div>
                <div class="grid grid-cols-12 mb-8">
                    <div class="col-span-8">
                        <label for="name" class="ml-px block pl-4 text-sm font-bold text-gray-700">Title</label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title"
                                class="block w-full rounded-full border-gray-300 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="title...">
                        </div>
                    </div>

                    <div class="col-span-4 flex justify-center items-end">
                        <div x-data="modal" class="">
                            <!-- button -->
                            <div class="flex items-center justify-center">
                                <label for="modalBtn" class="modalBtn btn btn-primary">Image Upload
                                    <input id='modalBtn' type="file"
                                        class="modalBtn btn btn-primary hidden"></label>
                            </div>

                        </div>
                    </div>

                </div>
                <div class=" grid grid-cols-12 mb-8">
                    <div id="multiSelectContainer" class="col-span-8">
                        <select id="multiSelect" data-te-select-init multiple data-te-select-filter="true"
                            data-te-select-clear-button='true'>
                            @foreach ($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach


                        </select>
                        <label data-te-select-label-ref>Example label</label>
                    </div>
                    <div class="flex justify-center col-span-4">
                        <button id="addCatsBtn" type="button" class=" btn btn-primary ">Add/Update Category </button>
                    </div>
                </div>
                <div class="markdown-editor mb-5 rtl:text-right prose dark:prose-invert w-full !max-w-[1200px]">
                    <textarea id="create-blog" class="w-full "></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="sendBlog btn btn-primary w-fit">Send </button>
                </div>
            </div>
        </div>
    </div>





    @section('extra')
        <div class="modal-overlay fixed inset-0 bg-[black]/60 z-[999] opacity-0 invisible overflow-y-auto duration-300">
            <div class="close-overlay flex items-start justify-center min-h-screen px-4">
                <div class="modal-wrapper panel border-0 p-0 rounded-lg overflow-hidden my-8  max-w-[70%] min-w-[20%] ">
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <div id="modalTitle" class="font-bold text-lg">Crop Image</div>

                    </div>
                    <div id="modalContent" class=" p-5 w-auto max-w-[70vw] h-auto max-h-[60vh] overflow-hidden">
                        <img src="{{ '/assets/images/main/features-01.webp' }}" id="sample_image" class="w-auto h-auto ">
                        <div class="preview w-[100px] h-[100px] border border-black overflow-hidden bg-gray-400"></div>

                    </div>
                    <div class="p-5 flex justify-end">
                        <button type="button" class="cancelBtn btn btn-outline-danger">Cancel</button>
                        <button type="button" id="saveModal"
                            class=" cropBtn btn btn-primary ltr:ml-4 rtl:mr-4">Crop</button>
                    </div>
                </div>
            </div>


        </div>
        <div class="modal-overlay2 fixed inset-0 bg-[black]/60 z-[999] opacity-0 invisible overflow-y-auto duration-300">
            <div class="close-overlay flex items-start justify-center min-h-screen px-4">
                <div class="modal-wrapper panel border-0 p-0 rounded-lg overflow-hidden my-8  max-w-[70%] min-w-[20%] ">
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <div id="modalTitle" class="font-bold text-lg">Create Category</div>

                    </div>
                    {{-- {{ dd($allCats[0]) }} --}}
                    <div id="modalContent"
                        class=" p-5 w-auto max-w-[70vw] h-auto max-h-[60vh] overflow-hidden grid grid-cols-12">
                        <div class="col-span-6">
                            <label for="location" class="block text-sm font-medium text-gray-700">Cat Selection</label>
                            <select id="selectedCat" name="selectedCat"
                                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option ">Seciniz</option>
          @foreach ($allCats as $allCat)
                                <option value="{{ $allCat['id'] }}">
                                    {{ $allCat['name']['tr'] . ' / ' . $allCat['name']['en'] }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 flex">
                            <button type="button" disable id="getCatBtn" class="btn btn-primary  mt-auto ml-auto">Get
                                Category</button>
                        </div>
                        <div class="col-span-6 mt-8 pr-4">
                            <label for="name" class="ml-px block pl-4 text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" name="catName" id="catNameInputTr"
                                    class="block w-full rounded-full border-gray-300 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Turkce">
                            </div>
                        </div>
                        <div class="col-span-6 mt-8 grid grid-cols-1 gap-4">
                            <div class="flex justify-end">
                                <button type="button" id="deleteModalBtn" disabled
                                    class="dltBtn2  mt-auto btn btn-outline-danger">Delete</button>
                            </div>
                        </div>
                        <div class="col-span-6 mt-4 pr-4">
                            <label for="name" class="ml-px block pl-4 text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" name="catName" id="catNameInputEn"
                                    class="block w-full rounded-full border-gray-300 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="English">
                            </div>
                        </div>
                        <div class="col-span-6 mt-4  grid-cols-2  grid">
                            <div class="flex justify-end">
                                <button disabled type="button" id="editModalBtn"
                                    class="editBtn2  mt-auto btn btn-primary">Edit</button>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" id="addModalBtn"
                                    class="addModalBtn2  mt-auto btn btn-primary">Add</button>
                            </div>
                        </div>
                        <div class="p-5 flex justify-end col-span-12">
                            <button type="button" class="cancelBtn2 btn btn-outline-danger">Back</button>

                        </div>
                    </div>
                </div>


            </div>
        @endsection

        <script>
            // alpine
            document.addEventListener("alpine:init", () => {
                Alpine.data("form", () => ({
                    // highlightjs
                    codeArr: [],
                    toggleCode(name) {
                        if (this.codeArr.includes(name)) {
                            this.codeArr = this.codeArr.filter((d) => d != name);
                        } else {
                            this.codeArr.push(name);

                            setTimeout(() => {
                                document.querySelectorAll('pre.code').forEach(el => {
                                    hljs.highlightElement(el);
                                });
                            });
                        }
                    }
                }));
            });
        </script>



</x-layout.dashboard>


{{-- <button id="addCats" class="col-span-3 " type="button" class=" btn btn-primary ">Delete </button> --}}
