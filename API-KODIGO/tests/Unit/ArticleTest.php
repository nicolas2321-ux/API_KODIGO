<?php

namespace Tests\Unit;

use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_articles()
    {
        $response = $this->get('/api/articulos');
        $response->assertStatus(200);
    }
    
    public function test_newArticles_whithoutToken(){
        $text = "Authorization Token not found";
        $response = $this->post('/api/articulos/1',[
            "description"=>"prueba6",
	        "price"=>30,
	        "stock"=>230,
	        "visibility"=>0
        ]);
        $response->assertSeeText($text);
    }
    public function test_newArticles_whithToken(){
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY1NjM2NDMzLCJleHAiOjE2NjU2NDAwMzMsIm5iZiI6MTY2NTYzNjQzMywianRpIjoid29VcUl4NGp5bkZyRWk1RyIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.tlrY-229teo7kWUnRKgXgD9_E2JiZafriLQfniWxeFE";
        $response = $this->withToken($token)->json('POST', '/api/articulos/1',[
            "description"=>"prueba6",
	        "price"=>30,
	        "stock"=>230,
	        "visibility"=>0
        ]);
        $response->assertSuccessful();
    }

    public function test_updateArticles(){
        $response = $this->put('/api/articulos/6/',[
            "description"=>"prueba6",
	        "price"=>30,
	        "stock"=>230,
	        "visibility"=>0
        ]);
        $response->assertSuccessful();
    }

}
