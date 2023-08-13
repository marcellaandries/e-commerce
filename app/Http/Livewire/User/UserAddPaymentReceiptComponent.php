<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

use App\Models\PaymentReceipt;
use App\Models\Transaction;
use App\Models\Order;

use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class UserAddPaymentReceiptComponent extends Component
{
    use WithFileUploads;
    public $sender_name;
    public $transfer_date;
    public $paid_amount;
    public $payment_receipt;
    public function render()
    {
        return view('livewire.user.user-add-payment-receipt-component')->layout('layouts.base');
    }
}
