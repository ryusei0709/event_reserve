<div>
    <div class="text-center text-sm">
        日付を選択して下さい。本日から最大30日まで選択できます。
    </div>
    <input id="calendar" class="block mt-1 mb-2 mx-auto" type="text" name="calendar" value="<?php echo $currentDate ?>" wire:change="getDate($event.target.value)" />

    <div class="flex border border-green-400 mx-auto">
        <x-calendar-time />
        <?php for ($i = 0; $i < 7; $i++) : ?>
            <div class="w-32">
                <div class="py-1 px-2 border h-8 border-gray-200 text-center"><?php echo $currentWeek[$i]['day'] ?></div>
                <div class="py-1 px-2 border h-8 border-gray-200 text-center"><?php echo $currentWeek[$i]['dayOfWeek'] ?></div>
                <?php for ($j = 0; $j < 21; $j++) : ?>
                    <?php if ($events->isNotEmpty()) : ?>
                        <?php if (!is_null($events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \Constant::EVENT_TIME[$j]))) : ?>

                            <?php

                            $eventId = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \Constant::EVENT_TIME[$j])->id;

                            $eventName = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \Constant::EVENT_TIME[$j])->name;
                            $eventInfo = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \Constant::EVENT_TIME[$j]);
                            // イベント開始時間と終了時間の差分をとる
                            $eventPriod = \Carbon\Carbon::parse($eventInfo->start_date)->diffInMinutes($eventInfo->end_date) / 30 - 1;
                            // echo $eventPriod;
                            ?>
                            <a href="<?php echo route('events.detail', ['id' => $eventId]) ?>">
                                <div class="py-1 px-2 h-8 border border-gray-200 text-xs bg-blue-100">
                                    <?php echo $eventName  ?>
                                </div>
                            </a>

                            <?php if ($eventPriod > 0) : ?>
                                <?php for ($k = 0; $k < $eventPriod; $k++) :  ?>
                                    <div class="py-1 px-2 h-8 border border-gray-200 text-xs bg-blue-100"></div>
                                <?php endfor; ?>
                            <?php endif; ?>

                            <?php $j += $eventPriod; ?>
                            
                        <?php else : ?>
                            <div class="py-1 px-2 h-8 border border-gray-200 ">
                            </div>
                        <?php endif; ?>

                    <?php else : ?>
                        <div class="py-1 px-2 h-8 border border-gray-200 ">
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
    </div>
</div>



</div>