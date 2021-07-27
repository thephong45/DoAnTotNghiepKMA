<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class Oauth2SettingController extends Controller
{
    //
    public function index(Request $request){
        if (session()->has('token')){
            redirect()->route('welcome');
        }
        $oauth2_setting = DB::table('oauth2_settings')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $id = $clientId = $redirectUri = $oauth2Url = $clientSecret = '';
        if($oauth2_setting != null && count($oauth2_setting) > 0){
            $clientId = $oauth2_setting[0]->client_id;
            $redirectUri = $oauth2_setting[0]->redirect_uri;
            $oauth2Url = $oauth2_setting[0]->oauth2_url;
            $clientSecret = $oauth2_setting[0]->client_secret;
            $id = $oauth2_setting[0]->id;
        }

        return view('oauth2_setting')->with([
            'clientId' => $clientId,
            'redirectUri' => $redirectUri,
            'oauth2Url' => $oauth2Url,
            'clientSecret' => $clientSecret,
            'id' => $id
        ]);
    }

    public function saveOauth2(Request $request){
        if(isset($request->id) && $request->id > 0){
            DB::table('oauth2_settings')
                ->where('id', $request->id)
                ->update([
                    'client_id' => $request->client_id,
                    'redirect_uri' => $request->redirect_uri,
                    'oauth2_url' => $request->oauth2_url,
                    'client_secret' => $request->client_secret,
                ]);
        }else{
            DB::table('oauth2_settings')
                ->insert([
                    'client_id' => $request->client_id,
                    'redirect_uri' => $request->redirect_uri,
                    'oauth2_url' => $request->oauth2_url,
                    'client_secret' => $request->client_secret,
                    'created_at' => date('y-m-d H:i:s'),
                    'updated_at' => date('y-m-d H:i:s')
                ]);
        }
        return redirect()->route('home');
    }

    public function connection(Request $request) {

        $request->session()->put('state', $state = Str::random(40));
        $query = http_build_query([
            'client_id'     => "12",
            'redirect_uri'  => 'http://127.0.0.1:8001/callback',
            'response_type' => 'code',
            'scope'         => '',
            'state'         => $state
        ]);

        return redirect('http://127.0.0.1:8000/oauth/authorize?'.$query);

    }

    public function callback(Request $request) {


        $http = new Client();
        $response = $http->post( 'http://127.0.0.1:8000/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '12',
                'client_secret' => 'g1jgdEJOUKH9IcHcNXa63PrGfqcOV8frmc299smZ',
                'redirect_uri' => 'http://127.0.0.1:8001/callback',
                'code' => $request->code,
            ]
        ]);

        $request->session()->put('token', json_decode((string)$response->getBody(), true));
//
//            return redirect()->route('welcome');
        $body =  json_decode((string) $response->getBody(), true);

        $response = $http->get('http://127.0.0.1:8000/api/user', [
            'headers' => [
                'Authorization' => 'Bearer ' . $body['access_token'],
            ],
        ]);


        $user = json_decode((string) $response->getBody(), true);

        return view('welcome')->with([
            'user' => $user
        ]);

    }

    public function logout(Request $request) {
//        $oauth2_setting = DB::table('oauth2_settings')
//            ->orderBy('id', 'desc')
//            ->take(1)
//            ->get();
//
//        $id = $clientId = $redirectUri = $oauth2Url = $clientSecret = '';
//        if($oauth2_setting != null && count($oauth2_setting) > 0){
//            $clientId = $oauth2_setting[0]->client_id;
//            $redirectUri = $oauth2_setting[0]->redirect_uri;
//            $oauth2Url = $oauth2_setting[0]->oauth2_url;
//            $clientSecret = $oauth2_setting[0]->client_secret;
//            $id = $oauth2_setting[0]->id;
//        }



        if (session()->has('token')) {
            Session::flush();
            return view('oauth2_setting');
//            $array  = Session::get('token');
//            return view('oauth2_setting')->with([
//                'clientId' => $clientId,
//                'redirectUri' => $redirectUri,
//                'oauth2Url' => $oauth2Url,
//                'clientSecret' => $clientSecret,
//                'id' => $id,
//            ]);
        }


    }




