<x-layout.dashboard>


    <div class="dashboard grid  grid-cols-12">
        <div class="col-span-4">
            <div x-data="modal" class="mb-5">
                <!-- button -->
                <div class="flex items-center justify-center">
                    <label for="modalBtn" class="modalBtn btn btn-primary">Image Upload
                        <input id='modalBtn' type="file" class="modalBtn btn btn-primary hidden"></label>
                </div>
                <div id="img-area"></div>
            </div>
        </div>
    </div>



    @section('extra')
        <div class="modal-overlay fixed inset-0 bg-[black]/60 z-[999] opacity-0 invisible overflow-y-auto duration-300">
            <div class="close-overlay flex items-start justify-center min-h-screen px-4">
                <div class="modal-wrapper panel border-0 p-0 rounded-lg overflow-hidden my-8  w-auto  ">
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <div class="font-bold text-lg">asdasdas</div>

                    </div>
                    <div class="p-5 w-auto max-w-[70vw] h-auto max-h-[60vh] overflow-hidden">
                        <img src="{{ '/assets/images/main/features-01.webp' }}" id="sample_image" class="w-auto h-auto ">
                        <div class="preview w-[100px] h-[100px] border border-black overflow-hidden bg-gray-400"></div>

                    </div>
                    <div class="p-5">
                        <button type="button" class="cancelBtn btn btn-outline-danger">Cancel</button>
                        <button type="button" class="cropBtn btn btn-primary ltr:ml-4 rtl:mr-4">Crop</button>
                    </div>
                </div>
            </div>


        </div>
    @endsection





    @section('script')
        <script></script>
    @endsection
</x-layout.dashboard>
