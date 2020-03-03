<?php
  $from_date = date("Y-m-d");
  $to_date = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>

    <title>Login</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>

  <?php include 'process.php'; ?>
  <?php
    $mysqli = new mysqli('localhost', 'root', '', 'document') or die(mysqli_error(mysqli));
    $result = $mysqli->query("SELECT name, location from users where joindate between '$from_date' and '$to_date' order by joindate") or die($mysqli->error);

    //pre_r($res->fetch_assoc());
    ?>
    <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
              <form class="form-inline" role="form" method="post">
                    <div class="form-group">
                          <label>From Date</label>
                          <input tabindex="1"
                                 value="<?php echo $from_date; ?>" type="date"
                                 maxlength="10" class="form-control"  name="from_date"/>
                          <label>To Date</label>
                          <input tabindex="1"
                                 value="<?php echo $to_date; ?>" type="date"
                                 maxlength="10" class="form-control" name="to_date"/>
                          <input required="required" class="btn btn-success" type="submit"
                                 name="search" value="Show"/>
                    </div>
              </form>
            </div>
          </div>
      </div>

    <div class="table justify-content-center">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Location</th>

          </tr>
        </thead>
      <?php

      while ($row = $result->fetch_array()):
      ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['location']; ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
  </form>

</body>
</html>