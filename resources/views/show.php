
<html>
  <body>
<?php require 'layouts/navbar.php' ?>

<?php foreach ($domains as $domain) : ?>
  <div class="jumbotron">
     <?= $domain->id ?>
     <?= $domain->name ?>
     <?= $domain->created_at ?>
     <?= $domain->updated_at ?>
  </div>
<?php endforeach ?>

    </body>
</html>