<div class="cosplay-gallery" x-data="carousel()">
    <div class="main-image aspect-w-1 aspect-h-1">
        <div>
            <img :src="images[selected]" class="h-64 md:h-96 w-full object-cover object-center rounded-md" loading="lazy">
        </div>
    </div>
    <div class="sub-image">
        <div class="grid grid-cols-4 gap-6">
            <template x-for="(image,index) in images" :key="index">
                <button @click="selected = index" :class="{'ring-oni-500': selected == index, 'ring-transparent': selected != index}">
                    <span class="absolute inset-0 overflow-hidden rounded-md">
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
                    "https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80",
                    "https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80",
                    "https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80",
                    "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80",
                ]
            };
        };
    </script>
@endsection
