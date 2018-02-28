<html>
<head>
  <link rel="stylesheet" href="css/master.css">
</head>
<body>
<div class="container">
  <form action="index.php" method="post" class="d-flex flex-column first-form">
    <div>
      <input type="radio" value="circle" name="figure" required>
      <label for="circle">Circle</label>
    </div>
    <div>
      <input type="radio" value="square" name="figure" required>
      <label for="square">Square</label>
    </div>
    <div>
      <input type="radio" value="rectangle" name="figure" required>
      <label for="rectangle">Rectangle</label>
    </div>
    <input type="submit" value="Next" name="next">
  </form>
  <?php
    if(isset($_POST['next'])) {
      require_once('utils/figure_options.php');

      if(isset($_POST['figure'])) {    
        $figure = $_POST['figure'];
        setFigureOptions($figure);
      }
    }

    if(isset($_POST['print'])) {
      require_once('utils/create_figure.php');
      header('Location: figure.php');
    }
  ?>
</div>
</body>
</html>