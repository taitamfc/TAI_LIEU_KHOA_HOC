<?php
class Wp2023Order {
    private $_orders = '';
    public function __construct(){
        global $wpdb;
        $this->_orders = $wpdb->prefix.'wp2023_orders';//wp_wp2023_orders
        $this->_order_detail = $wpdb->prefix.'wp2023_order_detail';//wp_wp2023_order_detail
    }

    public function all(){
        global $wpdb;
        $sql = "SELECT * FROM $this->_orders";
        $items = $wpdb->get_results($sql);
        return $items;
    }

    public function paginate($limit = 20){
        global $wpdb;

        $s = isset( $_REQUEST['s'] ) ? $_REQUEST['s'] : '';
        $status = isset( $_REQUEST['status'] ) ? $_REQUEST['status'] : '';
        $paged = isset( $_REQUEST['paged'] ) ? $_REQUEST['paged'] : 1;

        // Lấy tổng số records
        $sql = "SELECT count(id) FROM $this->_orders WHERE deleted = 0";
        // Tim kiếm
        if( $s ){
            $sql .= " AND ( customer_name LIKE '%$s%' OR customer_phone LIKE '%$s%' )";
        }
        if( $status ){
            $sql .= " AND status = '$status'";
        }
        $total_items = $wpdb->get_var($sql);
        
        // Thuật toán phân trang
        /*
        Limit: limit
        Tổng số trang: total_pages
        Tính offset
        */
        $total_pages    = ceil( $total_items / $limit );
        $offset         = ( $paged * $limit ) - $limit;

        $sql = "SELECT * FROM $this->_orders WHERE deleted = 0";
        // Tim kiếm
        if( $s ){
            $sql .= " AND ( customer_name LIKE '%$s%' OR customer_phone LIKE '%$s%' )";
        }
        if( $status ){
            $sql .= " AND status = '$status'";
        }
        $sql .= " ORDER BY id DESC";
        $sql .= " LIMIT $limit OFFSET $offset";


        $items = $wpdb->get_results($sql);
        return [
            'total_pages'   => $total_pages,
            'total_items'   => $total_items,
            'items'         => $items
        ];

    }

    public function find($id){
        global $wpdb;
        $sql = "SELECT * FROM $this->_orders WHERE id = $id";
        $item = $wpdb->get_row($sql);
        return $item;
    }

    public function save($data){
        global $wpdb;
        $wpdb->insert($this->_orders, $data);
        $lastId = $wpdb->insert_id;
        $item = $this->find($lastId);
        return $item;
    }
    public function update($id,$data){
        global $wpdb;
        $wpdb->update($this->_orders, $data, [
            'id' => $id
        ]);
        $item = $this->find($id);
        return $item;
    }
    public function trash($id){
        global $wpdb;
        $wpdb->update(
            $this->_orders, 
            [
                'deleted' => 1
            ], 
            [
                'id' => $id
            ]
        );
        return true;
    }

    public function destroy($id){
        global $wpdb;
        $wpdb->delete($this->_orders,[
            'id' => $id
        ]);
        return true;
    }

    public function change_status($order_id,$status){
        global $wpdb;
        $wpdb->update(
            $this->_orders, 
            [
                'status' => $status
            ], 
            [
                'id' => $order_id
            ]
        );
        return true;
    }

    public function order_items($order_id){
        global $wpdb;
        $sql = "SELECT products.post_title as product_name,order_detail.* FROM $this->_order_detail as order_detail 
        JOIN $wpdb->posts as products ON products.ID = order_detail.product_id
        WHERE order_detail.order_id = $order_id
        ORDER BY order_detail.id DESC
        ";
        $items = $wpdb->get_results($sql);
        return $items;
    }
}