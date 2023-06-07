<x-layout.dashboard>


    <div class="blogList">
        <div
            class="sectionContent mt-12 grid gap-4  grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 py-8  min-h-[25rem]  px-4">
            @foreach ($blogs as $blog)
                <div class="mb-8">
                    <div class="blogItem mb-4 bg-slate-100 rounded-3xl  relative min-h-[420px]" href="#">
                        <div class="imgWrapper rounded-3xl overflow-hidden mb-4 rounded-b-none h-[170px]"><img
                                src="{{ asset($blog->img_path) }}" alt=""></div>
                        <div class="blog-text px-4 ">
                            <div class="title">
                                <h3 class="uppercase font-barlow text-center font-bold"> {{ $blog->title }}
                                </h3>
                            </div>
                            <div class="category text-white text-center flex justify-center my-4">
                                @foreach ($blog->categories as $cat)
                                    <p class="py-1 px-2 bg-red-700 rounded-2xl mx-1 text-xs">{{ $cat->name }}</p>
                                @endforeach
                            </div>
                            <div class="short-desc mb-4">{!! $blog->markdownHtml !!}</div>
                        </div>
                    </div>
                    <div class="btns flex justify-between">
                        <div class="flex justify-center">
                            <button id="blogDeleteBtn" type="button"
                                class="sendBlog btn btn-outline-danger w-fit">Delete </button>
                        </div>
                        <div class="flex justify-center">
                            <button id="blogUpdateBtn" type="button" class="sendBlog btn btn-primary w-fit">Update
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-layout.dashboard>
