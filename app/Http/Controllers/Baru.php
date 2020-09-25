<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Baru extends Controller
{
    public function search(Request $request)
    {
        $array = $fields = array();
        $i = 0;
        $handle = @fopen("../public/assets/zipcode.csv", "r");
        //=================================================================================================
        // data yg json
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================
        if ($handle) {
            while (($row = fgetcsv($handle, 4096, ";")) !== false) {
                if (empty($fields)) {
                    $fields = $row;
                    continue;
                }
                foreach ($row as $k => $value) {
                    $array[$i][$fields[$k]] = $value;
                }
                $i++;
            }
            //=================================================================================================
            //data yang excel
            $zipcode = $array;
            //=================================================================================================
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
        }

        //ambil data yg excel
        $merge = array();
        $sample_excel = array_slice($zipcode, $request->start, $request->jumlah);
        foreach ($sample_excel as $excel) {
            // dd($excel);
            array_push($merge, $this->search_json($excel['Kec/subDistrict'], $excel, $villages));
        }

        // $out = response()->json($merge, 200, [], JSON_PRETTY_PRINT);
        $out = json_encode($merge);
        $output = fopen("../public/assets/" . $request->output . ".json", "w");
        fwrite($output, $out);
        fclose($output);
        // return $out;
        return view('welcome', ['nama' => $request->output,])->with('success', 'done!');
    }

    public function search_json($snitch, $post, $seeker)
    {
        $snitch_up = str_replace(" ", "", strtoupper($snitch));
        $ketemu = 0;
        foreach ($seeker as $index => $data) {
            if (str_replace(" ", "", strtoupper($data['name'])) == $snitch_up && strlen($data['code']) == 8) {
                // return($snitch_up);
                // return str_replace(" ", "", strtoupper($data['name']));
                $distric = $data["code"];
                $code = $data["code"];
                $name = $post['Kelurahan/village'];
                $hasil = array_merge(
                    array("district_id" => $distric),
                    array("code" => $code),
                    array("name" => $name),
                    array("zipcode" => $post['Postal Code']),
                );
                $hasilakhir = array_merge($hasil);
                $ketemu = 1;
                array_splice($seeker, $index, 1);
                return $hasilakhir;
            } else {
                $ketemu = 0;
            }
        }
        if ($ketemu == 0) {
            // return $snitch_up;
            $distric = "-----------------";
            $code = "-----------------";
            $name = $post['Kelurahan/village'];
            $hasil = array_merge(
                array("district_id" => $distric),
                array("code" => $code),
                array("name" => $name),
                array("zipcode" => $post['Postal Code']),
            );
            $hasilakhir = array_merge($hasil);
            return $hasilakhir;
        }
    }

    public function searchdis(Request $request)
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/" . $request->output . ".json", "r"), true);
        //=================================================================================================

        //=================================================================================================
        // data yg code baru
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================

        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->district_json($excel,  $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/" . $request->outputfix . ".json", "w");
        fwrite($output, $out);
        fclose($output);
        // return ($out);
        return view('welcome', ['nama' => $request->outputfix,])->with('successdis', 'done!');
    }

    public function district_json($snitch, $seeker)
    {
        $snitch_up = str_replace(" ", "", strtoupper($snitch['name']));
        $ketemu = 0;
        foreach ($seeker as $index => $data) {
            if (strlen($data['code']) == 13) {
                // dd("ya");
                if (str_replace(" ", "", strtoupper($data['name'])) == $snitch_up && $snitch['code'] == substr($data["code"], 0, 8)) {
                    $distric = $snitch['district_id'];
                    $code = $data["code"];
                    $name = strtoupper($snitch['name']);
                    $hasil = array_merge(
                        array("district_id" => $distric),
                        array("code" => $code),
                        array("name" => $name),
                        array("zipcode" => $snitch["zipcode"]),
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
            $distric = $snitch['district_id'];
            $code = $snitch['code'] . "----";
            $name = strtoupper($snitch['name']);
            $hasil = array_merge(
                array("district_id" => $distric),
                array("code" => $code),
                array("name" => $name),
                array("zipcode" => $snitch['zipcode']),
            );
            $hasilakhir = array_merge($hasil);
            return $hasilakhir;
        }
    }
}
