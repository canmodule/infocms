<?php

namespace ModuleInfocms\Controllers\Web;

use Gregwar\Captcha\CaptchaBuilder;
use Session;

class CommonController extends Controller
{

    /**
     * @return string
     */
    public function captcha()
    {
        /*$builder = (new CaptchaBuilder(4))->build(150, 46);
        session()->put('captcha', $builder->getPhrase());
        return $builder->get();*/

        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
 
        //把内容存入session
        Session::flash('milkcaptcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');

$builder->output();
    }
}
