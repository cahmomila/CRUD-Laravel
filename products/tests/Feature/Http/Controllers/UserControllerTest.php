<?php
/**
 * Created by PhpStorm.
 * User: lets
 * Date: 04/01/2019
 * Time: 09:38
 */
namespace Tests\Feature\Http\Controllers;


use App\Models\User;
use Tests\TestCase;


class UserControllerTest extends TestCase
{
//    /** @test */
//    public function EditPage()
//    {
//        $user = factory(User::class)->create();
//        $response = $this->actingAs($user)->get('/user/' . $user->id . '/edit');
//        $response->assertSuccessful();
//    }
//
//    /** @test */
//    public function testWhenUpdateWithDataCorrect()
//    {
//        $user = factory(User::class)->create();
//
//        $params = ['user' => ['name' => 'teste', 'email' => 'teste@hotmail.com', 'password' => '123456', 'update-password' => $user->password]];
//
//        $response = $this->actingAs($user)->put('/user/' . $user->id . '/edit', $params);
//
//        $userUpdate = \App\Models\User::find($user->id);
//
//        $response->assertSessionHasNoErrors();
//    }
//
//    /** @test */
//    public function testWhenShoudntUpdateCurrentPasswordWrong()
//    {
//        $user = factory(User::class)->create();
//
//        $params = ['user' => ['name' => 'teste', 'email' => 'testm', 'password' => '123456', 'update-password' => "456987"]];
//
//        $response = $this->actingAs($user)->put('/user/' . $user->id . '/edit', $params);
//
//        $userUpdate = \App\Models\User::find($user->id);
//
//        $response->assertSessionHasErrors(['user.email']);
//    }
}
