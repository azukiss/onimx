<div x-data="{ HowToCarousel: false }">
    <button @click="HowToCarousel = ! HowToCarousel" type="button" class="group relative flex w-full items-center justify-between py-6 text-left">
        <div class="text-gray-900 text-sm font-medium">How to Download</div>
        <div class="ml-6 flex items-center">
            <i :class="{'!block': HowToCarousel == false, '!hidden': HowToCarousel != false}"
               class="fa-solid fa-plus fa-fw h-6 w-6 group-hover:text-scooter-500"></i>
            <i :class="{'!block': HowToCarousel == true, '!hidden': HowToCarousel != true}"
               class="fa-solid fa-minus fa-fw h-6 w-6 group-hover:text-oni-500"></i>
        </div>
    </button>
    <div class="prose prose-sm pb-6 transform transition duration-300 ease-in-out">
        <ul x-show="HowToCarousel" x-collapse x-collapse.duration.500ms>
            <li>Multiple strap configurations</li>
            <li>Spacious interior with top zip</li>
            <li>Leather handle and tabs</li>
            <li>Interior dividers</li>
            <li>Stainless strap loops</li>
            <li>Double stitched construction</li>
            <li>Water-resistant</li>
        </ul>
    </div>
</div>
