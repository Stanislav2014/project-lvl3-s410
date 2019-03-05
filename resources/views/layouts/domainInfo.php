
<html>
  <body>
<?php require 'navbar.php' ?>
<?php foreach ($domain as $item) : ?>
  <div class="jumbotron">
     <?= $item->id ?>
     <?= $item->name ?>
     <?= $item->created_at ?>
     <?= $item->updated_at ?>
  </div>
<?php endforeach ?>


    </body>
</html>
