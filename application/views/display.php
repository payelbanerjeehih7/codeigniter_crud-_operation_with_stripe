<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Displayall</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>
    <div id="filteredResults">
        <div id="searchResults">
            <div class="table-responsiv">

                <table border="1" cellpadding="20" cellspacing="0" class="table table-hover table-border" id="mytable">

                    <h1 align="center">Registered members</h1>
                    <div class="btn btn-info" data-toggle="modal" data-target="#exampleModal">New Member</div>
                    <tr>
                        <th>SL.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Password</th>
                        <th>Phone</th>
                        <th>Registration Date</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($details as $all) : ?>
                        <tr>
                            <td><?php echo $all->id; ?></td>
                            <td><?php echo $all->name; ?></td>
                            <td><?php echo $all->email; ?></td>
                            <td><?php echo $all->age; ?></td>
                            <td><?php echo $all->password; ?></td>
                            <td><?php echo $all->phone; ?></td>
                            <td><?php echo $all->registrationdate; ?></td>
                            <td><a href="<?php echo base_url(); ?>Maincontroller/edit/<?php echo $all->id; ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo base_url(); ?>Maincontroller/delete/<?php echo $all->id; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <!-- <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul> -->

            <?php echo $this->pagination->create_links(); ?>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url(); ?>Maincontroller/submit" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" placeholder="Enter your Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" placeholder="Enter your Email-id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" placeholder="Enter your Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" name="phone" id="" placeholder="Enter your Mobile no." class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" id="" value="Submit" class="btn btn-lg btn-success">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php if ($this->session->flashdata('error')) :  ?>

            <div align="center" class="bg-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>


        <?php if ($this->session->flashdata('inserted')) :  ?>

            <div align="center" class="bg-success">
                <?php echo $this->session->flashdata('inserted'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('updated')) :  ?>

            <div align="center" class="bg-success">
                <?php echo $this->session->flashdata('updated'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('deleted')) :  ?>

            <div align="center" class="bg-success">
                <?php echo $this->session->flashdata('deleted'); ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>