@extends('includepage.template_master')
@section('content')



<!--  <div class="box box-success">    
    <div class="box-body">
            <div class="lockscreen-logo">
          
            <h1 class="bold" align="center">MACHINE MONITOR</h1>
            </div>
    </div>   
  </div> -->



  <div class="box-body col-md-12">    
    
          <div class=" col-xs-3">
            
          </div>

          <div class="col-xs-3">
          </div>

          <div class=" col-xs-3">
          </div>

          <div class="input-group input-group-sm col-xs-3">
            <input type="text" id="inmc" class="form-control">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-success btn-flat Search">Search</button>
                </span>
          </div> 
  </div>


<div class="row">
<div id="addcard"></div>
</div>





<script>
 $(document).ready(function(){
        $.get("{{ url('momc/readdata') }}", function (data) {
           console.log(data)      
           jQuery.each(data.result, function (i,value) {
           
            var templateString = '<div class="addcard col-lg-2 col-xs-4" id = "'+ value.Mc_Number +'">';
         
              templateString = templateString + '<div class="small-box" style="background: white;"> ';
              templateString = templateString+ '<div class="inner" style="color:black;">';
              templateString = templateString+ '<h3>'+ value.Mc_Number +'</h3>' ;

          if ((value.status == "Idle") || (value.status == "Running"))
          {
              templateString = templateString + '<p><h3><span class=" label label-success">'+ value.status +'</span></h3></p> </div>';
          }
          else
          {
              templateString = templateString + '<p><h3><span class=" label label-danger">'+ value.status +'</span></h3></p> </div>' ;
          }
              templateString = templateString + '<div class="pull-center icon">  <i class="ion ion-stats-bars"></i> </div>';
              templateString = templateString + '<a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>';
              templateString = templateString + '</div></div>';


          //  + '<p>' + mokData[i].name + '</p><p></p><button id="tes">Start</button></div></div>';
            $('#addcard').append(templateString);
            })
        })
            
           // $(".addcard").on("click", function () {
           //     alert($(this).attr('id'));
           // });
});
</script>

<script>
    $(document).on('click', '.Search', function(){
     var valuesmcs = $('#inmc').val();

     if (valuesmcs.length != 0)
     {
      $("#addcard").empty();
    // alert(valuesmc);
      // alert('yes');
           $.get("{{ url('momc/readdatabymc') }}"+'/' + valuesmcs, function (data) {
                 // console.log(data)      
                   $.each(data.result, function (i,value) {
                     //  alert(value.id);
                   var templateString = '<div class="addcard col-lg-2 col-xs-4" id = "'+ value.Mc_Number +'"> '
                    +'<div class="small-box" style="background: white;"> '
                    +'<div class="inner" style="color:black;"> <h3>wwww</h3>' 
                    +' <p><h3>'+ value.Mc_Number +'</h3></p> </div>  <div class="icon">  <i class="ion ion-stats-bars"></i> </div>'
                    +' <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>'
                    +'</div></div>'
                 //  + '<p>' + mokData[i].name + '</p><p></p><button id="tes">Start</button></div></div>';
                   $('#addcard').append(templateString);
                   })
           });
     }
     else
     {
     // alert('no');
      $("#addcard").empty();
      $.get("{{ url('momc/readdata') }}", function (data) {
           // console.log(data)      
             $.each(data.result, function (i,value) {
              //  alert(value.id);
             var templateString = '<div class="addcard col-lg-2 col-xs-4" id = "'+ value.Mc_Number +'"> '
              +'<div class="small-box" style="background: white;"> '
              +'<div class="inner" style="color:black;"> <h3>ssss</h3>' 
              +'<p><h3>'+ value.Mc_Number + 'kkk'+'</h3></p> </div>  <div class="icon">  <i class="ion ion-stats-bars"></i> </div>'
              +'<a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>'
              +'</div></div>'
          //  + '<p>' + mokData[i].name + '</p><p></p><button id="tes">Start</button></div></div>';
            $('#addcard').append(templateString);
            })
        });
     }

     });
 </script>

<script>
        $(document).on('click', '.addcard', function(){
          var mcnumber = $(this).attr('id')
       // alert(mcnumber);
          var url = "{{ url('oeeds') }}" +'/' + mcnumber;
          window.open(url, '_blank'); 

        });
</script>

  <script>
    $(document).on('click', '#inmc', function(){
      $('#inmc').val('');
    });
  </script>

@endsection  
