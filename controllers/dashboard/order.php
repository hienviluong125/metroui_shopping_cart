<?php
    class order extends BaseController {
        private $model;
        public function __construct(){
            authorization();
            $this->orderModel = $this->initModel('orders');
        }

        public function show(){
            $orders = $this->orderModel->getAllOrders();
            $orderArr = [];
            foreach($orders as $o){
                $orderItem = [
                    'id' => $o->id,
                    'price' => $o->price,
                    'createddate' => $o->createddate,
                    'status' => $o->status,
                    'delivereddate' => $o->delivereddate,
                    'details' => $this->orderModel->getOrderDetail($o->id)
                ];
                $orderArr[] = $orderItem;
            }
            $data = [
                'orders' =>  $orderArr
            ];
           
            $this->renderView('order/show',$data,'dashboard');
        }

        public function updateOrderStatus($id){
            $this->orderModel->updateOrderStatus($id);
            header('Location:'. ROOTURL . '/dashboard/order/show');
        }
    }
