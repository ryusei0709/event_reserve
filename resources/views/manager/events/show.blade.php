<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベントの詳細
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

                    <form method="GET" action="<?php echo route('events.edit', ['event' => $event->id]) ?>">
                        <div>
                            <x-jet-label for="event_name" value="イベント名" />
                            <?php echo $event->name ?>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="information" value="イベント詳細" />
                            <?php echo nl2br(e($event->information)) ?>
                        </div>

                        <div class="md:flex justify-between">

                            <div class="mt-4">
                                <x-jet-label for="event_date" value="イベント日付" />
                                <?php echo $event->event_date ?>
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="start_time" value="開始時間" />
                                <?php echo $event->startTime ?>
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="end_time" value="終了時間" />
                                <?php echo $event->endTime ?>
                            </div>

                        </div>

                        <div class="md:flex justify-between items-end">
                            <div class="mt-4">
                                <x-jet-label for="max_people" value="定員数" />
                                <?php echo $event->max_people ?>
                            </div>

                            <div class="flex space-x-4 justify-around">
                            <?php if($event->is_visible) : ?>
                                表示中
                            <?php else  : ?>
                                非表示
                            <?php endif; ?>
                            </div>
                            <x-jet-button class="ml-4">
                                編集する
                            </x-jet-button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>