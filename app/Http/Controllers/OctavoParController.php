<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OctavoParController extends Controller
{
    // NISTAGMO PROVOCADO - json
    static public function estructuraExaNistagmoProvocado(Request $request)
    {
        $datos = array();
        $datos['EaS'] = $request->EaS;
        $datos['LatEaS'] = $request->LatEaS;
        $datos['par1'] = $request->par1;
        $datos['fat1'] = $request->fat1;
        $datos['DurEaS'] = $request->DurEaS;
        $datos['verEaS'] = $request->verEaS;
        $datos['NauEaS'] = $request->NauEaS;
        $datos['VomEaS'] = $request->VomEaS;
        $datos['SaD'] = $request->SaD;
        $datos['LatSaD'] = $request->LatSaD;
        $datos['sad_1'] = $request->sad_1;
        $datos['sad_2'] = $request->sad_2;
        $datos['DurSaD'] = $request->DurSaD;
        $datos['sad_3'] = $request->sad_3;
        $datos['sad_4'] = $request->sad_4;
        $datos['sad_5'] = $request->sad_5;
        $datos['DaS'] = $request->DaS;
        $datos['LatDaS'] = $request->LatDaS;
        $datos['DaS_1'] = $request->DaS_1;
        $datos['DaS_2'] = $request->DaS_2;
        $datos['DurDaS'] = $request->DurDaS;
        $datos['DaS_3'] = $request->DaS_3;
        $datos['DaS_4'] = $request->DaS_4;
        $datos['DaS_5'] = $request->DaS_5;
        $datos['SaL'] = $request->SaL;
        $datos['LatSal'] = $request->LatSal;
        $datos['SaL_1'] = $request->SaL_1;
        $datos['SaL_2'] = $request->SaL_2;
        $datos['DurSal'] = $request->DurSal;
        $datos['SaL_3'] = $request->SaL_3;
        $datos['SaL_4'] = $request->SaL_4;
        $datos['SaL_5'] = $request->SaL_5;
        $datos['LaS'] = $request->LaS;
        $datos['LatLas'] = $request->LatLas;
        $datos['LaS_1'] = $request->LaS_1;
        $datos['LaS_2'] = $request->LaS_2;
        $datos['DurLaS'] = $request->DurLaS;
        $datos['LaS_3'] = $request->LaS_3;
        $datos['LaS_4'] = $request->LaS_4;
        $datos['LaS_5'] = $request->LaS_5;
        $datos['SaE'] = $request->SaE;
        $datos['LatSaE'] = $request->LatSaE;
        $datos['SaE_1'] = $request->SaE_1;
        $datos['SaE_2'] = $request->SaE_2;
        $datos['DurSaE'] = $request->DurSaE;
        $datos['SaE_3'] = $request->SaE_3;
        $datos['SaE_4'] = $request->SaE_4;
        $datos['SaE_5'] = $request->SaE_5;
        $datos['EaCC'] = $request->EaCC;
        $datos['LatEaCC'] = $request->LatEaCC;
        $datos['EaCC_1'] = $request->EaCC_1;
        $datos['EaCC_2'] = $request->EaCC_2;
        $datos['DurEaCC'] = $request->DurEaCC;
        $datos['EaCC_3'] = $request->EaCC_3;
        $datos['EaCC_4'] = $request->EaCC_4;
        $datos['EaCC_5'] = $request->EaCC_5;
        $datos['CCaE'] = $request->CCaE;
        $datos['LatCCaE'] = $request->LatCCaE;
        $datos['CCaE_1'] = $request->CCaE_1;
        $datos['CCaE_2'] = $request->CCaE_2;
        $datos['DurCCaE'] = $request->DurCCaE;
        $datos['CCaE_3'] = $request->CCaE_3;
        $datos['CCaE_4'] = $request->CCaE_4;
        $datos['CCaE_5'] = $request->CCaE_5;
        $datos['EaCCd'] = $request->EaCCd;
        $datos['LatEaCCd'] = $request->LatEaCCd;
        $datos['EaCCd_1'] = $request->EaCCd_1;
        $datos['EaCCd_2'] = $request->EaCCd_2;
        $datos['DurEaCCd'] = $request->DurEaCCd;
        $datos['EaCCd_3'] = $request->EaCCd_3;
        $datos['EaCCd_4'] = $request->EaCCd_4;
        $datos['EaCCd_5'] = $request->EaCCd_5;
        $datos['CCdaE'] = $request->CCdaE;
        $datos['LatCCdaE'] = $request->LatCCdaE;
        $datos['CCdaE_1'] = $request->CCdaE_1;
        $datos['CCdaE_2'] = $request->CCdaE_2;
        $datos['DurCCdaE'] = $request->DurCCdaE;
        $datos['CCdaE_3'] = $request->CCdaE_3;
        $datos['CCdaE_4'] = $request->CCdaE_4;
        $datos['CCdaE_5'] = $request->CCdaE_5;
        $datos['EaCCi'] = $request->EaCCi;
        $datos['LatEaCCi'] = $request->LatEaCCi;
        $datos['EaCCi_1'] = $request->EaCCi_1;
        $datos['EaCCi_2'] = $request->EaCCi_2;
        $datos['DurEaCCi'] = $request->DurEaCCi;
        $datos['EaCCi_3'] = $request->EaCCi_3;
        $datos['EaCCi_4'] = $request->EaCCi_4;
        $datos['EaCCi_5'] = $request->EaCCi_5;
        $datos['CCiaE'] = $request->CCiaE;
        $datos['LatCCiaE'] = $request->LatCCiaE;
        $datos['CCiaE_1'] = $request->CCiaE_1;
        $datos['CCiaE_2'] = $request->CCiaE_2;
        $datos['DurCCiaE'] = $request->DurCCiaE;
        $datos['CCiaE_3'] = $request->CCiaE_3;
        $datos['CCiaE_4'] = $request->CCiaE_4;
        $datos['CCiaE_5'] = $request->CCiaE_5;

        return json_encode($datos);
    }

    //
    static public function estructuraExaPruebaCalorica(Request $request)
    {

        $datos = array();
        $datos['DUR_IO30'] = $request->DUR_IO30;
        $datos['FR_IO30'] = $request->FR_IO30;
        $datos['AM_IO30'] = $request->AM_IO30;
        $datos['IO30_1'] = $request->IO30_1;
        $datos['IO30_2'] = $request->IO30_2;
        $datos['IO30_3'] = $request->IO30_3;
        $datos['VCL_IO30'] = $request->VCL_IO30;
        $datos['DUR_OD30'] = $request->DUR_OD30;
        $datos['FR_OD30'] = $request->FR_OD30;
        $datos['AM_OD30'] = $request->AM_OD30;
        $datos['OD30_1'] = $request->OD30_1;
        $datos['OD30_2'] = $request->OD30_2;
        $datos['OD30_3'] = $request->OD30_3;
        $datos['VCL_OD30'] = $request->VCL_OD30;
        $datos['DUR_IO44'] = $request->DUR_IO44;
        $datos['FR_IO44'] = $request->FR_IO44;
        $datos['AM_IO44'] = $request->AM_IO44;
        $datos['IO44_1'] = $request->IO44_1;
        $datos['IO44_2'] = $request->IO44_2;
        $datos['IO44_3'] = $request->IO44_3;
        $datos['VCL_IO44'] = $request->VCL_IO44;
        $datos['DUR_OD44'] = $request->DUR_OD44;
        $datos['FR_OD44'] = $request->FR_OD44;
        $datos['AM_OD44'] = $request->AM_OD44;
        $datos['OD44_1'] = $request->OD44_1;
        $datos['OD44_2'] = $request->OD44_2;
        $datos['OD44_3'] = $request->OD44_3;
        $datos['VCL_OD44'] = $request->VCL_OD44;
        $datos['DUR_OI18'] = $request->DUR_OI18;
        $datos['FR_OI18'] = $request->FR_OI18;
        $datos['AM_OI18'] = $request->AM_OI18;
        $datos['OI18_1'] = $request->OI18_1;
        $datos['OI18_2'] = $request->OI18_2;
        $datos['OI18_3'] = $request->OI18_3;
        $datos['VCL_OI18'] = $request->VCL_OI18;
        $datos['DUR_OP18'] = $request->DUR_OP18;
        $datos['FR_OP18'] = $request->FR_OP18;
        $datos['AM_OP18'] = $request->AM_OP18;
        $datos['OP18_1'] = $request->OP18_1;
        $datos['OP18_2'] = $request->OP18_2;
        $datos['OP18_3'] = $request->OP18_3;
        $datos['VCL_OP18'] = $request->VCL_OP18;

        return json_encode($datos);
    }

}
