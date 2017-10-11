<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $fillable = ['name','description','hash','active'];
}

////URL create
//https://ws.sandbox.pagseguro.uol.com.br/pre-approvals/request?email={{email}}&token={{$token}}
////Headers
//Content-Type:application/json;charset=ISO-8859-1
//Accept:application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1
////Request
//{
//    "preApproval": {
//    "name": "Plano básico",
//        "charge": "AUTO",
//        "period": "MONTHLY",
//        "amountPerPayment": 22.90,
//        "expiration": {
//        "value": 1,
//            "unit": "YEARS"
//        }
//    },
//    "receiver": {
//    "email": "vitor.lobs@gmail.com"
//    }
//}
////Response
//{
//    "code": "3D897A77B4B44D4444C42FBEBF754F2C",
//    "date": "2017-09-24T21:14:05-03:00"
//}