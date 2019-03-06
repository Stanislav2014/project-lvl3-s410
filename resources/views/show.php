
<html>
  <body>
<?php require 'layouts/navbar.php' ?>

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
  <?php foreach ($domains as $domain) : ?>
    <tr>
      <th scope="row"><?= $domain->id ?></th>
      <td><?= $domain->name ?></td>
      <td><?= $domain->created_at ?></td>
      <td><?= $domain->updated_at ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

    </body>
</html>