<?php
/**
 * Created by PhpStorm.
 * User: magusd
 * Date: 9/24/17
 * Time: 5:03 PM
 */

namespace App;


use Illuminate\Support\Facades\Session;

class PaymentGateway
{
    public static $instance;
    public static $key = 'payment-session';
    protected $credentials;

    public static function make()
    {
        if(!self::$instance){
            self::$instance = new PaymentGateway();
            self::$instance->boot();
        }
        return self::$instance;
    }

    public function boot()
    {
        \PagSeguroLibrary::init();
        \PagSeguroLibrary::setCMSVersion('1.0.0');
        \PagSeguroLibrary::setPHPVersion('7.0.0');
        \PagSeguroLibrary::setModuleVersion('2.7');

        \PagSeguroConfig::init();
//        \PagSeguroConfig::setEnvironment('production');
        \PagSeguroConfig::setEnvironment('sandbox');
        \PagSeguroConfig::setApplicationCharset('UTF-8');
        \PagSeguroConfig::activeLog('/tmp/pagseguro.log');
//        $credentials = new \PagSeguroApplicationCredentials(
//            config('services.pagseguro.app.id'),
//            config('services.pagseguro.app.key'),
//            config('services.pagseguro.seller.publickey')
//        );
        $credentials = new \PagSeguroAccountCredentials(
            config('services.pagseguro.email'),
            config('services.pagseguro.token'));
        $this->credentials = $credentials;
    }

    public static function getBrowserToken()
    {
        $session = session(self::$key);
        if(!$session){
            try {
                $instance = self::make();
                $session = \PagSeguroSessionService::getSession($instance->credentials);
                session([self::$key => $session]);
                session()->save();
            } catch (\Exception $e) {
                die($e->getMessage());
            }
        }
        return $session;
    }
}