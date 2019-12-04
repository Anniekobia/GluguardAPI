<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="PMFjIwFsrIZZa25aUSK5kTRlX40UsHPShRIZOzo4">

    <title>Aga Khan</title>

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
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blood Glucose Records</div>
                <div class="card-body">
                    <table style="width:100%">
                      <tr>
                        <th>TIME RECORDED</th>
                        <th>GLUCOSE LEVEL</th>
                        <th>TYPE</th>
                      </tr>
                      <?php foreach ($bg as $bg){?>
                      <tr>
                            <td><?php echo $bg->created_at?> </td>
                            <td><?php echo $bg->blood_glucose_value?> </td>
                            <td><?php echo $bg->blood_glucose_type?> </td>
                      </tr>
                      <?php }?>
                    </table>
                </div>

                <!--/*<div class="card-body">
                <table style="width:100%">
                  <tr>
                    <th>TIME RECORDED</th>
                    <th>MEAL</th>
                    <th>QUANTITY</th>
                    <th>CALORIES</th>
                  </tr>
                  <?php foreach ($meals as $meals){?>
                  <tr>
                    <td><?php echo $meals->created_at?> </td>
                    <td><?php echo $meals->meal_name?> </td>
                    <td><?php echo $meals->quantity?> </td>
                    <td><?php echo $meals->calories?> </td>
                  </tr>
                  <?php }?>
                </table>
            </div>
            <div class="card-body">
                <table style="width:100%">
                  <tr>
                    <th>TIME RECORDED</th>
                    <th>EXERCISE</th>
                    <th>CALORIES BURNT</th>
                  </tr>
                  <?php foreach ($exercises as $exercises){?>
                  <tr>
                    <td><?php echo $exercises->created_at?> </td>
                    <td><?php echo $exercises->exercise_name?> </td>
                    <td><?php echo $exercises->calories_burnt?> </td>
                  </tr>
                  <?php }?>
                </table>
            </div>
             <div class="card-body">
                 <table style="width:100%">
                   <tr>
                     <th>TIME RECORDED</th>
                     <th>MEDICATION</th>
                     <th>UNITS</th>
                   </tr>
                   <?php foreach ($meds as $meds){?>
                   <tr>
                     <td><?php echo $meds->created_at?> </td>
                     <td><?php echo $meds->name?> </td>
                     <td><?php echo $meds->units?> </td>
                   </tr>
                   <?php }?>
                 </table>
             </div>*/-->
        </div>
    </div>
    </body>
</html>

