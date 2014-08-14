<?php namespace App\Controllers;

use Controller,
    Response,
    Markdown,
    Request,
    Input,
    Validator,
    App;

class TwitterController extends Controller {

    public function show_index()
    {
        $html = Markdown::render(file_get_contents(base_path() . '/readme.md'));
        $thisServer = Request::server('SERVER_NAME');

        if ($thisServer) {
            $html = str_replace('your-virtual-host', $thisServer, $html);
        }

        return Response::make($html, 200);
    }

    public function api()
    {
        $username = Input::get('username');

        if ($username) {
            $grabber = App::make('App\Services\Contracts\TwitterUserDataSource');
            $user = $grabber->getUser($username)->getJsonArray();
            if (count($user) < 2) {
                $ret = array('success' => false, 'error' => 'No data found for user');
            } else {
                $ret = array('success' => true, 'data' => $user);
            }
            
        } else {
            $ret = array(
                'success' => false,
                'error' => 'Username was not provided.'
            );
        }

        return Response::json($ret);
    }

}