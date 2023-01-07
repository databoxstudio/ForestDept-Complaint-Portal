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
<h6 class="card-title">Update Public's Complaint</h6>
<form class="forms-sample" action="{{route('complaintsModule.update')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<input type="hidden" name="complaint_id" value="{{$complaints->id}}">

<div class="col-sm-3">
    <div class="form-group">
          </div>
</div><!-- Col -->


<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
    <div class="form-group">
        <label class="control-label">Contact Number</label>
        <input type="number" class="form-control" id="contact_number" name="contact_number" value="{{$complaints->contact_number}}" autocomplete="off" placeholder="Contact Number">
    </div>

     <div class="form-group">
        <label class="control-label">Full Name</label>
        <input type="text" class="form-control" id="full_name" name="full_name" value="{{$complaints->full_name}}" autocomplete="off" placeholder="Full Name">
    </div>

   <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="keep_identity_concealed" value="1" class="form-check-input" {{($complaints->keep_identity_concealed == "1") ? 'checked': ''}}>
                                            Do you want to keep your identity concealed ?
                                        <i class="input-frame"></i></label>
            </div>


       


     <div class="form-group">
        <label class="control-label">Village</label>
       
        <select class="js-example-basic-single w-100" name="villege" id="villagedrop">
     <option selected="" disabled="">Select Village</option>
                                         @foreach($villages as $village)
            @if ($complaints->villege == $village->villege)
                <option value="{{$village->id}}" selected="selected">{{$village->villege}}</option>
                @else 
                <option value="{{$village->id}}">{{$village->villege}}</option>
                @endif


            @endforeach

                                    </select>
    </div>


 <div class="form-group">
        <label class="control-label">Beat</label>
       
<select class="js-example-basic-single w-100" name="beat">
     <option selected="" disabled="">Select Beat</option>
                                         @foreach($forestareas as $forestarea)
            @if ($complaints->beat == $forestarea->beat)
                <option value="{{$forestarea->id}}" selected="selected">{{$forestarea->beat}}</option>
                @else 
                <option value="{{$forestarea->id}}">{{$forestarea->beat}}</option>
                @endif


            @endforeach

                                    </select>

    </div>

     <div class="form-group">
        <label class="control-label">Block</label>
       
          <input type="text" class="form-control" id="block" name="block" value="{{$complaints->block}}" autocomplete="off" placeholder="Block">
    </div>

     <div class="form-group">
        <label class="control-label">Range</label>
       
         <input type="text" class="form-control" id="range" name="range" value="{{$complaints->range}}" autocomplete="off" placeholder="Range">
    </div>


      <div class="form-group">
        <label class="control-label">District</label>
        <input type="text" class="form-control" id="district" name="district" value="{{$complaints->district}}" autocomplete="off" placeholder="District">
    </div>

     <div class="form-group">
        <label class="control-label">Division</label>
       
        <input type="text" class="form-control" id="division" name="division" value="{{$complaints->division}}" autocomplete="off" placeholder="Division">
    </div>

     <div class="form-group">
        <label class="control-label">Nature of Information</label>
       
           <div class="form-check form-check-flat form-check-primary">
             <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="nature_information" id="optionsRadios5" value="information"  checked="checked">
                                                Information
                                            <i class="input-frame"></i></label>
                                        </div>
                                      <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="nature_information" id="optionsRadios5" value="complaint">
                                                Complaint
                                            <i class="input-frame"></i></label>
                                        </div>
                                      
                                        
            </div>
    </div>


         <div class="form-group">
        <select class="form-control" name="complaint" id="complaint">
                                            <option selected="" disabled="">Select Complaint</option>
                                            
                                              @foreach($complainttypes as $complainttype)
            @if ($complaints->complaint == $complainttype->complaint_type)
                <option value="{{$complainttype->complaint_type}}" selected="selected">{{$complainttype->complaint_type}}</option>
                @else 
                <option value="{{$complainttype->complaint_type}}">{{$complainttype->complaint_type}}</option>
                @endif


            @endforeach
                                         
                                        </select>


                                       <textarea class="form-control" name="information" id="information" rows="5">{{$complaints->information}}</textarea>



    </div>
    
                 <div class="form-group">
 <label class="control-label">Complaint Detail</label>
                                       <textarea class="form-control" name="complaintdetail" id="complaintdetail" rows="5">{{$complaints->complaintdetail}}</textarea>




    </div>

  <div class="form-group">

    <button type="submit" class="btn btn-primary submit">Continue</button>

      </div>




</div>
</div>
</div>


<div class="col-sm-3">
    <div class="form-group">
          </div>
</div><!-- Col -->

</form>
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
    $("#information").show();
    $("#complaint").hide();
    $("input[name$='nature_information']").click(function() {
        var test = $(this).val();

        if(test=='complaint'){

        $("#complaint").show();
        $("#information").hide();
        $(".tox-tinymce").hide();
    } else {
        $("#complaint").hide();
        $("#information").hide();
        $(".tox-tinymce").show();
    }
    });
});



        $(document).ready(function () {

           $('#beatdrop').change(function () {

             var id = $(this).val();

             //$('#subCategory').find('option').not(':first').remove();


             $.ajax({
                url:'/ForestareasModule/getforestarea/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                   // if (len>0) {
                       //// for (var i = 0; i<len; i++) {
                             var id = response.data.id;
                             var range = response.data.range;
                             var block = response.data.block;
                             var division = response.data.division;
                             
                             $("#range").val(range);
                             $("#block").val(block);
                             $("#division").val(division);
                        //}
                   // }
             }
             })
           });
        });


          $(document).ready(function () {
           $('#villagedrop').change(function () {
             var id = $(this).val();
             $.ajax({
                url:'/VillagesModule/getvillage/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                   // if (len>0) {
                       //// for (var i = 0; i<len; i++) {
                             var id = response.data.id;
                             var beat = response.data.beat;
                             var range = response.data.range;
                             var block = response.data.block;
                             var district = response.data.district;
                             var division = response.data.division;
                             
                             $("#range").val(range);
                             $("#beat").val(beat);
                             $("#block").val(block);
                             $("#division").val(division);
                             $("#district").val(district);
                        //}
                   // }
                }
             })
           });
        });

</script>


@endsection
