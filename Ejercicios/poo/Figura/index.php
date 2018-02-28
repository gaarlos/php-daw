<html>
<head>
  <link rel="stylesheet" href="css/master.css">
</head>
<body>
<div class="container">
  <form action="index.php" method="post" class="d-flex flex-column first-form">
    <div>
      <input type="checkbox" name="figure[]" value="circle">
      <label for="circle">Circle</label>
    </div>
    <div>
      <input type="checkbox" name="figure[]" value="square">
      <label for="square">Square</label>
    </div>
    <div>
      <input type="checkbox" name="figure[]" value="rectangle">
      <label for="rectangle">Rectangle</label>
    </div>
    <input type="submit" value="Next" name="next">
  </form>
  <?php
    if(isset($_POST['next'])) {
      if(isset($_POST['figure'])) {
        require_once('figureInput.php');
        printForm($_POST['figure']);
      }
    }

    if(isset($_POST['print'])) {
      require_once('utils/create_figure.php');
    }
  ?>
</div>
</body>
</html>