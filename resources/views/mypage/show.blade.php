<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベントの詳細
        </h2>
    </x-slot>

    <div class="pt-4 pb-2">
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

                    <form method="POST" id="cancel_<?php echo $event->id ?>" action="<?php echo route('mypage.cancel', ['id' => $event->id]) ?>">
                        @csrf
                        <div class="md:flex justify-between items-end">
                            <div class="mt-4">
                                <x-jet-label value="予約人数" />
                                <?php echo $reservation->number_of_people ?>
                            </div>

                            <!-- <?php
                            echo $event->eventDate . '<br>';
                            echo  \Carbon\Carbon::today()->format('Y年m月d日') . '<br>';
                            echo $event->event_date;
                            ?> -->

                            <?php if ($event->eventDate < \Carbon\Carbon::today()->format('Y年m月d日')) : ?>
                                <a href="#" data-id="<?php echo $event->id ?>" onclick="cancelpost(this)" class="ml-4 text-white py-2 px-4" style="background: red;">
                                    キャンセルする
                                </a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>

    const cancelpost = (e) => {
        if(window.confirm('本当にキャンセルしますか?')) {
            document.getElementById('cancel_' + e.dataset.id).submit()
        }
    }

</script>
</x-app-layout>