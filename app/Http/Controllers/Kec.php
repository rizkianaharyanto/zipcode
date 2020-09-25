<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kec extends Controller
{
    public function search(Request $request)
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg json
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/" . $request->output . ".json", "r"), true);
        //=================================================================================================


        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            // dd($excel);
            array_push($merge, $this->search_json($excel['Kecamatan'], $excel, $villages));
        }

        // $out = response()->json($merge, 200, [], JSON_PRETTY_PRINT);
        $out = json_encode($merge);
        $output = fopen("../public/assets/" . $request->outputfix . ".json", "w");
        fwrite($output, $out);
        fclose($output);
        // return $out;
        return view('welcome', ['nama' => $request->outputfix,])->with('kec', 'done!');
    }

    public function search_json($snitch, $post, $seeker)
    {
        $snitch_up = str_replace(" ", "", strtoupper($snitch));
        $ketemu = 0;
        foreach ($seeker as $index => $data) {
            if (strlen($data['code']) == 8) {
                // dd("ya");
                // dd("KAB. ".$snitch_up);
                if (str_replace(" ", "", strtoupper($data['name'])) == $snitch_up && $post['code'] == substr($data["code"], 0, 5)) {
                    // return str_replace(" ", "", strtoupper($data['name']));
                    $hasil = array_merge(
                        array("district_id" => $data["code"]),
                        array("code" => $data["code"]),
                        array("name" => $post['Desa']),
                        array("zipcode" => $post['Kodepos']),
                        array("pro" => $post['pro']),
                        array("kab" => $post["kab"]),
                        array("kec" => $data["code"]),
                        array("des" => $data["code"]),
                        array("Provinsi" => $post['Provinsi']),
                        array("Kabupaten" => $post['Kabupaten']),
                        array("Kecamatan" => $post['Kecamatan']),
                        array("Desa" => $post['Desa']),
                        array("Kodepos" => $post['Kodepos']),
                    );
                    $hasilakhir = array_merge($hasil);
                    $ketemu = 1;
                    array_splice($seeker, $index, 1);
                    return $hasilakhir;
                } else {
                    $ketemu = 0;
                }
            }
        }
        if ($ketemu == 0) {
            $hasil = array_merge(
                array("district_id" => "-----------------"),
                array("code" => "-----------------"),
                array("name" => $post['Desa']),
                array("zipcode" => $post['Kodepos']),
                array("pro" => $post['pro']),
                array("kab" => $post["kab"]),
                array("kec" => "-----------------"),
                array("des" => "-----------------"),
                array("Provinsi" => $post['Provinsi']),
                array("Kabupaten" => $post['Kabupaten']),
                array("Kecamatan" => $post['Kecamatan']),
                array("Desa" => $post['Desa']),
                array("Kodepos" => $post['Kodepos']),
            );
            $hasilakhir = array_merge($hasil);
            return $hasilakhir;
        }
    }
}
