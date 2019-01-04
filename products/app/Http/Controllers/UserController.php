<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int $id
     * @return View
     */

    public function edit($id)
    {
        $user = Auth::user();
        return view('auth.edit', compact('user', 'id'));
    }

    public function update(Request $request, $id, UserRepository $userRepository)
    {
        $user = Auth::user();
        $data = $request->all();
        $update = $userRepository->update($id, $data);
        if ($update) {
            $request->session()->flash('status', 'Success, informations updated');
            return redirect('products');
        } else {
            $request->session()->flash('status', 'Error, current password is wrong');
            return view('auth.edit', compact ('user', 'id'));
        }
    }

    public function show($id, UserRepository $userRepository)
    {
        $user = $userRepository->find($id);
        return view('auth.show', compact('user', 'id'));
    }

    public function destroy($id, UserRepository $userRepository)
    {
        try {
            $userRepository->delete($id);
            return redirect()->route('home');


        } catch (Exception $e) {
            return redirect()->route('auth.edit', $id);
        }

    }

}
