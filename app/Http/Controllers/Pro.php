<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pro extends Controller
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
            array_push($merge, $this->search_json($excel['Province'], $excel, $villages));
        }

        // $out = response()->json($merge, 200, [], JSON_PRETTY_PRINT);
        $out = json_encode($merge);
        $output = fopen("../public/assets/" . $request->output . ".json", "w");
        fwrite($output, $out);
        fclose($output);
        // return $out;
        return view('welcome', ['nama' => $request->output,])->with('province', 'done!');
    }

    public function search_json($snitch, $post, $seeker)
    {
        $snitch_up = str_replace(" ", "", strtoupper($snitch));
        $ketemu = 0;
        foreach ($seeker as $index => $data) {
            if (str_replace(" ", "", strtoupper($data['name'])) == $snitch_up && strlen($data['code']) == 2) {
                // return($snitch_up);
                // return str_replace(" ", "", strtoupper($data['name']));
                $hasil = array_merge(
                    array("district_id" => $data["code"]),
                    array("code" => $data["code"]),
                    array("name" => $post['Kelurahan/village']),
                    array("zipcode" => $post['Postal Code']),
                    array("pro" => $data["code"]),
                    array("kab" => $data["code"]),
                    array("kec" => $data["code"]),
                    array("des" => $data["code"]),
                    array("Provinsi" => $post['Province']),
                    array("Kabupaten" => $post['City/Kab Name']),
                    array("Kecamatan" => $post['Kec/subDistrict']),
                    array("Desa" => $post['Kelurahan/village']),
                    array("Kodepos" => $post['Postal Code']),
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
            $hasil = array_merge(
                array("district_id" => "-----------------"),
                array("code" => "-----------------"),
                array("name" => $post['Kelurahan/village']),
                array("zipcode" => $post['Postal Code']),
                array("pro" => "-----------------"),
                array("kab" => "-----------------"),
                array("kec" => "-----------------"),
                array("des" => "-----------------"),
                array("Provinsi" => $post['Province']),
                array("Kabupaten" => $post['City/Kab Name']),
                array("Kecamatan" => $post['Kec/subDistrict']),
                array("Desa" => $post['Kelurahan/village']),
                array("Kodepos" => $post['Postal Code']),
            );
            $hasilakhir = array_merge($hasil);
            return $hasilakhir;
        }
    }
}
