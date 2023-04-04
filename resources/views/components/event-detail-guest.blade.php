<x-calendar-layout>
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

          <form method="GET" action="<?php echo route('login') ?>">
            @csrf
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


              <div class="mt-4">
                <?php if ($reservablePeople <= 0) : ?>
                  <span class="text-red-500 text-xs">このイベントは満員です</span>
                <?php else : ?>
                  <x-jet-label for="reserved_people" value="予約人数" />
                  <select name="reserved_people">
                    <?php for ($i = 1; $i <= $reservablePeople; $i++) : ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor; ?>
                  </select>
                <?php endif;  ?>
              </div>

              <?php if ($isReserved === null) : ?>
                <input type="hidden" name="id" value="<?php echo $event->id ?>">
                <?php if ($reservablePeople > 0) : ?>
                  <x-jet-button class="ml-4">
                    予約する
                  </x-jet-button>
                <?php endif; ?>

              <?php else : ?>
                <span class="text-xs">このイベント予約済です</span>
              <?php endif; ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-calendar-layout>