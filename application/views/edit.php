<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <h1 align="center">Edit Details</h1>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url(); ?>Maincontroller/update/<?php echo $singledetail->id; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" placeholder="Enter your Name" class="form-control" value="<?php echo $singledetail->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" placeholder="Enter your Email-id" class="form-control" value="<?php echo $singledetail->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" placeholder="Enter your Password" class="form-control" value="<?php echo $singledetail->password; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" name="phone" id="" placeholder="Enter your Mobile no." class="form-control" value="<?php echo $singledetail->phone; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" id="" value="Update" class="btn btn-lg btn-success">
                </div>
            </form>
        </div>
    </div>
</body>

</html>