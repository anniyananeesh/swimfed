<?php
use GDText\Box;
use GDText\Color;

class Image {

    protected $im;
    protected $header;
    protected $path;

    public function __construct( $header = false, $path = false) {

        if($header) {
            $this->header = $header;
            header('Content-Type: image/png');
        }

        if($path) {
            $this->path = $path;
        }

    }

    public function drawIDCard($post, $image, $is_delete = false) {

        $im = imagecreatefrompng(CARD_TEMPLATE);
        $red = imagecolorallocate($im, 255, 9, 9);
        $grey = imagecolorallocate($im, 0, 0, 0);

        $mime = $this->getMime($image);
        $img1 = ($mime == 'image/jpg' || $mime == 'image/jpeg') ? imagecreatefromjpeg($image) : imagecreatefrompng($image);

        imagecopyresized ( $im , $img1 , 29 , 171 , 0 , 0 , 305 , 305 , imagesx($img1) , imagesy($img1));

        $box = new Box($im);
        //$box->setFontFace(FONT_TEMPLATE);
        $box->setFontFace(ROOT_PATH . "images/templates/Tahoma.ttf");
        $box->setFontSize(40);
        $box->setFontColor(new Color(10, 50, 138));

        //First name
        $box->setBox(350, 160, 400, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['first_name']);

        //Last name
        $box->setBox(350, 202, 400, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['last_name']);

        //Fathers name
        $box->setBox(350, 244, 400, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['father_name']);

        //Date of birth
        $box->setBox(350, 296, 400, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['dob']);

        //Type
        $box->setBox(350, 348, 200, 120);
        $box->setTextAlign('left', 'top');
        $box->draw(ucfirst($post['type']));

        //Cluub
        $box->setBox(350, 400, 600, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['club_name']);

        //Code
        $box->setFontSize(40);
        $box->setFontColor(new Color(10, 50, 138));
        $box->setBox(50, 490, 305, 50);
        $box->setTextAlign('center', 'center');
        $box->draw($post['code']);

        //Roboto-BoldCondensed
        //Age
        $box->setFontSize(50);
        $box->setFontFace(ROOT_PATH . "images/templates/TahomaBold.ttf");
        $box->setFontColor(new Color(0, 0, 0));
        $box->setBox(50, 570, 305, 50);
        $box->setTextAlign('left', 'center');
        $box->draw($post['age']);

        //EGY
        $box->setFontSize(50);
        $box->setFontColor(new Color(196, 8, 8));
        $box->setBox(50, 570, 920, 50);
        $box->setTextAlign('right', 'center');
        $box->draw($post['country']);

        $Image1Name = substr(md5(uniqid(rand())),0,15);
        $Image1Name = "IMG-".$Image1Name.".png";
        imagepng( $im, $this->path . '/' . $Image1Name);
        imagedestroy($im);

        if($is_delete) {
            //After we make the ID Card delete the uploaded member imageUpPath
            unlink($image);
        }

        return $Image1Name;
    }

    private function getMime($file) {
        $image_info = getimagesize($file);
        return $image_info['mime'];
    }

}
