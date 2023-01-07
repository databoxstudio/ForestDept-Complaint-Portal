@extends('layouts.print')
@section('content')

<style>
    .table td {
	font-size: 15px;
}
    
</style>

<div class="page-content">

    
       
        <div class="col-lg-12 col-xl-12 stretch-card">



         <div class="col-sm-2">

                            <div class="form-group">

                                <label for="location">&nbsp;</label>

                                  <a href="#" class="btn btn-success btnprn btn">Print Preview</a>

                            </div>

                        </div>

          
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script
            



            <div class="card">

              <div class="card-body">


                <div class="table-responsive">

                  <table class="table table-hover mb-0">

                    <thead>

                      <tr>

                         <th class="pt-0">UID</th> 

                        <th class="pt-0">Contact Number</th>

                        <th class="pt-0">Full Name</th>

                        <th class="pt-0">Forest Area</th>
                        <th class="pt-0">Forest Area</th>

                   
                   
                        

                    </thead>

                    <tbody>

                        @if(!$complaints->isEmpty()) 
                     @foreach($complaints as $complaint)
                        
                      <tr>

                         <td>{{$complaint->uid}}</td>
<td>{{$complaint->contact_number}} </td>
                        <td>{{$complaint->full_name}} </td>

                        <td>Village:{{$complaint->villege}} <br/>Beat: {{$complaint->beat}} <br/>Block: {{$complaint->block}} <br/>Range: {{$complaint->range}} <br/>Division: {{$complaint->division}}</td>

                         <td>@if(!empty($complaint->information))
        
        Information: {!!html_entity_decode($complaint->information) !!} <br/><br/>
          Information Detail: {!!html_entity_decode($complaint->complaintdetail) !!}
          @endif
        
     
       
         @if(!empty($complaint->complaint))

          Complaint: {{$complaint->complaint}} <br/><br/>
            Complaint Detail: {!!html_entity_decode($complaint->complaintdetail)!!}
           @endif
          
      
          
          
         
          </td>
                      

                     
                      </tr>
                     
                     

                      @endforeach

                       @else

                         <tr>

                         <td colspan="5" style="font-size: 16px;font-weight: bold;text-align: center;">No complaints are registered yet!</td> 

           



                      </tr>

                      @endif

                     

                    </tbody>

                  </table>

                 

                </div>

              </div> 

            </div>

          </div>



</div>

@endsection

