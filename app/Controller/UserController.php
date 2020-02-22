<?php

// 开启严格模式
declare(strict_types=1);

namespace App\Controller;

use App\Service\UserService;
use Hyperf\DbConnection\Db;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

class UserController extends AbstractController
{
    private $userService;

    function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * 传统模式投递消息
     */
    public function index()
    {
        $this->userService->push(['id' => 1]);

        return 'success';
    }

    public function register()
    {

    }

    public function login()
    {

    }

    public function update()
    {
        //$request = $this->request->all();
        //$method  = $this->request->getMethod();
        var_dump('111');
//        $user = $this->userService->getUser(1);
//
//        $data = [
//            //'request' => $request,
//            //'method'  => $method,
//            'message' => "hello world",
//            'user'    => $user,
//        ];
//
//        // 返回json格式
//        return $this->response->json($data);
//        $result = Db::table('users')->where('id',$id)->update(['username'=>'nisuling']);

//        return [
//            'code' => 0,
//            'msg'  => '更新成功',
//            'data'    => $result,
//        ];
    }
}