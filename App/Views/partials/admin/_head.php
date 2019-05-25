<!doctype html>
<html lang="en">
  <head>
  <?php require_once VIEWS.'partials/admin/_meta.php';?>

    <title>Dashboard Template for Bootstrap</title>

    <?php require_once VIEWS.'partials/admin/_styles.php';?>
  </head>

  <body>
  <?php require_once VIEWS.'partials/admin/_nav.php';?>

    <div class="container-fluid">
      <div class="row">
      <?php require_once VIEWS.'partials/admin/_aside.php';?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php require_once VIEWS.'partials/admin/_panel.php';?>