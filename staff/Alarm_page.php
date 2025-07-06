<?php 
session_start();
if(!isset($_SESSION['login_user'])){
    header("Location:../index.php");
}
include 'header.php';
include '../conn.inc';
include 'session.php'; 
?>
<div class="card">
  <div class="card-body">
      

<div class="row">
    <div class="col">
        <b>Alarm List</b>
    </div>
    <div class="col-lg-3">
          <button type="button" class="btn btn-primary btn-sm" onclick= "printData()" style="float:right;"><i class="fa fa-plus"></i> Print</button>
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" style="float:right;"><i class="fa fa-plus"></i> Alarm Vehicle</button>


         <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Alarm MANAGEMENT</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        engine
        <input type="text" name="" class="form-control" id="engine">
        chassis
        <input type="text" name="" class="form-control" id="chassis">
        type
        <input type="text" name="" class="form-control" id="type">
        Rname
        <input type="text" name="" class="form-control" id="Rname">
        Address
        <input type="text" name="" class="form-control" id="Address">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="saveData()">Save Record</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>

    </div>
  </div>
</div>

    </div>
</div>
<hr style="margin-top:2px;">

<body onload="viewData()">
<table class="table table-bordered table-sm" id="myTable">
    <thead>
        <th>Vinid</th>
        <th>engine</th>
        <th>chassis</th>
        <th>type</th>
        <th>Rname</th>
        <th>Address</th>
        <th></th>
    </thead>
    <tbody>
        
    </tbody>
</table>
</body>


  </div>
</div>
<?php 
include 'footer.php';
?>
<script type="text/javascript">
function printData(){
      const pdfWindow = window.open('print.php', '_blank');
      pdfWindow.onload = function() {
      pdfWindow.print();
}
}
function viewData(){
         $.ajax({
            type: "GET",
            url: "Alarm_process.php",
            success: function(data){
               // alert(data);
                $('tbody').html(data);
                $('#myTable').DataTable();
            }
        });
    }

    function saveData(){
        var engine=$('#engine').val();
        var chassis=$('#chassis').val();
        var type=$('#type').val();
        var Rname=$('#Rname').val();
        var Address=$('#Address').val();

        $.ajax({
            type:"POST",
            url:"Alarm_process.php?page=add",
            data:"engine="+engine+"&chassis="+chassis+"&type="+type+"&Rname="+Rname+"&Address="+Address,
            success: function(data){
               // alert(data);
                Swal.fire({
                    title: "Successfully Saved",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                  }).then(function(){
                    location.reload();
                  });
            }
        });
    }
    function deleteData(Vinid){
        var Vinid=Vinid;
        $.ajax({
            type:"POST",
            url:"Alarm_process.php?page=del",
            data:"Vinid="+Vinid,
            success: function(data){
                Swal.fire({
                    title: "Successfully Deleted",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1500,
                  }).then(function(){
                    location.reload();
                  });
               
            }
        });
    }

     function updateData(Vinid){
        var Vinid=Vinid;
        var engine=$('#engine-'+Vinid).val();
        var chassis=$('#chassis-'+Vinid).val();
        var type=$('#type-'+Vinid).val();
        var Rname=$('#Rname-'+Vinid).val();
        var Address=$('#Address-'+Vinid).val();

        $.ajax({
            type:"POST",
            url:"Alarm_process.php?page=edit",
            data:"engine="+engine+"&chassis="+chassis+"&type="+type+"&Rname="+Rname+"&Address="+Address+"&Vinid="+Vinid,
            success: function(data){
                alert(data);
                location.reload();
            }
        });
    }
    
  
</script>