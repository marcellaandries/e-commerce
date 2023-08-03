<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddressComponent extends Component
{

    // public $addressVal;
    // public $addresses;
    public $message;

    // public function mount()
    // {
    //     $addresses = Address::all();
    //     dd($addresses);
    //     $this->pagesize = 12;
    //     $this->$category_slug = $category_slug;
    // }

    // public function ship($address_id, Request $request)
    public function choose_address(Request $request)
    {
        // session()->put('checkout',[
        //     'weight' => Crypt::decrypt($weight_total),
        // ]);
        // dd(session()->get('checkout')['weight']);
        // dd($address_id);

        // dd(session()->get('checkout'));
        if(Auth::check())
        {
            // dd($request->all());
            // dd($request->address_id);

            // $address_choose = Address::where('id',$address_id)->get();
            $address_choosen = Address::find($request->address_id);

            // dd($address_choosen->firstname);
            // dd($address_choosen);
            // "id" => 2
            // "user_id" => 6
            // "firstname" => "Marcella Chou"
            // "lastname" => ""
            // "" => "081281322538"
            // "email" => null
            // "line1" => "Pluit Avenue No. 11, Pluit Utara"
            // "line2" => null
            // "city" => "Kota Jakarta Utara"
            // "province" => "DKI Jakarta"
            // "country" => "Indonesia"
            // "zipcode" => "18750"
            // "priority" => 0
            // "label" => "Office"
            // "created_at" => "2023-07-31 15:42:23"
            // "updated_at" => "2023-07-31 15:42:23"

            // dd(session()->get('checkout'));
            session()->put('checkout',[
                'weight' => session()->get('checkout')['weight'],
                'firstname' => $address_choosen->firstname,
                'mobile' => $address_choosen->mobile,
                'line1' => $address_choosen->line1,
                'city' => $address_choosen->city,
                'zipcode' => $address_choosen->zipcode,
            ]);

            // dd(session()->get('checkout'));

            // dd(session()->get('checkout')['firstname']);

            return redirect()->route('ship');

        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        // dd(session()->get('checkout'));
        $addresses = Address::where('user_id',Auth::user()->id)->get();
        // dd($addresses);
        // $addresses = Address::all();
        return view('livewire.address-component',['addresses'=>$addresses])->layout('layouts.base');
    }

    public function deleteAddress($id)
    {
        session()->flash('message','Addresses has been deleted successfully!');
    }
}
