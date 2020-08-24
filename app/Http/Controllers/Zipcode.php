<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Zipcode extends Controller
{
    public function search()
    {
        $array = $fields = array();
        $i = 0;
        $handle = @fopen("../public/assets/zipcode.csv", "r");
        //=================================================================================================
        // data yg json
        $villages = json_decode(file_get_contents("../public/assets/villages.json"), true);
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


        /* =================================================================================================*/
        // check kecil gede sama atau ga
        // $latiung_json = array_slice($villages, 0, 1);
        // $latiung_excel = array_slice($zipcode, 49097, 1);
        // if (($latiung_excel[0]['Kelurahan/village']) == ($latiung_json[0]['name'])) {
        //     echo "sama";
        // } else {
        //     echo "gasama";
        // }
        /* =================================================================================================*/


        //ambil data yg excel
        $merge = array();
        $sample_excel = array_slice($zipcode, 0, 4800);
        // $sample_excel = array_chunk($zipcode, 10000);
        foreach ($sample_excel as $excel) {
            // foreach ($excel as $loop) {
                // array_push($merge, $this->binarySearch($villages, $loop['Kelurahan/village'], $loop['Postal Code']));
                array_push($merge, $this->search_json($excel['Kelurahan/village'], $excel['Postal Code'], $villages));
            // }
        }

        $out = response()->json($merge, 200, [], JSON_PRETTY_PRINT);
        $output = fopen("../public/assets/output.json", "w");
        fwrite($output, $out);
        fclose($output);
        return $out;

        /* =================================================================================================*/
        // ambil data yg json
        // $sample_json = array_slice($villages, 0, 5);
        // dd($sample_json);
        // foreach ($sample_json as $json) {
        //     echo $json['name'] . '<br>';
        // }
        /* =================================================================================================*/
    }

    public function search_json($snitch, $post, $seeker)
    {
        $snitch_up = strtoupper($snitch);
        $ketemu = 0;
        foreach ($seeker as $index => $data) {
            if ($data['name'] == $snitch_up) {
                $distric = $data["district_id"];
                $code = $data["code"];
                $name = $data["name"];
                $hasil = array_merge(
                    array("district_id" => $distric),
                    array("code" => $code),
                    array("name" => $name),
                    array("zipcode" => $post),
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
            $distric = "-----------------";
            $code = "-----------------";
            $name = $snitch_up;
            $hasil = array_merge(
                array("district_id" => $distric),
                array("code" => $code),
                array("name" => $name),
                array("zipcode" => $post),
            );
            $hasilakhir = array_merge($hasil);
            return $hasilakhir;
        }
    }

    public function binarySearch($arr, $x, $post)
    {
        $x = strtoupper($x);
        $ketemu = 0;
        $l = 0;
        $r = count($arr);
        while ($l <= $r) {
            $m = $l + (int) (($r - $l) / 2);
            
            $res = ($x == $arr[$m]['name']);
            
            // Check if x is present at mid 
            if ($res == 0) {
                // dd($m);
                $distric = $arr[$m]["district_id"];
                $code = $arr[$m]["code"];
                $name = $x;
                $hasil = array_merge(
                    array("district_id" => $distric),
                    array("code" => $code),
                    array("name" => $name),
                    array("zipcode" => $post),
                );
                $hasilakhir = array_merge($hasil);
                $ketemu = 1;
                // array_splice($seeker, $index, 1);
                return $hasilakhir;
            }
            
            // If x greater, ignore left half 
            if ($res > 0)
                $l = $m + 1;

            // If x is smaller, ignore right half 
            else
                $r = $m - 1;

        }

        $distric = "-----------------";
        $code = "-----------------";
        $name = $x;
        $hasil = array_merge(
            array("district_id" => $distric),
            array("code" => $code),
            array("name" => $name),
            array("zipcode" => $post),
        );
        $hasilakhir = array_merge($hasil);
        return $hasilakhir;



        // Driver Code 
        // $arr = array(
        //     "contribute", "geeks",
        //     "ide", "practice"
        // );
        // $x = "ide";
        // $result = binarySearch($arr, $x);

        // if ($result == -1)
        //     print("Element not present");
        // else
        //     print("Element found at index " .
        //         $result);
    }
}
