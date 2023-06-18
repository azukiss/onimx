<div class="cosplay-gallery" x-data="carousel()">
    <div class="main-image aspect-w-1 aspect-h-1">
        <div class="bg-gray-50 ring ring-gray-100 rounded-md">
            <img :src="images[selected]" class="h-64 md:h-96 w-full object-contain object-center rounded-md" loading="lazy">
        </div>
    </div>
    <div class="sub-image">
        <div class="grid grid-cols-4 gap-6">
            <template x-for="(image,index) in images" :key="index">
                <button @click="selected = index" :class="{'ring-gray-200': selected == index, 'ring-transparent': selected != index}">
                    <span class="absolute inset-0 overflow-hidden rounded-md bg-gray-50">
                        <img :src="images[index]" class="h-full w-full object-cover object-center" loading="lazy">
                    </span>
                </button>
            </template>
        </div>
    </div>
</div>

@section('footerJS')
    <script>
        const carousel = () => {
            return {
                selected: 0,
                images: [
                    @foreach($post->image as $image)
                    '{{ asset($image) }}',
                    @endforeach
                ]
            };
        };
    </script>
@endsection
