<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch users with the role of 'customer'
        $customers = User::where('role', 'customer')->get();

        // Return the data to a view
        return view('v_admin.customer.index', compact('customers'));
    }
}
