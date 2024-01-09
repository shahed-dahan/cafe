<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class UserController extends Controller
{
 /**
 * Store new user details.
 *
 */
 public function store(Request $request){
 $validated = $request->validate([
 'email' => 'required|unique:users|email',
 'age' => 'required|numeric',
 'password' => 'required|min:7|confirmed'
 ]);
// After user data is validated, logic to store the data
}
}
