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

    public function drawIDCard($post, $image) {

        $im = imagecreatefrompng(CARD_TEMPLATE);
        $red = imagecolorallocate($im, 255, 9, 9);
        $grey = imagecolorallocate($im, 0, 0, 0);

        $mime = $this->getMime(CARD_UP_PATH . '/' . $image);

        $img1 = ($mime == 'image/jpg' || $mime == 'image/jpeg') ? imagecreatefromjpeg(CARD_UP_PATH . '/' . $image) : imagecreatefrompng(CARD_UP_PATH . '/' . $image);

        imagecopyresized ( $im , $img1 , 52 , 171 , 0 , 0 , 305 , 305 , imagesx($img1) , imagesy($img1));

        $box = new Box($im);
        $box->setFontFace(FONT_TEMPLATE);
        $box->setFontSize(30);
        $box->setFontColor(new Color(0, 0, 0));

        //First name
        $box->setBox(380, 190, 400, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['first_name']);

        //Last name
        $box->setBox(380, 232, 400, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['last_name']);

        //Fathers name
        $box->setBox(380, 274, 400, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['father_name']);

        //Date of birth
        $box->setBox(380, 326, 400, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['dob']);

        //Type
        $box->setBox(380, 378, 200, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['type']);

        //Cluub
        $box->setBox(380, 430, 400, 120);
        $box->setTextAlign('left', 'top');
        $box->draw($post['club_name']);

        //Code
        $box->setFontSize(35);
        $box->setFontColor(new Color(20, 58, 141));
        $box->setBox(50, 490, 305, 50);
        $box->setTextAlign('center', 'center');
        $box->draw($post['code']);

        $Image1Name = substr(md5(uniqid(rand())),0,15);
        $Image1Name = "IMG-".$Image1Name.".png";
        imagepng( $im, $this->path . '/' . $Image1Name);
        imagedestroy($im);

        //After we make the ID Card delete the uploaded member imageUpPath
        unlink(CARD_UP_PATH . '/' . $image);

        return $Image1Name;
    }

    private function getMime($file) {

        $image_info = getimagesize($file);
        return $image_info['mime'];
    }

}
