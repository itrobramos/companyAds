<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Category;
use App\Subcategory;
use App\City;
use App\Company;
use App\Country;
use App\Phone;
use App\SocialNetwork;
use App\SocialNetworkType;
use App\State;
use App\User;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompaniesController extends Controller
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
        date_default_timezone_set('America/Monterrey');
        $companies = Company::all();
        $data['companies'] = $companies;
        return view('admin/companies.index', $data);
    }


    public function create()
    {

        $Countries = Country::where('active',1)->get();
        $States = State::where('active',1)->where('countryId', $Countries->first()->id)->get();
        $Cities = City::where('active',1)->where('stateId', $States->first()->id)->get();
        $Categories = Category::all();
        $Subcategories = Subcategory::all();

        $data['Countries'] = $Countries;
        $data['States'] = $States;
        $data['Cities'] = $Cities; 
        $data['Categories'] = $Categories;
        $data['Subcategories'] = $Subcategories;
        
        return view('admin/companies.create', $data);
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $Countries = Country::where('active',1)->get();
        $States = State::where('active',1)->where('countryId', $Countries->first()->id)->get();
        $Cities = City::where('active',1)->where('stateId', $States->first()->id)->get();
        $Branch = Branch::where('companyId',$id)->first();
        $Admin = User::findOrFail($company->userId);

        $Categories = Category::all();
        $Subcategories = Subcategory::all();

        $SocialNetworks = SocialNetwork::where('companyId', $id)->where('active',1)->get();
        
        $SocialNetworksT = [];
        foreach($SocialNetworks as $SN){
            $SocialNetworksT[] = ["Type"=> $SN->SocialNetworkType->name, "URL" => $SN->URL];
        }


        $company->socialNetworks = $SocialNetworksT;
        $company->Admin = $Admin;

        $data['Countries'] = $Countries;
        $data['States'] = $States;
        $data['Cities'] = $Cities;
        $data['company'] = $company;
        $data['Branch'] = $Branch;
        $data['Categories'] = $Categories;
        $data['Subcategories'] = $Subcategories;

        return view('admin/companies.edit', $data);
    }


    public function store(Request $request)
    {

        try{
            \DB::beginTransaction();

            $City = City::find($request->city);
            $CityName = $City->name;
            $StateName =  $City->State->name; 
            $CountryName =  $City->State->Country->name;
    
            $address= $request->address . " " . $request->zipcode . " "  . $CityName . " " . $StateName . " " . $CountryName ;
    
            $geoDecode = $this->geoencoding($address);
    
            if(isset($geoDecode->error)){
                $Latitude = 0;
                $Longitude = 0;
            }
            else{
                $Latitude = $geoDecode[0]->lat;
                $Longitude = $geoDecode[0]->lon;    
            }


            //Registro de Usuario
            $User = new User();
            $User->first_name = $request->adminName;
            $User->last_name = $request->adminLastName;
            $User->email = $request->adminEmail;
            $User->password =  Hash::make('12345678');
            $User->save();
    
             //Registro de Compañia
            $Company = new Company();
            $Company->name = $request->name;
            $Company->description = $request->description;
            $Company->active = 1;
            $Company->subcategoryId = $request->subcategory;
 
            
            if ($request->hasfile('imageUrl')) {
                $file = $request->file('imageUrl');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = time() . '.' . $extension;
                $file->move('public/uploads/images/', $filename);
                File::delete($Company->logoUrl);
                $Company->logoUrl = 'public/uploads/images/' . $filename;
            }
    
            
            $Company->userId = $User->id;
            $Company->email = $request->email;
            $Company->website = $request->website;
            $Company->save();


            //Registro de Sucursal
            $Branch = new Branch();
            $Branch->companyId = $Company->id;
            $Branch->name='Base';
            $Branch->address= $request->address;
            $Branch->zipcode = $request->zipcode;
            $Branch->cityId = $City->id;
            $Branch->latitude = $Latitude;
            $Branch->longitude = $Longitude;
            $Branch->save();
        
            //Registro de Teléfonos
            if(isset($request->phone)){
                foreach($request->phone['description'] as $key => $name)
                {
                    $Phone = new Phone();
                    if(isset(($name)))
                        $Phone->name = $name;
    
                    if(isset($request->phone['number'][$key]))
                        $Phone->number = $request->phone['number'][$key];
    
                    $Phone->branchId = $Branch->id;
    
                    $Phone->save();                   
                }
            }
    


            //Registro de Redes sociales
    
            if(isset($request->facebook)){
                $SocialNetwork = new SocialNetwork();
                $SocialNetworkType = SocialNetworkType::where('name','facebook')->first();
                $SocialNetwork->socialNetworkTypeId = $SocialNetworkType->id;
                $SocialNetwork->URL= $request->facebook;
                $SocialNetwork->companyId = $Company->id;
                $SocialNetwork->active = 1;
                $SocialNetwork->save();
            }
    
            if(isset($request->twitter)){
                $SocialNetwork = new SocialNetwork();
                $SocialNetworkType = SocialNetworkType::where('name','twitter')->first();
                $SocialNetwork->socialNetworkTypeId = $SocialNetworkType->id;
                $SocialNetwork->URL= $request->twitter;
                $SocialNetwork->companyId = $Company->id;
                $SocialNetwork->active = 1;
                $SocialNetwork->save();
            }
    
            if(isset($request->instagram)){
                $SocialNetwork = new SocialNetwork();
                $SocialNetworkType = SocialNetworkType::where('name','instagram')->first();
                $SocialNetwork->socialNetworkTypeId = $SocialNetworkType->id;
                $SocialNetwork->URL= $request->instagram;
                $SocialNetwork->companyId = $Company->id;
                $SocialNetwork->active = 1;
                $SocialNetwork->save();
            }
    
            if(isset($request->youtube)){
                $SocialNetwork = new SocialNetwork();
                $SocialNetworkType = SocialNetworkType::where('name','youtube')->first();
                $SocialNetwork->socialNetworkTypeId = $SocialNetworkType->id;
                $SocialNetwork->URL= $request->youtube;
                $SocialNetwork->companyId = $Company->id;
                $SocialNetwork->active = 1;
                $SocialNetwork->save();
            }    


            \DB::commit();

            return redirect('companies')->with('Message', 'Compañia creada correctamente');
        }
        catch(\Throwable $th){
            dd($th);
            \DB::rollback();
            //return redirect()->back()->with('error', 'Error al guardar la información.' . $th->getMessage());
        }
       

       

    }

    static function geoencoding($address){
        
        $curl = curl_init('https://api.locationiq.com/v1/autocomplete.php?key=2f4a15f3f7d95c&q=' . $address);

        curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER    =>  true,
          CURLOPT_FOLLOWLOCATION    =>  true,
          CURLOPT_MAXREDIRS         =>  10,
          CURLOPT_TIMEOUT           =>  30,
          CURLOPT_CUSTOMREQUEST     =>  'GET',
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        $jsonArrayResponse = json_decode($response);

        return $jsonArrayResponse;
    }

    // public function update(Request $request, $id)
    // {
    //     $Category = Category::findOrFail($id);
    //     $Category->name = $request->name;
    //     $Category->icon = $request->icon;

    //     if ($request->hasfile('imageUrl')) {
    //         $file = $request->file('imageUrl');
    //         $extension = $file->getClientOriginalExtension(); // getting image extension
    //         $filename = time() . '.' . $extension;
    //         $file->move('public/uploads/images/', $filename);
    //         File::delete($Category->imageUrl);
    //         $Category->imageUrl = 'public/uploads/images/' . $filename;
    //     }

    //     $Category->save();
    //     return redirect('companies')->with('Message', 'Card created successfully');
    //     return view('companies');
    // }

    // public function destroy($id)
    // {
    //     Category::destroy($id);
    //     return redirect('companies')->with('Message', 'Categoría eliminada correctamente');
    // }
}
