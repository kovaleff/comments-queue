<?php

namespace App\Http\Controllers;

use App\Events\OrderShipmentStatusUpdated;
use App\Http\Requests\HomeRequest;
use App\Jobs\ProcessPodcast;
use App\Models\Category;
use App\Models\House;
use App\Models\Product;
use App\Services\RabbitMQService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redis;
use Spatie\QueryBuilder\QueryBuilder;


class TestController extends Controller
{
    public function publishMessage(Request $request)
    {
        $message = 'iTest';

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish($message);
        return response('Message published to RabbitMQ');
    }

    public function consumeMessage()
    {
        $rabbitMQService = new RabbitMQService();

        $callback = function ($msg) {
            echo "Received message: " . $msg->body . "\n";
        };

        $rabbitMQService->consume($callback);
    }

    function testapi(HomeRequest $request){
        $products = QueryBuilder::for(Product::class)->allowedIncludes(['category'])->get();
        dd($products);
    }
}
