<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Mail\ContactUs;
use App\Apartment;
use App\Out;
use App\OutTour;
use App\InTour;
use App\In;
use App\InDay;
use App\Parents;
use App\Car;
use App\Individual;
use App\Subscriber;
use App\Contact;
use App\Currencies\Convert;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    /**
     * change langugage  and currency
     */
    public function changeLang(Request $request) {
        if(isset($request->val) && isset($request->type)) {
            $type = $request->type;
            $val = $request->val;
            switch($type) {
                case 'lang':
                    session('lang') === $val ? true : session(['lang' => $val]);                    
                    return $type;
                    break;
                case 'currency':
                    session('currency') === $val ? true : session(['currency' => $val]);
                    return $type;
                    break;
                default: true;
            }
        }
    }

    // Send contact us message to email
    public function contactUs(Request $request) {
        if(Auth::check()) {
            $request->validate([
                'desc' => "required|max:3000"
            ]);
        }else {
            $request->validate([
                'email' => "required|email",
                'desc' => "required|max:3000"
            ]);
        }
        if(!is_null($request->desc)) {
            $email = Auth::check() ? Auth::user()->email : $request->email;
            $desc = $request->desc;
            $data['email'] = $email;
            $data['desc'] = $desc;
            $data = json_encode($data);
            Mail::to(env('MAIL_USERNAME'))->send(new ContactUs($data));    
            session()->flash('status',"Thank You for contacting us. We will reply You ASAP.");
        }
        return  back();
    }

    // Apartments page
    public function apartments(Request $request) {
        $apartments = '';
        if(isset($request->price1) && isset($request->price2) && ($request->price2 > $request->price1)) {
            $all = $request->except(['price1','price2']);
            $data = [];
            foreach($all as $k => $val) {
                $val !== null ? $data[$k] = $val : true;
            }
            $query = !empty($data) ? Apartment::where($data)->whereBetween('price',[(int)$request->price1,(int)$request->price2]) :Apartment::whereBetween('price',[(int)$request->price1,(int)$request->price2]); 
            $apartments = $query->paginate(12);
        }else {
            $apartments = Apartment::paginate(12);
        }
        return view('services.apartments')->with(compact('apartments'));
        
    }

    // Tours
    public function outgoing($id = null,Request $request) {
        $parent = new Parents;
        $convert = new Convert;
        $out_tours = $id !== null ? OutTour::where('out_id',$id)->paginate(12)->appends(['id' => $id]) : 
                                    OutTour::inRandomOrder()->paginate(12);
        $out_tours = $parent($out_tours);
        return view('tours.outgoing')->with(compact('out_tours'));
    }

    public function outgoingTour($id = null,Request $request) {
        $parent = new Parents;
        $convert = new Convert;
        $tour = '';
        if(!is_null($id)) {
            $tour = OutTour::where('out_id',$id)->firstOrFail();      
            $tour = $parent($tour);
            $tour = $convert($tour);
            if(!is_null($tour->images)) {
                $seo_img = $tour->images[0];
                $tour->seo_img = env('APP_URL').'/'.$seo_img;
            }
            $tour->seo_title = $tour->name;
        }
        return view('tours.outgoing-tour')->with(compact('tour'));
    }

    public function incomingTypes($slug = null,Request $request) {
        if(!is_null($slug)) {
            $convert = new Convert;
            $parent = new Parents;
            $tour = In::where('slug',$slug)->first();
            $id = $tour->getId();
            $in_tours = InTour::where('in_id',$id)->get();
            $in_tours = $parent($in_tours);
            $in_tours = $convert($in_tours);
            $tour->inTours = $in_tours;
        }
        return view('tours.incoming-type')->with(compact('tour'));
    } 

    public function incomingTour($id = null,Request $request) {
        $tour = '';
        if(!is_null($id)) {
            $parent = new Parents;
            $convert = new Convert;
            $tour = InTour::where('id',$id)->orWhere('main_id',$id)->first();
            $tour = $parent($tour);
            $tour = $convert($tour);
            $days = InDay::where('in_tour_id',$tour->getId())->get();
            $days = $parent($days);
            $tour->days = $days;
            if(count($days)) {
                $seo_img = $days[0]->images[0];
                $tour->seo_img = env('APP_URL').'/'.$seo_img;                
            }
            $tour->seo_title = $tour->name;
        }
        return view("tours.incoming-tour")->with(compact('tour'));
    }

    // Get car images
    public function carImages(Request $request) {
        if(!is_null($request->main_id)) {
            $main_id = $request->main_id;
            $images =  Car::select('images')->withoutGlobalScopes()->where('id',$main_id)->first();
            return $images;
        }
    }

    // Get Apartment images
    public function apartmentImages(Request $request) {
        if(!is_null($request->id)) {
            $id = $request->id;
            $images =  Apartment::select('images')->withoutGlobalScopes()->where('id',$id)->first();
            return $images;
        }
    }

    // Get Individual tours images
    public function individualImages(Request $request) {
        if(!is_null($request->id)) {
            $individual = new individual;
            $arr = [];
            $id = $request->id;
            $desc = $individual->select('desc')->where('id',$id)->orWhere('main_id',$id)->first();
            $images =  $individual->select('images')->withoutGlobalScopes()->where('id',$id)->first();
            $arr[] = $desc;
            $arr[] = $images;     
            return $arr;
        }
    }

    // Subscribers
    public function checkSubscription($email) {
        if(!is_null($email)) {
            $check = Subscriber::where('email',$email)->first();
            return !is_null($check) ?  false : true;
        }
    }

    public function subscribe(Request $request) {
        if(Auth::check()) {
            $user = Auth::user();
            $email = $user->email;
            $check = $this->checkSubscription($email);
            if($check) {
                $user->subscribers()->create([
                    'email' => $email
                ]);
                return 'true';
            }else {
                return "has";
            }
        }elseif(!is_null($request->email)) {
            $request->validate([
                'email' => 'required|email'
            ]);
            $check = $this->checkSubscription($request->email);
            if($check) {
                $subscriber = new Subscriber;
                $subscriber->email = $request->email;
                $subscriber->save();                
                return 'true';
            }else {
                return "has"; 
            }
        }
    }

    // Contacts page's country change
    public function changeContacts(Request $request) {
        $parent = new Parents;
        $cnt = '';
        if(!is_null($request->country)) {
            $cnt = Contact::where('cnt',$request->country)->first();
            $cnt = $parent($cnt);
        }
        return $cnt;
    }
}