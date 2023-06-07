<x-layout.Page>
    <div class="flex w-full h-screen">

        <div
            class="dark:text-white-dark/70 text-base font-medium text-[#1f2937] w-[500px] h-[500] overflow-hidden m-auto">

            <h2>{{ $text->title }}</h2>
            <a href="{{ route('changeLanguage', ['language' => 'en']) }}">English</a>
            <a href="{{ route('changeLanguage', ['language' => 'tr']) }}">Türkçe</a>
            <div class="group published">a
                {{-- <div class="hidden group group-[.published]:block"> --}}
                <div class="hidden group group-hover:block">
                    Published
                </div>
            </div>

        </div>
    </div>



</x-layout.Page>
