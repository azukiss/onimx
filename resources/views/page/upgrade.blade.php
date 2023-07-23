@extends('templates.global.page')

@section('main')
    <div class="space-y-4 sm:grid sm:grid-cols-2 sm:gap-6 sm:space-y-0 lg:mx-auto lg:max-w-4xl lg:grid-cols-3 mb-20">
        @foreach($plans as $plan)
            <div class="divide-y divide-gray-200 rounded-lg border border-gray-400 shadow-sm">
                <div class="p-6">
                    <div class="text-2xl font-medium leading-6 text-center">{{ str($plan->name)->title() }}</div>
                    <p class="flex flex-col mt-5 text-center">
                        <span class="text-4xl font-bold tracking-tight text-gray-900">{{ number_format($plan->price, 0, ',', '.') }}</span>
                        <span class="text-base font-medium text-gray-500">{{ str($plan->currency)->upper() }} / {{ __('Month') }}</span>
                    </p>
                    @if($plan->stock > 0)
                        <a href="#" class="mt-8 block w-full rounded-md border border-gray-100 bg-gray-700 py-2 text-center text-sm font-semibold text-white hover:bg-gray-900 hover:border-gray-100 transition ease-in-out duration-150">{{ __('Buy') . ' ' . $plan->name }}</a>
                    @else
                        <button class="mt-8 block w-full rounded-md border border-gray-100 bg-gray-400 py-2 text-center text-sm font-semibold text-white cursor-not-allowed">{{ __('Out of Stock') }}</button>
                    @endif
                </div>
                <div class="px-6 pt-6 pb-8">
                    <h3 class="text-sm font-medium text-gray-900">{{ __('Upgrade Perks') }}</h3>
                    <ul role="list" class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <!-- Heroicon name: mini/check -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Potenti felis, in cras at at ligula nunc.</span>
                        </li>

                        <li class="flex space-x-3">
                            <!-- Heroicon name: mini/check -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">Orci neque eget pellentesque.</span>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mx-auto max-w-4xl divide-y divide-gray-900/10">
        <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">Frequently asked questions</h2>
        <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
            <div class="pt-6">
                <dt>
                    <!-- Expand/collapse question button -->
                    <button type="button" class="flex w-full items-start justify-between text-left text-gray-900" aria-controls="faq-0" aria-expanded="false">
                        <span class="text-base font-semibold leading-7">What&#039;s the best thing about Switzerland?</span>
                        <span class="ml-6 flex h-7 items-center">
                <!--
                  Icon when question is collapsed.

                  Heroicon name: outline/minus-small

                  Item expanded: "hidden", Item collapsed: ""
                -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                </svg>
                            <!--
                              Icon when question is expanded.

                              Heroicon name: outline/plus-small

                              Item expanded: "", Item collapsed: "hidden"
                            -->
                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg>
              </span>
                    </button>
                </dt>
                <dd class="mt-2 pr-12" id="faq-0">
                    <p class="text-base leading-7 text-gray-600">I don&#039;t know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.</p>
                </dd>
            </div>

            <!-- More questions... -->
        </dl>
    </div>
@endsection
