@extends('includepage.template_master')
@section('content')



<div class="row">
<div id="addcard"></div>
</div>



<script>
 $(document).ready(function(){
        $.get("{{ url('momc/readdata') }}", function (data) {
           // console.log(data)      
             $.each(data.result, function (i,value) {
              //  alert(value.id);
             var templateString = '<div class="col-lg-2 col-xs-4"> <div class="small-box bg-aqua"> <div class="inner"> <h3></h3>' 
            + ' <p><h3>'+ value.Mc_Number +'</h3></p> </div>  <div class="icon">  <i class="ion ion-stats-bars"></i> </div>'
            + ' <a href="http://34.87.86.224:8001/mc-socket/n01" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>'
            +  '</div></div>'
          //  + '<p>' + mokData[i].name + '</p><p></p><button id="tes">Start</button></div></div>';
            $('#addcard').append(templateString);
            })
        })

            $("#addcard").on("click", function () {
                alert(value.Mc_Number);
            });
});
</script>
@endsection  
