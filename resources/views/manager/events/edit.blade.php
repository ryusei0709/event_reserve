<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベントの編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                
                <div class="max-w-2xl py-4 mx-auto">
                    <div>
                        <?php if (session()->has('status')) : ?>
                            <div class="mb-4 font-medium text-sm text-green">
                                <?php echo session('status') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="<?php echo route('events.update', ['event' => $event->id]) ?>">
                        @csrf
                        <!-- routeのブッキング防止 -->
                        @method('put')

                        <div>
                            <x-jet-label for="event_name" value="イベント名" />
                            <x-jet-input id="event_name" class="block mt-1 w-full" type="text" name="event_name" value="{{ $event->name }}" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="information" value="イベント詳細" />
                            <x-textarea row="3" id="information" name="information" class="block mt-1 w-full">{{ $event->information }}</x-textarea>
                        </div>

                        <div class="md:flex justify-between">

                            <div class="mt-4">
                                <x-jet-label for="event_date" value="イベント日付" />
                                <x-jet-input id="event_date" class="block mt-1 w-full" type="text" value="{{ $eventDate }}" name="event_date" required />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="start_time" value="開始時間" />
                                <x-jet-input id="start_time" value="{{ $startTime}}" class="block mt-1 w-full" type="text" name="start_time" required />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="end_time" value="終了時間" />
                                <x-jet-input id="end_time" class="block mt-1 w-full" type="text" value="{{ $endTime }}" name="end_time" required autocomplete="new-password" />
                            </div>

                        </div>

                        <div class="md:flex justify-between items-end">
                            <div class="mt-4">
                                <x-jet-label for="max_people" value="定員数" />
                                <x-jet-input id="max_people" class="block mt-1 w-full" value="{{ $event->max_people }}" type="number" name="max_people" required />
                            </div>

                            <div class="flex space-x-4 justify-around">

                                <input type="radio" name="is_visible" value="1" @if($event->is_visible === 1) { checked } @endif  >表示
                                <input type="radio" name="is_visible" value="0"  @if($event->is_visible === 0) { checked } @endif  >非表示

                            </div>
                            <x-jet-button class="ml-4">
                                更新する
                            </x-jet-button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>