//    public function connection(Request $request){
////        $oauth2_setting = DB::table('oauth2_settings')
////            ->orderBy('id', 'desc')
////            ->take(1)
////            ->get();
////        $clientId = $redirectUri = $oauth2Url = '';
////        if($oauth2_setting != null && count($oauth2_setting) > 0){
////            $clientId = $oauth2_setting[0]->client_id;
////            $redirectUri = $oauth2_setting[0]->redirect_uri;
////            $oauth2Url = $oauth2_setting[0]->oauth2_url;
////
////
////        }
////        Lưu session
//        $request->session()->put('state', $state = Str::random(40));
//
//        $query = http_build_query([
//            'client_id' => '5',
//            'redirect_uri' => 'http://127.0.0.1:8001/callback',
//            'response_type' => 'code',
//            'scope' => '',
//            'state' => $state,
//        ]);
//
//        return redirect('http://127.0.0.1:8000/oauth/authorize?'.$query);
//    }
//
//    public function callback(Request $request){
//
////        $oauth2_setting = DB::table('oauth2_settings')
////            ->orderBy('id', 'desc')
////            ->take(1)
////            ->get();
////
////        $clientId = $redirectUri = $oauth2Url = $clientSecret = '';
////
////        if($oauth2_setting != null && count($oauth2_setting) > 0){
////            $clientId = $oauth2_setting[0]->client_id;
////            $redirectUri = $oauth2_setting[0]->redirect_uri;
////            $oauth2Url = $oauth2_setting[0]->oauth2_url;
////            $clientSecret = $oauth2_setting[0]->client_secret;
////
////
////        }
//
//
//        $state = $request->session()->pull('state');
//
//        throw_unless(
//            strlen($state) > 0 && $state === $request->state,
//            InvalidArgumentException::class
//        );
//
//        $http = new GuzzleHttp\Client;
//
//        $response = $http->post('http://127.0.0.1:8000/oauth/token', [
//            'form_params' => [
//                'grant_type' => 'authorization_code',
//                'client_id' => '5',
//                'client_secret' => 'pIeoVb7SGQBjzLRRZWwfcxbZ6HlglqCDXjzHL4Mm',
//                'redirect_uri' => 'http://127.0.0.1:8001/callback',
//                'code' => $request->code,
//            ],
//        ]);
//
//        $body =  json_decode((string) $response->getBody(), true);
//        $response = $http->get('http://127.0.0.1:8000/api/user', [
//            'headers' => [
//                'Authorization' => 'Bearer ' . $body['access_token'],
//            ],
//        ]);
//
//        // $response = $http->request('GET', 'http://127.0.0.1:8000/api/user', [
//        //     'headers' => [
//        //         'Accept' => 'application/json',
//        //         'Authorization' => 'Bearer '.$body['access_token'],
//        //     ],
//        // ]);
//
//        return json_decode((string) $response->getBody(), true);
//    }






//    public function welcome(Request $request) {
//        if (!session()->has('token')) {
//            return redirect()->route('home');
//        }
//
//        $oauth2_setting = DB::table('oauth2_settings')
//            ->orderBy('id', 'desc')
//            ->take(1)
//            ->get();
//
//        $oauth2Uri = "";
//        if ($oauth2_setting != null && count($oauth2_setting) > 0) {
//            $oauth2Uri = $oauth2_setting[0]->oauth2_url;
//        }
//
//        $http = new Client();
//        $response = $http->get($oauth2Uri.'/api/profile', [
//            'headers'        => [
//                'Authorization' => 'Bearer '.\Session::get('token.access_token')
//            ]
//        ]);
//        $user = json_decode((string) $response->getBody(), true);
//        // if ($user == null || ($user['name'] == '' && $user['email'] == '')) {
//        // 	return redirect()->route('home');
//        // }
//
//        return view('welcome')->with([
//            'user' => $user
//        ]);
//    }
//






}
