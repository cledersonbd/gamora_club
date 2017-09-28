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
        if(app()->environment('production')){
            \PagSeguroConfig::setEnvironment('production');
        }else{
            \PagSeguroConfig::setEnvironment('sandbox');
        }
        \PagSeguroConfig::setApplicationCharset('UTF-8');
        \PagSeguroConfig::activeLog('/tmp/pagseguro.log');
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

    public static function getPaymentMethods()
    {
        return [
            'boleto' => (object) [
                'name' => 'boleto',
                'description' => 'Boleto Bancário',
                'class' => ''
            ],
            'credit-card' => (object) [
                'name' => 'credit-card',
                'description' => 'Cartão de Crédito',
                'class' => ''
            ]
        ];
    }

    public static function payWithCreditCard(Plans $plan,$data)
    {
        dd(1);
        $paymentData = [
            "plan"=>$plan->hash,
            "reference"=>$plan->id,
            "sender"=>[
                "name"=>"José Comprador",
                "email"=>"email@consumidor.com.br",
                "ip"=>"1.1.1.1",
                "hash"=>"hash",
                "phone"=>[
                    "areaCode"=>"99",
                    "number"=>"99999999"
                ],
                "address"=>[
                    "street"=>"Av. PagSeguro",
                    "number"=>"9999",
                    "complement"=>"99o andar",
                    "district"=>"Jardim Internet",
                    "city"=>"Cidade Exemplo",
                    "state"=>"SP",
                    "country"=>"BRA",
                    "postalCode"=>"99999999"
                ],
                "documents"=>[
                    [
                        "type"=>"CPF",
                        "value"=>"99999999999"
                    ]
                ]
            ],
            "paymentMethod"=>[
                "type"=>"CREDITCARD",
                "creditCard"=>[
                    "token"=>"4C63F1BD5A0E47220F8DB2920325499D",
                    "holder"=>[
                        "name"=>"JOSÉ COMPRADOR",
                        "birthDate"=>"20/12/1990",
                        "documents"=>[
                            [
                                "type"=>"CPF",
                                "value"=>"99999999999"
                            ]
                        ],
                        "phone"=>[
                            "areaCode"=>"99",
                            "number"=>"99999999"
                        ],
                        "billingAddress"=>[
                            "street"=>"Av. PagSeguro",
                            "number"=>"9999",
                            "complement"=>"99o andar",
                            "district"=>"Jardim Internet",
                            "city"=>"Cidade Exemplo",
                            "state"=>"SP",
                            "country"=>"BRA",
                            "postalCode"=>"99999999"
                        ]
                    ]
                ]
            ]
        ];
        //        POST https://ws.pagseguro.uol.com.br/pre-approvals


    }

    public function payWithBoleto()
    {

    }
}