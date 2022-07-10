<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <!--Scripts-->
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

    <style>
        /* body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
        .hoverEffect {
            font-size: 29px;
            position: absolute;
            margin: 30px 55px;
            cursor: pointer;
        } */
    </style>
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
<div class="container">
    <h1>Appointment Listing</h1>
    <div class="row" style="width:50%">
      <div class="row">
        <div class="col-lg-4" style="margin:100px;margin-top:30px;">
          <button type="submit" class="btn btn-primary"><a style="color:#fff;" href="<?=base_url()?>Appointment/book">Create an Appointment</a></button>
        </div>
      </div>
       <div class="col-md-12">
           <div id="calendar"></div>
       </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container" style="display:flex;flex-direction:column;justify-content:center;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <a><span style="font-weight:600;color:#f00;cursor:pointer;" aria-hidden="true">X</span></a>
          </button>
          <span style="font-size:normal;font-weight:normal;" class="span-text1"></span><p class="text1" style="font-size:18px;font-weight:600"></p>
          <span style="font-size:normal;font-weight:normal;" class="span-text2"></span><p class="text2" style="font-size:14px;"></p>          
          <div class="row">
            <?php foreach($result as $key=>$value) { ?>
            <div class="col-lg-4">
              <button type="submit" class="btn btn-primary"><a style="color:#fff;" href="<?=base_url()?>Appointment/update/<?=$value['aa_id']?>">Edit</a></button>
              <button type="submit" class="btn btn-danger"><a style="color:#fff;" href="<?=base_url()?>Appointment/delete/<?=$value['aa_id']?>">Delete</a></button>
            </div>
            <?php break; } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  
    var events = <?php echo json_encode($data) ?>;
    console.log(events)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    $(document).ready(function() {

      $('#calendar').fullCalendar({
        events: events,

        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
        },
        //navLinks: true, // can click day/week names to navigate views
        editable: true,
       // eventLimit: true, // allow "more" link when too many events
      
        eventClick: function(event) {
          $("#successModal").modal("show");
          $("#successModal .modal-body .text2").text(event.name);
          $("#successModal .modal-body .span-text2").text("Visitor Name: ");
          $("#successModal .modal-body .text1").text(event.title);
          $("#successModal .modal-body .span-text1").text("Doctor Name: ");
        }
       });

    });
</script>
</body>
</html>