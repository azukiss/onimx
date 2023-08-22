@extends('templates.global.page')

@section('headCSS')

@section('main')
    <div class="mb-20 space-y-4 sm:grid sm:grid-cols-2 sm:gap-6 sm:space-y-0 lg:mx-auto lg:max-w-4xl lg:grid-cols-3">
        @foreach($plans as $plan)
            <div class="flex flex-col border border-gray-400 divide-y divide-gray-200 rounded-lg shadow-sm">
                <div class="p-5 text-center">
                    <div class="flex flex-col leading-6">
                        <span class="text-2xl font-semibold tracking-normal">{{ str($plan->name)->upper() }}</span>
                        <span class="text-sm font-medium tracking-widest text-gray-500">{{ str(__('Membership'))->upper() }}</span>
                    </div>
                    <div class="flex flex-col mt-5 text-center">
                        <div class="text-4xl font-bold tracking-tight text-gray-900">{{ number_format($plan->price, 0, ',', '.') }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ $plan->currency->value . ' / ' . __('Month') }}</div>
                    </div>
                </div>
                <div class="p-5">
                    <ul class="space-y-4" role="list">
                        @foreach($plan->features as $feature)
                            <li class="flex justify-between space-x-3">
                                <div class="text-sm text-gray-500">
                                    <span class="font-semibold">{{ $feature->name }}</span>
                                    @if (!empty($feature->description))
                                    <span class="ml-1 cursor-pointer" x-data x-tooltip.raw="{{ $feature->description }}">
                                        <i class="fa-regular fa-circle-info fa-fw"></i>
                                    </span>
                                    @endif
                                </div>
                                <div>
                                    @if($feature->type == App\Enum\PlanFeature\TypeEnum::String) <span>{{ $feature->value }}</span>
                                    @elseif($feature->type == App\Enum\PlanFeature\TypeEnum::Icon) <i class="{{ $feature->value }} flex-shrink-0 text-green-500"></i>
                                    @elseif($feature->type == App\Enum\PlanFeature\TypeEnum::Boolean) <i class="fa-solid @if($feature->value == true) fa-check text-green-500 @else fa-times text-red-500 @endif fa-fw flex-shrink-0"></i>@endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="p-5 mt-auto space-y-4">
                    @if($plan->is_active)
                        <a href="{{ route('page.upgrade.payment', $plan->code) }}" class="block w-full py-2 text-sm font-semibold text-center text-white transition duration-150 ease-in-out bg-gray-700 border border-gray-100 rounded-md hover:bg-gray-900 hover:border-gray-100">{{ __('Buy') . ' ' . $plan->name }}</a>
                    @else
                        <button class="block w-full py-2 text-sm font-semibold text-center text-white bg-gray-400 border border-gray-100 rounded-md cursor-not-allowed">{{ __('Out of Stock') }}</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">{{ __('Frequently Asked Questions') }}</h2>
        <div class="mt-10 space-y-6 divide-y divide-gray-900/10" x-data="faqList()">
            <template x-for="(faq,index) in faqs" :key="index">
                <div class="pt-6" x-data="{show: false}">
                    <dt>
                        <button type="button" class="flex items-start justify-between w-full text-left text-gray-900" x-on:click="show = !show">
                            <span class="text-base font-semibold leading-7" x-text="faq.question"></span>
                            <span class="flex items-center ml-6 h-7">
                                <i class="w-6 h-6 fa-fw" x-bind:class="show ? 'fa-solid fa-minus' : 'fa-solid fa-plus'"></i>
                            </span>
                        </button>
                    </dt>
                    <dd class="pr-12 mt-2" id="faq-0" x-show="show" x-collapse.transition.500ms>
                        <p class="text-base leading-7 text-gray-600" x-text="faq.answer"></p>
                    </dd>
                </div>
            </template>
        </div>
    </div>
@endsection

@section('footerJS')
<script type="text/javascript" id="faqList">
    const faqList = () => {
        return {
            faqs: [
                {question: 'Question 1', answer: 'Lorem irure sint voluptate minim cupidatat nisi eu pariatur do nisi duis proident. Est occaecat ea voluptate tempor esse exercitation. Deserunt laboris minim fugiat cupidatat incididunt. Esse reprehenderit aliqua officia officia irure culpa pariatur est pariatur nisi cillum occaecat nisi. Pariatur exercitation do veniam occaecat proident culpa aliqua laborum enim aliquip sint magna ipsum dolore. Sint est officia ullamco et qui dolor ullamco reprehenderit et commodo.'},
                {question: 'Question 2', answer: 'Commodo ea labore sunt qui reprehenderit eiusmod labore labore. Sunt ad nulla aliquip esse irure voluptate in ad. Mollit et officia ipsum laborum consectetur ad ullamco. Proident culpa voluptate tempor laborum.'},
            ],
        };
    };
</script>
@endsection
