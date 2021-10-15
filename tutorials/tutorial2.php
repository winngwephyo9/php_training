<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial2</title>
</head>
<body>
  <?php
  $n =6;
  $space = $n - 1;
  for ($j = 1; $j<= $n; $j++)
  {
    for ($i = 1;$i<= $space; $i++)
    {
      echo "&nbsp;&nbsp;";
    }
    $space--;
    for ($i = 1;$i <= 2 * $j - 1; $i++)
    {
      echo"*";
    }
    echo "<br>";
  }
  $space = 1;
  for ($j = 1; $j<= $n - 1; $j++)
  {
    for ($i = 1; $i<= $space; $i++)
    {
      echo "&nbsp;&nbsp;";
    }
    $space++;
    for ($i = 1; $i<= 2 * ($n - $j) - 1; $i++)
    { echo"*";
    }
    echo"<br>";
  }
  ?>
</body>
</html>
