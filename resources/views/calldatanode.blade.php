@extends('includepage.template_master')
@section('content')
<form method="post" id="sample_formshi" class="form-horizontal">
  @csrf
<!--<button type="button" name="create_record" id="create_record" class="btn btn-sm">Create Data</button>-->
<input type="submit" name="create_record" id="create_record" class="btn btn-warning" value="Add" />
</form>

 <script>
     var jq = $.noConflict(); 
      jq(document).ready(function(){
      jq('#sample_formshi').on('submit', function(event){  
     var action_url = '';
     action_url = "{{ route('testget.store') }}";
        jq.ajax({
        url: action_url,
        method:"POST",
        data:jq(this).serialize(),
        dataType:"json",
        success:function(data)
        {
        }
        });
      });
    });
  </script>
 


  
 
       
@endsection 
 
