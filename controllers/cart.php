<?php
    class cart extends BaseController {
        public function __construct(){
            $this->model = $this->initModel('products');
            $this->categoryModel = $this->initModel('categories');
            $this->brandModel = $this->initModel('brands');
            $this->userModel = $this->initModel('users');
            $this->orderModel = $this->initModel('orders');
        }

        public function index(){
            $cartSession = getSession('cart');
            $cart = [];
            $cartItemList= [];
            $totalPrice = 0;
            if(isset($cartSession) && !empty($cartSession)){
                $StrIdArr = "";
                $cart = $cartSession;
                for($i = 0;$i<count($cart);$i++){
                    $char = ",";
                   if($i === count($cart)-1){
                        $char=  "";    
                   }
                   $StrIdArr = $StrIdArr . (string)$cart[$i]['id'] . $char;
                }

                $productsInCart = $this->model->getProductsWithMoreId($StrIdArr);
                $cartItemList = [];

                for($i = 0;$i<count($cart);$i++){
                    $cartItemList[] = [
                        'id' => $cart[$i]['id'],
                        'name' => $productsInCart[$i]->name,
                        'image' => $productsInCart[$i]->image,
                        'qty' => $cart[$i]['qty'],
                        'price' => $cart[$i]['qty'] *  $productsInCart[$i]->price,
                    ];
                }

                foreach($cartItemList as $c){
                    $totalPrice+= $c['price'];
                }

                
            }
            $data =[
                'cartItemList' => $cartItemList,
                'totalPrice' => $totalPrice,
                'allCategories' => $this->categoryModel->getAllCategories(0)['categories'],
                'allBrands' => $this->brandModel->getAllBrands(0)['brands']
            ];
            $this->renderView('cart/index',$data);
        }

        public function deleteBy($id){
            $cartItemList = getSession('cart');
     
            $index = -1;
            if(isset($cartItemList)){
                for($i = 0;$i<count($cartItemList);$i++){
                    if((string)$id == (string)$cartItemList[$i]['id']){
                        $index =$i;
                        break;
                    }
                }
               
             
                unset($cartItemList[$index]);
                $cartItemList = array_values($cartItemList);
                if(count($cartItemList) < 1){
                    clearSession('cart');
                }else{
                    createSession('cart',$cartItemList);
                }
              
               header('Location: '. ROOTURL . '/cart');
               
            }
        //   
            

        }

        public function deleteAll(){
            clearSession('cart');
            header('Location: '. ROOTURL . '/cart');
        }




        public function checkout(){
            $data = [
                'isSuccess' => false,
                'allCategories' => $this->categoryModel->getAllCategories(0)['categories'],
                'allBrands' => $this->brandModel->getAllBrands(0)['brands']
            ];
            $user = getSession('user');
            if(isset($user) && !empty($user)){

                $userInfo = $this->userModel->getInfoUser($user['username']);
                $cartList = getSession('cart');
                if(!isset($cartList) || empty($cartList)){
                    header('Location: '. ROOTURL . '/cart');
                }else{

                    $StrIdArr = "";
                    $cart = $cartList;
                    for($i = 0;$i<count($cart);$i++){
                        $char = ",";
                       if($i === count($cart)-1){
                            $char=  "";    
                       }
                       $StrIdArr = $StrIdArr . (string)$cart[$i]['id'] . $char;
                    }

                    $productsInCart = $this->model->getProductsWithMoreId($StrIdArr);
                    $cartItemList = [];
    
                    for($i = 0;$i<count($cart);$i++){
                        $cartItemList[] = [
                            'id' => $cart[$i]['id'],
                            'name' => $productsInCart[$i]->name,
                            'image' => $productsInCart[$i]->image,
                            'qty' => $cart[$i]['qty'],
                            'price' => $cart[$i]['qty'] *  $productsInCart[$i]->price,
                        ];
                    }
    
                    $totalPrice = 0;
                    foreach($cartItemList as $c){
                        $totalPrice+= $c['price'];
                    }
                    
                    
                    if($this->orderModel->addOrder($userInfo->id,$totalPrice)){
                        $orderObj = $this->orderModel->getOrderIDOfUser($userInfo->id);
                        foreach($cartItemList as $c){
                            $this->orderModel->addOrderDetal($c['id'],$orderObj->id,$c['qty'],$c['price']);
                        }
                    }
                    clearSession('cart');
                }
                $data['isSuccess'] = true;
                $this->renderView('cart/checkout',$data);
            }
            else{
                $this->renderView('cart/checkout',$data);
            }
            
            
            
        }

        
}
