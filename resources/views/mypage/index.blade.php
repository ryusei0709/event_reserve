<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      予約済のイベント一覧
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


              <div class="w-full mx-auto overflow-auto">
              <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">イベント名</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日時</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日時</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                </thead>
                <tbody>
                  <?php foreach ($fromTodayEvents as $event) : ?>
                    <tr>
                      <td class="px-4 py-3 text-blue-500">
                        <a href="<?php echo route('mypage.show',['id' => $event['id']]) ?>">
                          <?php echo $event['name'] ?>
                        </a>
                      </td>
                      <td class="px-4 py-3"><?php echo $event['start_date'] ?></td>
                      <td class="px-4 py-3"><?php echo $event['end_date'] ?></td>
                      <td class="px-4 py-3 text-lg text-gray-900">
                        <?php echo $event['number_of_people'] ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>



  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="text-center py-2">過去のイベント一覧</h2>
        <section class="text-gray-600 body-font">
          <div class="container px-5 py-24 mx-auto">


              <div class="w-full mx-auto overflow-auto">
              <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">イベント名</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日時</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日時</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                </thead>
                <tbody>
                  <?php foreach ($pastEvents as $event) : ?>
                    <tr>
                      <td class="px-4 py-3 text-blue-500">
                        <a href="<?php echo route('mypage.show',['id' => $event['id']]) ?>">
                          <?php echo $event['name'] ?>
                        </a>
                      </td>
                      <td class="px-4 py-3"><?php echo $event['start_date'] ?></td>
                      <td class="px-4 py-3"><?php echo $event['end_date'] ?></td>
                      <td class="px-4 py-3 text-lg text-gray-900">
                        <?php echo $event['number_of_people'] ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>



</x-app-layout>