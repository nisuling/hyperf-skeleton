<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\WebSocketClient\ClientFactory;
use Hyperf\WebSocketClient\Frame;

class IndexController extends AbstractController
{
    private $userService;

    function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * @Inject
     * @var ClientFactory
     */
    protected $clientFactory;

//    public function index()
//    {
//        // 对端服务的地址，如没有提供 ws:// 或 wss:// 前缀，则默认补充 ws://
//        $host = '127.0.0.1:9502';
//        $autoClose = false;
//        // 通过 ClientFactory 创建 Client 对象，创建出来的对象为短生命周期对象
//        $client = $this->clientFactory->create($host,$autoClose);
//        //print_r($client);
//        // 向 WebSocket 服务端发送消息
//        $client->push('HttpServer 中使用 WebSocket Client 发送数据。');
//        // 获取服务端响应的消息，服务端需要通过 push 向本客户端的 fd 投递消息，才能获取；以下设置超时时间 2s，接收到的数据类型为 Frame 对象。
//        ///** @var Frame $msg */
//        $msg = $client->recv(2);
//        // 获取文本数据：$res_msg->data
//        return $msg->data;
//    }

    public function index()
    {
        $user   = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method'  => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function test()
    {
        $request = $this->request->all();
        $method  = $this->request->getMethod();

        $user = $this->userService->getUser(1);

        $data = [
            'request' => $request,
            'method'  => $method,
            'message' => "hello world",
            'user'    => $user,
        ];

        // 返回json格式
        return $this->response->json($data);

        // 返回xml格式
        //return $response->xml($data);

        // 返回raw格式
        //return $response->raw('Hello Hyperf.');

        // 重定向
        //return $response->redirect('/');
    }

    public function pool(){}
}
