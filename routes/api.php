<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/get_products', ProductController::class);

Route::apiResource('/get_products123', ProductController::class);

Route::get('/electronics', function () {
    $allProducts = collect([
        ['id' => 1, 'name' => 'Ultra HD Monitor', 'category' => 'Electronics', 'price' => '$199.99', 'stock' => 32],
        ['id' => 2, 'name' => 'Wireless Keyboard', 'category' => 'Accessories', 'price' => '$49.99', 'stock' => 12],
        ['id' => 3, 'name' => 'Bluetooth Speaker', 'category' => 'Audio', 'price' => '$29.95', 'stock' => 65],
        ['id' => 4, 'name' => 'Gaming Mouse', 'category' => 'Accessories', 'price' => '$35.50', 'stock' => 0],
        ['id' => 5, 'name' => 'USB-C Charger', 'category' => 'Power', 'price' => '$19.99', 'stock' => 100],
        ['id' => 6, 'name' => 'Laptop Stand', 'category' => 'Accessories', 'price' => '$22.00', 'stock' => 54],
        ['id' => 7, 'name' => 'Mechanical Keyboard', 'category' => 'Accessories', 'price' => '$89.99', 'stock' => 23],
        ['id' => 8, 'name' => 'Webcam 1080p', 'category' => 'Electronics', 'price' => '$59.00', 'stock' => 14],
        ['id' => 9, 'name' => 'Desk Lamp', 'category' => 'Office', 'price' => '$14.99', 'stock' => 80],
        ['id' => 10, 'name' => 'HDMI Cable', 'category' => 'Cables', 'price' => '$7.49', 'stock' => 240],
        ['id' => 1,  'name' => 'Ultra HD Monitor',      'category' => 'Electronics', 'price' => '$199.99', 'stock' => 32],
        ['id' => 2,  'name' => 'Wireless Keyboard',     'category' => 'Accessories', 'price' => '$49.99',  'stock' => 12],
        ['id' => 3,  'name' => 'Bluetooth Speaker',     'category' => 'Audio',       'price' => '$29.95',  'stock' => 65],
        ['id' => 4,  'name' => 'Gaming Mouse',          'category' => 'Accessories', 'price' => '$35.50',  'stock' => 0],
        ['id' => 5,  'name' => 'USB-C Charger',         'category' => 'Power',       'price' => '$19.99',  'stock' => 100],
        ['id' => 6,  'name' => 'Laptop Stand',          'category' => 'Accessories', 'price' => '$22.00',  'stock' => 54],
        ['id' => 7,  'name' => 'Mechanical Keyboard',   'category' => 'Accessories', 'price' => '$89.99',  'stock' => 23],
        ['id' => 8,  'name' => 'Webcam 1080p',          'category' => 'Electronics', 'price' => '$59.00',  'stock' => 14],
        ['id' => 9,  'name' => 'Desk Lamp',             'category' => 'Office',      'price' => '$14.99',  'stock' => 80],
        ['id' => 10, 'name' => 'HDMI Cable',            'category' => 'Cables',      'price' => '$7.49',   'stock' => 240],
        ['id' => 11, 'name' => 'Wireless Earbuds',      'category' => 'Audio',       'price' => '$59.99',  'stock' => 33],
        ['id' => 12, 'name' => 'External SSD 1TB',      'category' => 'Storage',     'price' => '$139.00', 'stock' => 10],
        ['id' => 13, 'name' => 'Smartphone Tripod',     'category' => 'Photography', 'price' => '$25.00',  'stock' => 47],
        ['id' => 14, 'name' => 'Noise Cancelling Headset', 'category' => 'Audio',     'price' => '$89.00',  'stock' => 6],
        ['id' => 15, 'name' => 'LED Light Strip',       'category' => 'Decor',       'price' => '$16.00',  'stock' => 95],
        ['id' => 16, 'name' => 'Ergonomic Chair',       'category' => 'Office',      'price' => '$229.00', 'stock' => 8],
        ['id' => 17, 'name' => 'Mini Projector',        'category' => 'Electronics', 'price' => '$110.00', 'stock' => 11],
        ['id' => 18, 'name' => 'WiFi Range Extender',   'category' => 'Networking',  'price' => '$39.99',  'stock' => 73],
        ['id' => 19, 'name' => 'Stylus Pen',            'category' => 'Accessories', 'price' => '$11.95',  'stock' => 38],
        ['id' => 20, 'name' => 'Graphics Tablet',       'category' => 'Design',      'price' => '$79.99',  'stock' => 21],
        ['id' => 21, 'name' => 'Smartwatch Series 5',   'category' => 'Wearables',   'price' => '$250.00', 'stock' => 9],
        ['id' => 22, 'name' => 'Portable Power Bank',   'category' => 'Power',       'price' => '$29.99',  'stock' => 120],
        ['id' => 23, 'name' => 'Dual Monitor Arm',      'category' => 'Office',      'price' => '$49.00',  'stock' => 17],
        ['id' => 24, 'name' => 'RJ45 Network Cable',    'category' => 'Cables',      'price' => '$4.50',   'stock' => 500],
        ['id' => 25, 'name' => 'Wireless Presenter',    'category' => 'Accessories', 'price' => '$18.00',  'stock' => 44],
        ['id' => 26, 'name' => 'Foldable Laptop Stand', 'category' => 'Accessories', 'price' => '$28.00',  'stock' => 77],
        ['id' => 27, 'name' => 'MagSafe Charger',       'category' => 'Power',       'price' => '$39.00',  'stock' => 26],
        ['id' => 28, 'name' => 'VR Headset',            'category' => 'Gaming',      'price' => '$299.00', 'stock' => 5],
        ['id' => 29, 'name' => 'Smart Plug 2-Pack',     'category' => 'Home',        'price' => '$22.99',  'stock' => 62],
        ['id' => 30, 'name' => 'Streaming Microphone',  'category' => 'Audio',       'price' => '$109.00', 'stock' => 14]
    ]);

    $perPage = request('perPage', 5);
    $page = request('page', 1);

    $paginated = $allProducts->forPage($page, $perPage)->values();

    function generatePaginationLinks($current, $last)
    {

        $links = [];

        $links[] = ['url' => $current > 1 ? url("/api/electronics?page=" . ($current - 1)) : null, 'label' => '&laquo; Previous', 'active' => false];

        for ($i = 1; $i <= $last; $i++) {
            $links[] = ['url' => url("/api/electronics?page=$i"), 'label' => "$i", 'active' => $i == $current];
        }

        $links[] = ['url' => $current < $last ? url("/api/electronics?page=" . ($current + 1)) : null, 'label' => 'Next &raquo;', 'active' => false];

        return $links;
    }

    // dd($allProducts->count());

    //  return response()->json($allProducts->count());

    return response()->json([
        'message' => 'Fetched successfully',
        'data' => [
            'current_page' => (int) $page,
            'data' => $paginated,
            'from' => (($page - 1) * $perPage) + 1,
            'to' => (($page - 1) * $perPage) + count($paginated),
            'total' => $allProducts->count(),
            'per_page' => $perPage,
            'last_page' => ceil($allProducts->count() / $perPage),
            'links' => generatePaginationLinks($page, ceil($allProducts->count() / $perPage)),
        ]
    ]);
})->name('admin.ele');
