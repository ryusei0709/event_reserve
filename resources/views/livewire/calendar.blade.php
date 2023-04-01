<div>
    calendar
    <input id="calendar" class="block mt-1 w-full" type="text" name="calendar" value="<?php echo $currentDate ?>" wire:change="getDate($event.target.value)" />

    <?php echo $currentDate ?>
    <div class="flex">
        <?php for ($day = 0; $day < 7; $day++) : ?>
            <?php echo $currentWeek[$day] ?>
        <?php endfor; ?>
    </div>

    <?php foreach($events as $event) : ?>
        <?php echo $event->start_date ?> <br>
    <?php endforeach; ?>

</div>