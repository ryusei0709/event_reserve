<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @livewireStyles
  <title>Document</title>
</head>

<body>
  <h1>test livewire</h1>
  <div>
    <?php if(session()->has('message')) : ?>
    <div class="">
      <?php echo session('message') ?> 
    </div>
    <?php endif; ?>
  </div>

  <livewire:counter>


    @livewireScripts
</body>

</html>