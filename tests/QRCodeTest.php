<?php
namespace QRCodeTest;
use qr_code\QrCode;
use PHPUnit\Framework\TestCase;
class QRCodeTest extends TestCase{
  
  //Generating 2-D Code Picture File 
  public function testQRCodeFile(){
    $text = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pixel = 350;
    $icon = dirname(__FILE__).'/icon.jpg';
    $distinguish ='L';
    $type = 'png';
    $margin = 0;
    $color = 'FffFFF,#000000';
    $spec = 10;
    $OutputPath = '/tmp/QRCodeTest.'.$type;
    $this->assertFileExists($icon);
    QrCode::image($text, $pixel, $icon, $distinguish, $type, $margin, $color, $spec, false, $OutputPath);
    $this->assertFileExists($OutputPath);
  }
  
  //Testing raw data of two-dimensional code
  public function testQRCodeData(){
    $imag = QrCode::image('QRCode', 32, false, 'H', 'jpg', 2, array('235,00,100','68,200,90'), 10, true);
    $this->assertTrue(is_array($imag));
  }
}
