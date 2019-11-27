<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="PMFjIwFsrIZZa25aUSK5kTRlX40UsHPShRIZOzo4">

    <title>Laravel</title>

    <!-- Scripts -->
    <script src="http://eventsconnect.herokuapp.com/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="http://eventsconnect.herokuapp.com/css/app.css" rel="stylesheet">

    <style>
    table, th, td {
      border: 1px solid black;
    }
    .button {
       height:25px;
       width:50px;
        border-radius: 12px;
      background-color: #f44336; /* Green */
      border: none;
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel" margin>
            <div class="container">
                <a class="navbar-brand" href="http://eventsconnect.herokuapp.com">
                    The Aga Khan Hospital
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                     </ul>
                </div>
            </div>
        </nav>
<div class="row justify-content-center" margin: auto>
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Patients</div>

                <div class="card-body">

                     <table style="width:100%">
                      <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>STATUS</th>
                      </tr>
                      <?php $ids = array();
                      foreach($patients as $patients){
                      $id = $patients->id;
                      if(in_array($id, $ids) ) {
                             continue;
                          }
                          $ids[] = $id;?>
                      <tr>
                        <td><?php echo $patients->id?> </td>
                        <td><?php echo $patients->username?> </td>
                        <td><?php echo $patients->email?> </td>
                        <?php if ($patients->blood_glucose_value <= 70 || $patients->blood_glucose_value >= 198) { ?>

                            <td><a href="{{ route('patient', $patients->id)}}">
                                    <button type="submit" class="button"></button>
                                </a></td>
                        <?php } ?>
                      </tr>

                      <?php }  ?>


                    </table>

                </div>
            </div>
        </div>
    </div>

    </body>
</html>

