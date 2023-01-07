@extends('layouts.app')



@section('content')
<div class="page-content">

<div class="row">
<div class="col-md-12 stretch-card">
<div class="card">
<div class="card-body">
@if (count($errors) > 0)

<div class = "alert alert-danger">

<ul>

@foreach ($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif


@if(session()->has('message'))
<div class="alert alert-success">
{{ session()->get('message') }}
</div>
@endif

{{ csrf_field() }}



<div class="d-flex justify-content-between align-items-baseline mb-2">

                  <h6 class="card-title mb-0">View Complaint</h6>

                  <div class="dropdown mb-2">

                     

                    <a class="btn btn-success" target="_blank" href="{{route('printModule.prndetail',$complaints->id)}}"> <span class="">Print</span></a>

                  </div>

                </div>



<div class="col-sm-3">
    <div class="form-group">
          </div>
</div><!-- Col -->


<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
           <div class="form-group">
        <label class="control-label">UID: {{$complaints->uid}}</label>
           </div>
    <div class="form-group">
        <label class="control-label">Contact Number: {{$complaints->contact_number}}</label>
           </div>

     <div class="form-group">
        <label class="control-label">Full Name:  {{$complaints->full_name}}</label>
       
    </div>

   <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" disabled="disabled" name="keep_identity_concealed" value="1" class="form-check-input" {{($complaints->keep_identity_concealed == "1") ? 'checked': ''}}>
                                            Do you want to keep your identity concealed ?
                                        <i class="input-frame"></i></label>
            </div>

 <div class="form-group">
        <label class="control-label">Village: {{$complaints->villege}}</label>
       

    </div>

 <div class="form-group">
        <label class="control-label">Beat: {{$complaints->beat}}</label>
       

    </div>

     <div class="form-group">
        <label class="control-label">Block: {{$complaints->block}}</label>
    </div>

     <div class="form-group">
        <label class="control-label">Range: {{$complaints->range}}</label>
    </div>

         <div class="form-group">
        <label class="control-label">District: {{$complaints->district}}</label>
       

    </div>

     <div class="form-group">
        <label class="control-label">Division: {{$complaints->division}}</label>
    </div>

     <div class="form-group">
     
        <label class="control-label">Nature of Information: {{ucfirst(trans($complaints->nature_information))}}</label>
       


         
    </div>

     <div class="form-group">

       @if(!empty($complaints->information))
        <label class="control-label">Information: {!!html_entity_decode($complaints->information) !!}</label>
       
         @else

          <label class="control-label">Complaint: {{$complaints->complaint}}</label>
          @endif
    </div>
    
    
                    <div class="form-group">
                        
                        
                        <label class="control-label">Complaint Detail: {!!html_entity_decode($complaints->complaintdetail) !!}</label>





    </div>
    
    

      <div class="form-group">

    <a href="{{route('complaintsModule.complaints')}}"><button type="submit" class="btn btn-primary submit">Save</button></a>

      </div>


       



</div>
</div>
</div>


<div class="col-sm-3">
    <div class="form-group">
          </div>
</div><!-- Col -->

</div>
</div>
</div>
</div>






          



</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$( function() {
$( "#delivery_date" ).datepicker({
minDate: 0,
dateFormat: 'dd-mm-yy'
});





$( "#measurement_date" ).datepicker({
minDate: 0,
dateFormat: 'dd-mm-yy',
});



} );




$(document).ready(function() {
    $("#complaint").show();
    $("#information").hide();
    $("input[name$='nature_information']").click(function() {
        var test = $(this).val();

        if(test=='information'){

        $("#information").show();
        $("#complaint").hide();
    } else {
        $("#information").hide();
        $("#complaint").show();
    }
    });
});





</script>


@endsection



















