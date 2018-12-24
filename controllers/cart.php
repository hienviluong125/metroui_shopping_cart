<?php
    class cart extends BaseController {
        public function __construct(){
            $this->model = $this->initModel('products');
        }

        public function index(){
            $cartSession = getSession('cart');
            $cart = [];
            $cartItemList= [];
            if(isset($cartSession)){
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

                $totalPrice = 0;
                foreach($cartItemList as $c){
                    $totalPrice+= $c['price'];
                }

                
            }
            $data =[
                'cartItemList' => $cartItemList,
                'totalPrice' => $totalPrice
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

        
}
