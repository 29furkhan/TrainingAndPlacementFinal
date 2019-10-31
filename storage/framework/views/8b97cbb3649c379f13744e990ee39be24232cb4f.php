<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
        <div style="margin-top:30px;display:flex;align-items:center;flex-direction:column;">
            <form method="POST" action="/payment" style="width:50%;" class="form-group">
                <?php echo e(csrf_field()); ?>

                <label> Price </label><br>
                <input placeholder="Enter the Price" type="number" name="amount" class="form-control"/><br>
                <input class="btn btn-primary" type="submit" />
            </form>
        </div>
</body><?php /**PATH C:\Furkhan\XAMPP\htdocs\TPO\resources\views/Pages/checkout.blade.php ENDPATH**/ ?>