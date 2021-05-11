<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EDI\Reader;
use EDI\Encoder;

class ConverterController extends Controller
{
    public function index(Request $request){
        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($request->file);
        $worksheet = $spreadsheet->getActiveSheet();

        $array = ($worksheet->toArray());

        $oInterchange = (new \EDI\Generator\Interchange('KMT', $request->recv_code));

        $oCoprar = (new \EDI\Generator\Coprar())
            ->setVessel($array[3][1], $array[3][2], $array[3][3], $array[3][4])
            ->setPort(9, 'ITGOA')
            ->setETA('201701210000')
            ->setETD('201701210000')
            ->setCarrier('COS')
        ;

        for ($i=8; $i < count($array); $i++) {
            $oContainer = (new \EDI\Generator\Coprar\Container())
            ->setContainer($array[$i][1], '', 2, 5)
            ->setBooking($array[$i][0])
            ->setPOD($array[$i][5])->setFND($array[$i][6])
            ->setVGM($array[$i][8], $array[$i][9])
            ->setTemperature($array[$i][15])
            ->setDangerous(3, 1366)
            ->setOverDimensions(0, 0, 0, 0, 7.5)
            ->setCargoCategory($array[$i][12])
            ->setContainerOperator($array[$i][27]);

            $oCoprar = $oCoprar->addContainer($oContainer);

            $oCoprar = $oCoprar->compose(5, 45);
        }

        $aComposed = $oInterchange->addMessage($oCoprar)->getComposed();

        return view('welcome')->With([
            'value' =>(new \EDI\Encoder($aComposed, false))->get()
        ]);
    }
}
