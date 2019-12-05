@extends('includepage.template_master')
@section('content')



<div class="row">
<div id="test12"></div>
</div>



<script>
 $(document).ready(function(){
        $.get("{{ url('testmc/readdata') }}", function (data) {
           // console.log(data)      
             $.each(data.result, function (i,value) {
              //  alert(value.id);
             var templateString = '<div class="col-lg-2 col-xs-4"> <div class="small-box bg-aqua"> <div class="inner"> <h3>'+ value.id +'</h3>' 
            + ' <p>'+ value.Mc_Number +'</p> </div>  <div class="icon">  <i class="ion ion-stats-bars"></i> </div>'
            + ' <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>'
            +  '</div></div>'
          //  + '<p>' + mokData[i].name + '</p><p></p><button id="tes">Start</button></div></div>';
            $('#test12').append(templateString);
            })
        })

            $("#test12").on("click", function () {
                alert("test");
            });
});



</script>
@endsection  
