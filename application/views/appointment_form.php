<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('asset/css/jquery-ui.css'); ?>" />
    <title>Document</title>
    <style>
        .form-center{
            width:100%;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="form-center">
        <?php echo validation_errors(); ?>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="alert alert-error alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php endif; ?>
    </div>
    <form action="<?=base_url()?>Appointment/book" method="post">
            <div class="form-center">
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div id="date-picker" class="mb-4" inline="true">
                    <label for="example">Select Appointment Date</label>    
                    <?php $attributes = 'id="date" placeholder="Date of Appointment" required name="date" class="form-control"';
                        echo form_input('date', set_value('date'), $attributes); ?>
                </div>
                <!-- <div class="mb-4">
                    <select style="display:none;" class="form-select" id="time" name="time" aria-label="Default select example">
                        <option selected>Select Time Slot (one slot is for 30 min)</option>
                        <option value="1">9.00 AM</option>
                        <option value="2">9.30 AM</option>
                        <option value="3">10.00 AM</option>
                        <option value="4">10.30 AM</option>
                        <option value="5">11.00 AM</option>
                        <option value="6">11.30 AM</option>
                        <option value="7">12.00 PM</option>
                        <option value="8">12.30 PM</option>
                    </select>
                </div> -->
                <div class="mb-4">
                    <select class="form-select" name="doctor" aria-label="Default select example">
                        <option selected>Select a Doctor</option>
                        <option value="1">Doctor 1</option>
                        <option value="2">Doctor 2</option>
                        <option value="3">Doctor 3</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="message" class="form-label">Message</label>
                    <textarea type="text" class="form-control" id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>    <script>
        // Data Picker Initialization
        $(document).ready(function() {
            $("#date").datepicker({ 
                minDate: 0,
                beforeShowDay: $.datepicker.noWeekends
            })
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>