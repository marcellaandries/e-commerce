<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

use App\Models\PaymentReceipt;
use App\Models\Transaction;
use App\Models\Order;

use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserAddPaymentReceiptComponent extends Component
{
    use WithFileUploads;
    public $sender_name;
    public $transfer_date;
    public $paid_amount;
    public $payment_receipt;

    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    protected $rules = [
        'sender_name' => 'required',
        'transfer_date' => 'required',
        'paid_amount' => 'required',
        'payment_receipt' => 'required',
    ];

    public function addPaymentReceipt()
    {
        $this->validate();

        $paymentReceipt = new PaymentReceipt();

        $paymentReceipt->user_id = Auth::user()->id;
        $paymentReceipt->transaction_id = $this->transaction_id;
        $paymentReceipt->order_id = $this->order_id;
        // $paymentReceipt->transaction_id = 53;
        // $paymentReceipt->order_id = 53;

        $paymentReceipt->sender_name = $this->sender_name;
        $paymentReceipt->transfer_date = $this->transfer_date;

        $this->paid_amount = preg_replace('/[^0-9]/', '', $this->paid_amount);
        $paymentReceipt->paid_amount = $this->paid_amount;

        $imageName = Carbon::now()->timestamp. '.' . $this->payment_receipt->extension();
        $this->payment_receipt->storeAs('payment_receipt',$imageName);
        $paymentReceipt->payment_receipt = $imageName;

        $paymentReceipt->status = 'pending';

        // dd($paymentReceipt);

        $paymentReceipt->save();
        session()->flash('message','Payment receipt has been uploaded successfully!');
        // return redirect()->route('user.orders');
        return redirect()->back();
    }

    public function render()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $this->order_id)->first();
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('order_id', $this->order_id)->first();
        // dd($transaction);
        // return view('livewire.user.user-add-payment-receipt-component')->layout('layouts.base');
        return view('livewire.user.user-add-payment-receipt-component', ['order'=>$order, 'transaction'=>$transaction])->layout('layouts.base');
    }

    public function rupiah($var_number){

        $rupiah_result = "Rp " . number_format($var_number,2,',','.');
        return $rupiah_result;

    }

}
