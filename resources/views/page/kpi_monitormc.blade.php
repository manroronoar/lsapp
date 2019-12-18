@extends('includepage.template_master')
@section('content')



<div class="box box-success">    
  <div class="box-body">
          <div class="lockscreen-logo">
        
          <h1 class="bold" align="center">MACHINE MONITOR</h1>
          </div>
  </div>   
</div>

<div class="box-body col-12">    
   
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



<div id="formModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Add New Record</h4>
         </div>
         <div class="modal-body">
          <span id="form_result"></span>
          <form method="post" id="sample_form" class="form-horizontal">
           @csrf
           <div class="table-responsive">
            <table id="user_table" class="table ">
             <thead>
              <tr class="bg-green color-palette">
               <th scope="row" class="text-center">Mc. Number</th>
               <th scope="row" class="text-center">Mc. Node</th>
               <th scope="row" class="text-center">Action</th> 
              </tr>
             </thead>
            </table>
           </div>
           <br />
           <br />
          </div>
          </form>
         </div>
      </div>
     </div>
 </div>


<script>
 $(document).ready(function(){
        $.get("{{ url('momc/readdata') }}", function (data) {
           console.log(data)      
           jQuery.each(data.result, function (i,value) {
              //  alert(value.id);
             var templateString = '<div class="addcard col-lg-2 col-xs-4" id = "'+ value.Mc_Number +'"> '
            + '<div class="small-box bg-green">'
            + '<div class="inner"> <h3></h3>' 
            + ' <p><h3>'+ value.Mc_Number +'</h3></p> </div>  <div class="icon">  <i class="ion ion-stats-bars"></i> </div>'
            + ' <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>'
            +  '</div></div>'
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
                   + '<div class="small-box bg-green">'
                   + '<div class="inner"> <h3></h3>' 
                   + ' <p><h3>'+ value.Mc_Number +'</h3></p> </div>  <div class="icon">  <i class="ion ion-stats-bars"></i> </div>'
                   + ' <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>'
                   +  '</div></div>'
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
            + '<div class="small-box bg-green">'
            + '<div class="inner"> <h3></h3>' 
            + ' <p><h3>'+ value.Mc_Number +'</h3></p> </div>  <div class="icon">  <i class="ion ion-stats-bars"></i> </div>'
            + ' <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>'
            +  '</div></div>'
          //  + '<p>' + mokData[i].name + '</p><p></p><button id="tes">Start</button></div></div>';
            $('#addcard').append(templateString);
            })
        });
     }

     });
 </script>

<script>
  $(document).on('click', '#inmc', function(){
    $('#inmc').val('');
  });
</script>



<script>
        var jq = $.noConflict(); 
        jq(document).on('click', '.addcard', function(){
        // alert($(this).attr('id'));
        var valuemc = $(this).attr('id');

        jq('#form_result').html('');
        jq('.modal-title').text('View Gauge ' +' '+ 'Mc. ' + valuemc);
        jq('#test').val(valuemc);
      //  jq('#user_table').destroy();
        jq('#user_table').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: {
            url: "{{ url('momc/readdataindex') }}" +'/' + valuemc ,
            },
            columns: [
            {
              data: 'Mc_Number',
              name: 'Mc_Number'
            },
            {
              data: 'Mc_Node',
              name: 'Mc_Node'
            },
            {
              data: 'action',
              name: 'action'             
            }
            ]
        });
        jq('#formModal').modal('show');
        });

        jq(document).on('click', '.node', function(){
          var mcnumber = jq(this).attr('id')
          var url = 'http://34.87.86.224:8001/mc-socket/' + mcnumber
         // alert($(this).attr('id'));
         //window.location = 'http://34.87.86.224:8001/mc-socket/n01';
         window.open(url, '_blank');

        });
</script>


@endsection  
