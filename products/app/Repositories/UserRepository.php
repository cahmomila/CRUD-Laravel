<?php
/**
 * Created by PhpStorm.
 * User: lets
 * Date: 26/12/2018
 * Time: 08:56
 */

namespace App\Repositories;

use App\Base\Repository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserRepository extends Repository
{

    protected function getClass()
    {
        return User::class;
    }

    public function update($id, $userData)
    {
        $user = $this->find($id);
        if (Hash::check($userData['password-update'], $user->password)) {
            $user->name = $userData['name'];
            $user->email = $userData['email'];

            if (!$userData['password'] == '') {
                $user->password = Hash::make($userData['password']);
            }

            $user->save();
            return true;
        }
        return false;

    }

    public function delete($id)
    {
        $user = $this->find($id);
        $user->delete();
    }
}
