<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベントカレンダー
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="event-calendar mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div>
                    <?php if (session()->has('status')) : ?>
                        <div class="mb-4 font-medium text-sm text-green">
                            <?php echo session('status') ?>
                        </div>
                    <?php endif; ?>
                </div>

                @livewire('calendar')
            </div>
        </div>
    </div>
    @vite(['resources/js/app.js','resources/js/flatpickr.js'])
</x-app-layout>