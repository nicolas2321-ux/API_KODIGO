<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase

{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_register_duplicate()
    {
        $respone = $this->post('/api/register', [
            "name" => "artyom developer",
            "password" => "tutofox123",
            "password_confirmation" => "tutofox123",
            "email" => "artyeweworrm2123@developer.com",
            "rol" => "usuario"
        ]);
        $respone->assertStatus(400);
    }


    ///////
    public function test_register_missingField()
    {
        $respone = $this->post('/api/register', [
            "name" => "artyom developer",
            "password_confirmation" => "tutofox123",
            "email" => "artyeweworrm2123@developer.com",
            "rol" => "usuario"
        ]);
        $respone->assertStatus(400);
    }


    /////
    public function test_register_emptyField()
    {
        $respone = $this->post('/api/register', [
            "name" => "artyom developer",
            "password" => "",
            "password_confirmation" => "",
            "email" => "artyeweworrm2123@developer.com",
            "rol" => "usuario"
        ]);
        $respone->assertStatus(400);
    }


    /*public function test_register()
    {
        $respone = $this->post('/api/register', [
            "name" => "artyom developer",
            "password" => "tutofox123",
            "password_confirmation" => "tutofox123",
            "email" => "artyeweworrm2123@developer.com",
            "rol" => "usuario"
        ]);
        $respone->assertStatus(400);
    }*/


    public function test_login()
    {
        $respone = $this->post('/api/login', [
            "email" => "artyeweworrm2123@developer.com",
            "password" => "tutofox123",
        ]);
        $respone->assertStatus(200);
    }



    public function test_login_missingField()
    {
        $respone = $this->post('/api/login', [
           
            "password" => "tutofox123",
        ]);
        $respone->assertStatus(400);
    }

    
    public function test_login_emptyField()
    {
        $respone = $this->post('/api/login', [
            "email" => "",
            "password" => "tutofox123",
        ]);
        $respone->assertStatus(400);
    }

}
