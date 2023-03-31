<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      イベント管理
    </h2>
  </x-slot>

  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <section class="text-gray-600 body-font">
          <div class="container px-5 py-24 mx-auto">

            <div>
              <?php if (session()->has('status')) : ?>
                <div class="mb-4 font-medium text-sm text-green">
                  <?php echo session('status') ?>
                </div>
              <?php endif; ?>
            </div>

            <button onclick="location.href='<?php echo route('events.create') ?>'" class="mb-4 flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">新規登録</button>
            <div class="w-full mx-auto overflow-auto">
              <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">イベント名</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日時</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日時</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                    <th class="px-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">店員</th>
                    <th class="px-4 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">表示・非表示</th>
                </thead>
                <tbody>
                  <?php foreach ($events as $event) : ?>
                    <tr>
                      <td class="px-4 py-3 text-blue-500">
                        <a href="<?php echo route('events.show',['event' => $event->id]) ?>">
                          <?php echo $event->name ?>
                        </a>
                      </td>
                      <td class="px-4 py-3"><?php echo $event->start_date ?></td>
                      <td class="px-4 py-3"><?php echo $event->end_date ?></td>
                      <td class="px-4 py-3 text-lg text-gray-900">後</td>
                      <td class="px-4 text-center"><?php echo $event->max_people ?></td>
                      <td class="px-4 text-center"><?php echo $event->is_visible ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="flex justify-end">
              <!-- <nav aria-label="Pagination"> -->
                <!-- <ul class="inline-flex items-center -space-x-px rounded-md text-sm shadow-sm"> -->
                  {{ $events->links() }}
                <!-- </ul> -->
              <!-- </nav> -->
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</x-app-layout>