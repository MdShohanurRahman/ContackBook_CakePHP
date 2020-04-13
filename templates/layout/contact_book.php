<?php
  $c_name = $this->request->getParam('controller');
$cakeDescription = 'Index';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?= $this->Html->css('cakehelper.css') ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title><?= $this->fetch('title') ?></title>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body>

    <!-- include template -->
    <?= $this->element('nav'); ?>


    <div class="container-fluid">
        <br>
        <?= $this->Flash->render() ?>
        <div class="row mt-2">

            <?php if($username): ?>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active">Dashboard</li>
                    
                    <li class="list-group-item "> <?= $this->Html->link('My Profile', ['controller'=>'users','action'=>'dashboard']) ?></li>
                    <li class="list-group-item">
                        <?= $this->Html->link('Groups', ['controller' => 'groups', 'action' => 'index']) ?></li>
                    
                    
                    <li class="list-group-item "> <?= $this->Html->link('Contacts', ['controller' => 'contacts', 'action' => 'index']) ?></li>
                    <?php if($status == 1) : ?>
                    <li class="list-group-item "> <?= $this->Html->link('Users', ['controller' => 'users', 'action' => 'index']) ?></li>
                    <?php endif; ?>

                </ul>
            </div>
            <div class="col-md-9">
                <?= $this->fetch('content') ?>
            </div>
            <?php else: ?>
            <div class="col">
                <?= $this->fetch('content') ?>
            </div>
            <?php endif; ?>
        </div>
        <br>
        <br>
        <br>

<div class="footer bg-dark navbar-dark mt-5">
  <p>@copyright 2020</p>
</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script>
    $(".alert").alert();
    window.setTimeout(function() { $(".alert").alert('close'); }, 5000);
    </script>


</body>


</html>
