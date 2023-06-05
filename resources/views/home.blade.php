@extends('templates.global.page')

@section('main')
    <div class="flex flex-col lg:flex-row flex-shrink-0 gap-6">
        <div class="basis-full md:basis-3/4 lg:basis-4/5">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                <div class="card">
                    <a href="#" class="relative text-gra" x-data x-ripple>
                        <img src="https://raw.githubusercontent.com/ShareCosplay/images-6/main/Makachan%20-%201685665804006%20-%20Azur%20Lane%20-%20Chapayev/cover/d801d9e4d85ecfbe0a1b5a0e1e32802a.jpg" alt="product-1" class="rounded-t-lg" loading="lazy">
                        <div class="p-4">
                            <div class="font-normal text-base">Azur Lane</div>
                            <div class="font-medium text-xl">Chapayev</div>
                        </div>
                        <div class="px-6">
                            <div class="text-sm text-gray-500 font-mono space-y-0.5">
                                <div class="flex items-center space-x-3">
                                    <div>Pics:</div>
                                    <div>20 Pics</div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div>Vids:</div>
                                    <div>20 Vids</div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div>Size:</div>
                                    <div>20 MB</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="border-t p-4 mt-4">
                        <div class="flex items-center justify-between">
                            <div class="space-y-1">
                                <div class="font-medium">
                                    <a href="#" class="hover:text-indigo-500">Coser Name</a>
                                </div>
                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::now() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-full md:basis-1/4 lg:basis-1/5">
            <section aria-labelledby="announcements-title">
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="p-6">
                        <h2 class="text-base font-medium text-gray-900" id="announcements-title">Announcements</h2>
                        <div class="mt-6 flow-root">
                            <ul role="list" class="-my-5 divide-y divide-gray-200">

                                <li class="py-5">
                                    <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                        <h3 class="text-sm font-semibold text-gray-800">
                                            <a href="#" class="hover:underline focus:outline-none">
                                                <!-- Extend touch target to entire panel -->
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Office closed on July 2nd
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600 line-clamp-2">Cum qui rem deleniti. Suscipit in dolor veritatis sequi aut. Vero ut earum quis deleniti. Ut a sunt eum cum ut repudiandae possimus. Nihil ex tempora neque cum consectetur dolores.</p>
                                    </div>
                                </li>

                                <li class="py-5">
                                    <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                        <h3 class="text-sm font-semibold text-gray-800">
                                            <a href="#" class="hover:underline focus:outline-none">
                                                <!-- Extend touch target to entire panel -->
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                New password policy
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600 line-clamp-2">Alias inventore ut autem optio voluptas et repellendus. Facere totam quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel natus. Est sit autem mollitia.</p>
                                    </div>
                                </li>

                                <li class="py-5">
                                    <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                        <h3 class="text-sm font-semibold text-gray-800">
                                            <a href="#" class="hover:underline focus:outline-none">
                                                <!-- Extend touch target to entire panel -->
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Office closed on July 2nd
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600 line-clamp-2">Tenetur libero voluptatem rerum occaecati qui est molestiae exercitationem. Voluptate quisquam iure assumenda consequatur ex et recusandae. Alias consectetur voluptatibus. Accusamus a ab dicta et. Consequatur quis dignissimos voluptatem nisi.</p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="mt-6">
                            <a href="#" class="flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">View all</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
