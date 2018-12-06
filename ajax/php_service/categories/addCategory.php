<?php 
   function utf8convert($str) {

    if(!$str) return false;

    $utf8 = array(

    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

    'd'=>'đ|Đ',

    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

    'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

    'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',

    );

    foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);

    return $str;

}       
function utf8_to_url($text){
    $text = strtolower(utf8convert($text));
    $text = str_replace( "ß", "ss", $text);
    $text = str_replace( "%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -] /", "",$text);
    $text = str_replace(array('%20', ' '), '-', $text);
    $text = str_replace("----","-",$text);
    $text = str_replace("---","-",$text);
    $text = str_replace("--","-",$text);
    return $text;
};


    require('./../../../libs/Config.php');
    require('./../../../libs/Database.php');
    require('./../../../models/categories.php');

    $cateModel = new categories();

    $result = [
        'isSuccess' => false,
        'element' => ''
    ];
    $queryResult = '';

    $name = $_POST['name'];
    $image=$_FILES['image']['name'];
    $link_name = utf8_to_url($name);

    if(strlen($name)> 0  && strlen($image)>0){
       

        $sourcePath = $_FILES['image']['tmp_name'];      
        $targetPath = "./../../../public/img/".$image; 
    
        $data = [
            'name' => $name,
            'image' => $image,
            'link_name'=>$link_name
        ];
    
        if(file_exists('./../../../public/img/' . $image)){
           $queryResult = $cateModel->addNewCategory($data);
        }
        else{
            if(move_uploaded_file($sourcePath,$targetPath)){
                $queryResult = $cateModel->addNewCategory($data);
            }
        }

        $result['isSuccess'] = $queryResult['isSuccess'];
    
        $id =  $queryResult['lastInsertedId'];
        $result['element'] = $cateModel->getCategoryById($id);
    }

   
    
    
  
    echo(json_encode($result));
?>

