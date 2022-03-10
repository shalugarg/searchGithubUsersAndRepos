<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Github\Client as Client;

/**
 * User Controller for searching users and their repos
 *
 */
class UserController extends Controller
{
    protected $client;

    /**
     * Constructor to authenticate the requests
     *
     */
    public function __construct()
    {
        //Client connection created
        $this->client = new Client();
        //Authenticating every request with access token 
        $this->client->authenticate(config('github.connections.main.token'), null,Client::AUTH_ACCESS_TOKEN);
    }

    /**
     * Search users by username and sort by no of followers.
     *
     * @link https://developer.github.com/v3/search/#search-repositories
     *
     * @param string $name    the username
     * 
     * @return json list of users found
     */
    function searchUser($name)
    {
        //searching users by username
        $users = $this->client->api('search')->users($name,'followers');
        foreach($users['items'] as $key=>$user){
            //Searching repositories for every user by username
            $repositories =$this->client->api('user')->repositories($user['login']);
            $users['items'][$key]['total_repos']=count($repositories);
            $users['items'][$key]['followers']=count($this->client->api('user')->followers($user['login']));
            $users['items'][$key]['following']=count($this->client->api('user')->following($user['login']));
            $users['items'][$key]['repos']=$repositories;
        }

        return response()->json($users);

    }

     /**
     * Search repositories by username.
     *
     *
     * @param string $name    the username
     * 
     * @return json list of repositories found
     */
    function searchRepositories($username)
    {
        //Searching repositories by username
        $repositories =$this->client->api('user')->repositories($username);
        $resultRepos= Array();
        $resultRepos['total_repos']=count($repositories);
        $resultRepos['repos']=$repositories;
        return response()->json($resultRepos);
    }
}
