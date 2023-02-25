<?php
/*
RestAPI:
RESTful API là một tiêu chuẩn dùng trong việc thiết kế API cho các ứng dụng webservice
Web services là một tập hợp các giao thức và tiêu chuẩn mở được sử dụng để trao đổi
dữ liệu giữa các ứng dụng, các hệ thống

REST hoạt động dựa chủ yếu trên phương thức CRUD ( Create, Read, Update, Delete) 
tương đương với 4 giao thức HTTP: POST, GET, PUT, DELETE.

Xây dựng rest api cho tài nguyên orders

GET     - /orders - lấy toàn bộ orders
POST    - /orders - thêm mới order

GET     - /orders/{id} - lấy chi tiết order theo tham số id
PUT     - /orders/{id} - cập nhật order theo tham số id
DELETE  - /orders/{id} - xóa order theo tham số id
*/

add_action('rest_api_init','wp2023_apis');
function wp2023_apis(){
    $namespace  = 'wp2023/v1';
    $base       = 'orders';

    //http://yourdomain.com/wp-json/wp2023/v1/orders
    register_rest_route( $namespace,'/'.$base,[ ///wp2023/v1/orders
        [
            'methods'             => WP_REST_Server::READABLE,//GET
            'callback'            => 'wp2023_apis_order_all'
        ],
        [
            'methods'             => WP_REST_Server::CREATABLE,//POST
            'callback'            => 'wp2023_apis_order_store'
        ]
    ] );
    //http://yourdomain.com/wp-json/wp2023/v1/orders/5
    register_rest_route($namespace,'/'.$base.'/(?P<id>[\d]+)',[
        [
            'methods'             => WP_REST_Server::READABLE,//GET
            'callback'            => 'wp2023_apis_order_show'
        ],
        [
            'methods'             => WP_REST_Server::EDITABLE,//PUT
            'callback'            => 'wp2023_apis_order_update'
        ],
        [
            'methods'             => WP_REST_Server::DELETABLE,//DELETE
            'callback'            => 'wp2023_apis_order_destroy'
        ]
    ]);

    register_rest_route($namespace,'/'.$base.'/(?P<id>[\d]+)/order_items',[
        'methods'             => WP_REST_Server::READABLE,//GET
        'callback'            => 'wp2023_apis_order_order_items'
    ]);
}

//GET     - /orders - lấy toàn bộ orders
function wp2023_apis_order_all($request){
    $objWp2023Order = new Wp2023Order();
    $result = $objWp2023Order->paginate();
    $data = [
        'success' => true,
        'data'    => $result
    ];
    return new WP_REST_Response( $data, 200 );
}
//POST    - /orders - thêm mới order
function wp2023_apis_order_store($request){
    $objWp2023Order = new Wp2023Order();
    $saved = $objWp2023Order->save($_POST);
    $data = [
        'success' => true,
        'data' => $saved,
    ];
    return new WP_REST_Response( $data, 201 );

}
//GET     - /orders/{id} - lấy chi tiết order theo tham số id
function wp2023_apis_order_show($request){
    $id = $request['id'];
    $objWp2023Order = new Wp2023Order();
    $item = $objWp2023Order->find($id);
    $data = [
        'success' => true,
        'data' => $item,
    ];
    return new WP_REST_Response( $data, 200 );
}
//PUT     - /orders/{id} - cập nhật order theo tham số id
function wp2023_apis_order_update($request){
    $id = $request['id'];
    $objWp2023Order = new Wp2023Order();
    $saved = $objWp2023Order->update($id,$_POST);
    $data = [
        'success' => true,
        'data' => $saved,
    ];
    return new WP_REST_Response( $data, 200 );
}
//DELETE  - /orders/{id} - xóa order theo tham số id
function wp2023_apis_order_destroy($request){
    $id = $request['id'];
    $objWp2023Order = new Wp2023Order();
    $saved = $objWp2023Order->destroy($id);
    $data = [
        'success' => true
    ];
    return new WP_REST_Response( $data, 200 );
}

function wp2023_apis_order_order_items($request){
    $id = $request['id'];
    $data = [
        'success' => true,
        'message' => 'Bạn đã lấy kết quả của orderid '.$id.' thành công'
    ];
    return new WP_REST_Response( $data, 200 );
}