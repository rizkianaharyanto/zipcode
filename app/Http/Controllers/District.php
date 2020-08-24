<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class District extends Controller
{
    public function search()
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/output.json", "r"), true);
        //=================================================================================================

        //=================================================================================================
        // data yg code baru
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================

        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['name'], $excel['zipcode'],  $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/outputfix.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('successdis', 'done!');
    }

    public function search1()
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/output1.json", "r"), true);
        //=================================================================================================

        //=================================================================================================
        // data yg code baru
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================

        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['name'], $excel['zipcode'],  $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/outputfix1.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('successdis1', 'done!');
    }

    public function search2()
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/output2.json", "r"), true);
        //=================================================================================================

        //=================================================================================================
        // data yg code baru
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================

        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['name'], $excel['zipcode'],  $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/outputfix2.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('successdis2', 'done!');
    }

    public function search3()
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/output3.json", "r"), true);
        //=================================================================================================

        //=================================================================================================
        // data yg code baru
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================

        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['name'], $excel['zipcode'],  $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/outputfix3.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('successdis3', 'done!');
    }

    public function search4()
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/output4.json", "r"), true);
        //=================================================================================================

        //=================================================================================================
        // data yg code baru
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================

        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['name'], $excel['zipcode'],  $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/outputfix4.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('successdis4', 'done!');
    }

    public function search5()
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/output5.json", "r"), true);
        //=================================================================================================

        //=================================================================================================
        // data yg code baru
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================

        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['name'], $excel['zipcode'],  $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/outputfix5.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('successdis5', 'done!');
    }

    public function search6()
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/output6.json", "r"), true);
        //=================================================================================================

        //=================================================================================================
        // data yg code baru
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================

        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['name'], $excel['zipcode'],  $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/outputfix6.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('successdis6', 'done!');
    }

    public function search7()
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/output7.json", "r"), true);
        //=================================================================================================

        //=================================================================================================
        // data yg code baru
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================

        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['name'], $excel['zipcode'],  $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/outputfix7.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('successdis7', 'done!');
    }

    public function search8()
    {
        $array = $fields = array();
        $i = 0;
        //=================================================================================================
        // data yg ada zipcodenya
        $zipcode = json_decode(file_get_contents("../public/assets/output8.json", "r"), true);
        //=================================================================================================

        //=================================================================================================
        // data yg code baru
        $villages = json_decode(file_get_contents("../public/assets/wilayahv2.json"), true);
        //=================================================================================================

        //ambil data yg excel
        $merge = array();
        $sample_excel = $zipcode;
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['name'], $excel['zipcode'],  $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/outputfix8.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('successdis8', 'done!');
    }


    public function search_json($snitch, $post, $seeker)
    {
        $snitch_up = trim(strtoupper($snitch));
        $ketemu = 0;
        foreach ($seeker as $index => $data) {
            if (trim(strtoupper($data['name'])) == $snitch_up) {
                $distric = substr($data["code"], 0, 8);
                $code = $data["code"];
                $name = $snitch_up;
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
}
