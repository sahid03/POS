<?php

namespace App\Livewire;

use App\Models\Menu;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cashier extends Component
{
    public $menus;
    public $transaction;
    public $customer_name;
    public $pay = 0;
    public $total = 0;
    public $alert;
    public $category = 'Semua';

    public function filter($category)
    {
        if ($category == 'Semua') {
            $this->menus = Menu::all();
            $this->category = 'Semua';
        } else {
            $this->menus = Menu::where('category', $category)->get();
            $this->category = $category;
        }
    }

    public function addToCart($menu_id)
    {
        $menu = Menu::find($menu_id);
        $transaction = Transaction::where('status', 'Cart')->where('cashier_id', Auth::user()->id)->first();

        if ($transaction == null) {
            Transaction::create([
                'customer_name' => 'No Name',
                'cashier_id' => Auth::user()->id,
                'total' => 0,
                'status' => 'Cart'
            ]);

            $last_transaction = Transaction::orderBy('id', 'DESC')->first();
            TransactionDetail::create([
                'transaction_id' => $last_transaction->id,
                'menu_id' => $menu_id,
                'quantity' => 1,
                'price' => $menu->price
            ]);
        } else {
            if ($transaction->details->where('menu_id', $menu_id)->count() > 0) {
                $transaction_detail = TransactionDetail::where('transaction_id', $transaction->id)->where('menu_id', $menu_id)->first();
                $transaction_detail->update([
                    'quantity' => $transaction_detail->quantity + 1
                ]);
            } else {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'menu_id' => $menu_id,
                    'quantity' => 1,
                    'price' => $menu->price
                ]);
            }
        }

        $this->transaction = Transaction::where('status', 'Cart')->where('cashier_id', Auth::user()->id)->first();
    }

    public function quantity_minus($id)
    {
        $transaction_detail = TransactionDetail::find($id);

        if ($transaction_detail->quantity == 1) {
            $transaction_detail->delete();
        } else {
            $transaction_detail->update([
                'quantity' => $transaction_detail->quantity - 1
            ]);
        }

        $this->transaction = Transaction::where('status', 'Cart')->where('cashier_id', Auth::user()->id)->first();
    }

    public function delete_detail($id)
    {
        $transaction_detail = TransactionDetail::find($id);
        if ($transaction_detail->transaction->details->count() == 1) {
            $transaction_detail->transaction->delete();
        } else {
            $transaction_detail->delete();
        }

        $this->transaction = Transaction::where('status', 'Cart')->where('cashier_id', Auth::user()->id)->first();
    }

    public function checkout()
    {
        $transaction = $this->transaction;

        // HITUNG TOTAL
        foreach ($transaction->details as $item) {
            $this->total += $item->price * $item->quantity;
        }

        $this->total += 12000;

        $transaction->update([
            'customer_name' => $this->customer_name,
            'cashier_id' => Auth::user()->id,
            'total' => $this->total,
            'pay' => $this->pay,
            'return' => $this->pay - $this->total,
            'status' => 'Waiting'
        ]);
        return $this->redirectRoute('cashier.success', $transaction->id, navigate: true);
    }

    public function mount()
    {
        $this->menus = Menu::all();
        $this->transaction = Transaction::where('status', 'Cart')->where('cashier_id', Auth::user()->id)->first();
    }

    public function render()
    {
        return view('livewire.cashier');
    }
}
