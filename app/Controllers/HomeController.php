<?php
namespace App\Controllers;

// use Psr\Http\Message\ServerRequestInterface as Request;
// use Psr\Http\Message\ResponseInterface as Response;
use App\Models\User;

class HomeController extends Controller
{
    public function index($request, $response)
    {
        // var_dump($request->getParam('name'));
        // return 'HomeController';
        //return var_dump($container);
        //$user=$this->db->table('users')->find(1);
        //$user=$this->db->table('users')->where('id',1)->get();
        //$user=$this->db->table('users')->where('name','alex')->get();
        //broken/null
        //$user=$this->db->select('select * from users where id = ?', array(1));
        //$user=$this->db->pluck('name', 'id');
        //model query
        //$user=User::find(1);
        // $user=User::where('email','alex@codecourse.com')->first();
        // var_dump($user->email);
        // die();
        // User::create([
        //     'name' => 'TEST02',
        //     'email' => 'TEST02@email.com',
        //     'password' => '12345',
        // ]);
        return $this->view->render($response, 'home.twig');
    }
}
