<?php

namespace App\Console\Commands;

use App\Models\Order_item;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'email to user for reminder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cart = session('cart');
        $user_id = Transaction::query()->select('user_id')->where('status','unpaid')->get();
        $user = User::query()->find($user_id);
        $oneweek = 7 * 24 * 60 * 60;
        $products = Product::all();
        foreach($products as $product) {
            if ($cart[$product->id]['updated_at'] > $oneweek) {
                Mail::send('emails.mailEvent', $user, function ($message) use ($user) {
                    $message->to($user['email']);
                    $message->subject('reminder');
                });
            }

        }
    }
}
