
<html>
  <body>
<?php require 'navbar.php' ?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($domain as $item) : ?>
    <tr>
      <th scope="row"><?= $item->id ?></th>
      <td><?= $item->name ?></td>
      <td><?= $item->created_at ?></td>
      <td><?= $item->updated_at ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>


    </body>
</html>
