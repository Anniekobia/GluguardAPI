<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
         <?php foreach($patients as $patient){ ?>
            <tr>
              <td><?php echo $patient->id?> </td>
              <td><?php echo $patient->blood_glucose_level?> </td>
              <td><?php echo $patient->type?> </td>
              <td><?php echo $patient->created_at?> </td>
            </tr>
         <?php }  ?>
    </body>
</html>
