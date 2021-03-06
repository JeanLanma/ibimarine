{{-- Upload Image Modal --}}
<div data-target-modal="upload-image-modal" id="upload-image-modal" class="hidden fixed top-0 left-0 z-10  bg-black/50  h-screen w-full">

    <!-- Overlay content -->
    <div class="h-screen flex flex-col items-center">

        {{-- Overlay Body --}}
        <div class="w-[90%] lg:max-w-xl text-old-black">

            <div id="inner-upload-image-modal" class="mx-auto py-4 my-10 bg-white rounded">
                {{-- Head content --}}
                <div class="my-2 pb-2 border-b-2">
                    <div class="px-5 flex justify-between">
                        <div>
                            <p class="text-xl font-bold uppercase">Subir Nueva Imagen</p>
                        </div>
                        <div data-close-modal="upload-image-modal" id="close_edit_modal" class="-mt-5 cursor-pointer">
                            <span class="text-5xl text-old-gold">&times;</span>
                        </div>
                    </div>
                </div>

                {{-- Body Content --}}
                <div class="mt-5 px-5">

                    <form id="upload_image_form" action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="flex w-full items-center justify-between">
                            <input class="w-1/2 hidden" type="file" name="image_src" id="image_src">

                            <button class="w-1/3 btn-off" type="button" onclick="document.getElementById('image_src').click()"><i class="fa-solid fa-upload"></i>Subir imagen</button>

                            <input class="w-2/3" type="text" name="image_alt" id="image_alt" placeholder="image alt...">
                        </div>
                        <input type="hidden" name="sort_order" id="sort_order" value="">
                        <input type="hidden" name="belongs_to" id="belongs_to" value="boats">
                        <input type="hidden" name="gallery_type" id="gallery_type" value="none">

                        <div class="w-full text-center mt-4">
                            <input class="btn mx-auto" type="submit" id="submit_boat_image" value="Guardar Imagen">
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

</div>