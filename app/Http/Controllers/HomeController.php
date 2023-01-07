<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\User;
use App\Complaint;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
   
        $todaycomplaint = Complaint::whereDate('created_at', Carbon::today())->get();
        $todaycomplaintcount = $todaycomplaint->count();
        
        $complaint = Complaint::get();
      $complaintcount = $complaint->count();
      
        $complaints = Complaint::select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });
            
            $compmcount = [];
            $compArr = [];
            
            foreach ($complaints as $key => $value) {
                $compmcount[(int)$key] = count($value);
            }
            
            for($i = 1; $i <= 12; $i++){
                if(!empty($compmcount[$i])){
                    $compArr[$i] = $compmcount[$i];    
                }else{
                    $compArr[$i] = 0;    
                }
            }  
   
  
        
        return view('home')->with(array('complaintcount'=>$complaintcount, 'todaycomplaintcount'=>$todaycomplaintcount,'compArr'=>$compArr));
        
        
        
        
        
        
    }
}
