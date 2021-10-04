<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Room4Chat - Admin Dashboard</title>

    <?php include('csslinks.php'); ?>

</head>

<body>
    <div class="app">
        <div class="layout">

            <!-- Page Container START -->
            <div class="page-container">
                <div class="main-content">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <input class='btn btn-decondary' type="button" value="Go back!" onclick="history.back()">
                            </div>
                        
                            <!-- <form class="project-form" id="projform" method="POST" action=""> -->
                            <form class="project-form">
                            <input type="hidden" id="projectid" value="<?php echo $record->id;?>" >
                                <div id="ErrorAlert" class="alert alert-danger" style="display:none"> 
                                    Something Went Wrong!!
                                </div>
                                
                                <div id="SuccessAlert" class="alert alert-success" style="display:none"> 
                                    Successfully Updated
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Project Name</label>
                                        <input type="text" class="form-control" id="projectname" value="<?php echo $record->projectname;?>" placeholder="Project Name" onkeypress="return blockSpecialChar(event)" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Project Start Date</label>
                                        <input type="date" class="form-control" id="startdate" value="<?php echo $record->startdate;?>" placeholder="Pick a date" id="startdate" required>                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Project value</label>
                                    <div>
                                        <select id="currency" class="form-control" style="width: 20%; float: left;" required>
                                            <option disabled value="">Select Currency</option>
                                            <option selected value="<?php echo $record->currency;?>"><?php echo $record->currency;?></option>                                            
                                            <option value="USD">USD</option>
                                            <option value="JPY">JPY</option>
                                            <option value="GBP">GBP</option>
                                        </select>
                                        <input type="text" id="projvalue" class="form-control" value="<?php echo $record->projectvalue;?>" placeholder="Project Value" onkeypress="return isNumberKey(event)" style="width: 80%; display: inline-block;" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Project Value in Eur</label>
                                    <input type="text" readonly class="form-control" id="projtotalvalue" value="<?php echo $record->valueineur;?>" required>
                                </div>
                                <button type="submit" value="submit" class="btn btn-primary" id="submit-btn">Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Page Container END -->
        </div>
    </div>

    <?php include('jslinks.php'); ?>


    <script type="text/javascript">
        function blockSpecialChar(e){
            var k;
            document.all ? k = e.keyCode : k = e.which;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
        }

        $(function(){
            var dtToday = new Date();
            
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var minDate= year + '-' + month + '-' + day;
            
            $('#startdate').attr('min', minDate);
        });

        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        $(document).ready(function(){
            
            var currrencyvalue = 0;

            $('#projvalue').on('input', function(e) {
                calculatepojectprice();
            });

            $('#currency').change(function(){
                calculatepojectprice();
            });

            function calculatepojectprice(){

                var projvalue = parseInt($('#projvalue').val());
                if(isNaN(projvalue)){
                    projvalue = 0;
                }
                console.log(projvalue);
                var curr = $('#currency').val();

                if(curr=='USD'){
                    currrencyvalue = 2;
                }
                if(curr=='JPY'){
                    currrencyvalue = 2.5;
                }
                if(curr=='GBP'){
                    currrencyvalue = 3;
                }

                var TotalPrice = projvalue * currrencyvalue;
                $('#projtotalvalue').val($.trim(TotalPrice));

            }

            $("form").on('submit', function(){
                event.preventDefault();
                updateindatabase();
            });

            function updateindatabase(){
                var projectid = $('#projectid').val();
                var projectname = $('#projectname').val();
                var startdate = $('#startdate').val();
                var currency = $('#currency').val();
                var projectvalue = $('#projvalue').val();
                var totalprojvalue = $('#projtotalvalue').val();
            
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>UpdateProject",
                    data: {projectid: projectid,projectname: projectname, startdate: startdate, currency: currency, projectvalue: projectvalue, totalprojvalue: totalprojvalue},
                    dataType:"json",//return type expected as json
                    success: function(data){
                        console.log(data);
                        if (data == true) {
                            $('#SuccessAlert').show();
                            $('#ErrorAlert').hide();
                        } else {
                            $('#SuccessAlert').hide();
                            $('#ErrorAlert').show();
                        }
                    },
                });
            }

            

            


        });

        

        

        


    </script>

</body>

</html>