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
        $sample_excel = array_slice($zipcode, 0, 5);
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['Kelurahan/village'], $excel['Postal Code'], $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/output.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('success','done!');

        /* =================================================================================================*/
        // ambil data yg json
        // $sample_json = array_slice($villages, 0, 5);
        // dd($sample_json);
        // foreach ($sample_json as $json) {
        //     echo $json['name'] . '<br>';
        // }
        /* =================================================================================================*/
    }
    public function search1()
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
        $sample_excel = array_slice($zipcode, 10000, 5);
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['Kelurahan/village'], $excel['Postal Code'], $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/output1.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('success1','done!');

        /* =================================================================================================*/
        // ambil data yg json
        // $sample_json = array_slice($villages, 0, 5);
        // dd($sample_json);
        // foreach ($sample_json as $json) {
        //     echo $json['name'] . '<br>';
        // }
        /* =================================================================================================*/
    }
    public function search2()
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
        $sample_excel = array_slice($zipcode, 20000, 5);
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['Kelurahan/village'], $excel['Postal Code'], $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/output2.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('success2','done!');

        /* =================================================================================================*/
        // ambil data yg json
        // $sample_json = array_slice($villages, 0, 5);
        // dd($sample_json);
        // foreach ($sample_json as $json) {
        //     echo $json['name'] . '<br>';
        // }
        /* =================================================================================================*/
    }
    public function search3()
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
        $sample_excel = array_slice($zipcode, 30000, 5);
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['Kelurahan/village'], $excel['Postal Code'], $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/output3.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('success3','done!');

        /* =================================================================================================*/
        // ambil data yg json
        // $sample_json = array_slice($villages, 0, 5);
        // dd($sample_json);
        // foreach ($sample_json as $json) {
        //     echo $json['name'] . '<br>';
        // }
        /* =================================================================================================*/
    }
    public function search4()
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
        $sample_excel = array_slice($zipcode, 40000, 5);
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['Kelurahan/village'], $excel['Postal Code'], $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/output4.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('success4','done!');

        /* =================================================================================================*/
        // ambil data yg json
        // $sample_json = array_slice($villages, 0, 5);
        // dd($sample_json);
        // foreach ($sample_json as $json) {
        //     echo $json['name'] . '<br>';
        // }
        /* =================================================================================================*/
    }
    public function search5()
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
        $sample_excel = array_slice($zipcode, 50000, 5);
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['Kelurahan/village'], $excel['Postal Code'], $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/output5.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('success5','done!');

        /* =================================================================================================*/
        // ambil data yg json
        // $sample_json = array_slice($villages, 0, 5);
        // dd($sample_json);
        // foreach ($sample_json as $json) {
        //     echo $json['name'] . '<br>';
        // }
        /* =================================================================================================*/
    }
    public function search6()
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
        $sample_excel = array_slice($zipcode, 60000, 5);
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['Kelurahan/village'], $excel['Postal Code'], $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/output6.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('success6','done!');

        /* =================================================================================================*/
        // ambil data yg json
        // $sample_json = array_slice($villages, 0, 5);
        // dd($sample_json);
        // foreach ($sample_json as $json) {
        //     echo $json['name'] . '<br>';
        // }
        /* =================================================================================================*/
    }
    public function search7()
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
        $sample_excel = array_slice($zipcode, 70000, 5);
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['Kelurahan/village'], $excel['Postal Code'], $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/output7.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('success7','done!');

        /* =================================================================================================*/
        // ambil data yg json
        // $sample_json = array_slice($villages, 0, 5);
        // dd($sample_json);
        // foreach ($sample_json as $json) {
        //     echo $json['name'] . '<br>';
        // }
        /* =================================================================================================*/
    }
    public function search8()
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
        $sample_excel = array_slice($zipcode, 80000, 5);
        foreach ($sample_excel as $excel) {
            array_push($merge, $this->search_json($excel['Kelurahan/village'], $excel['Postal Code'], $villages));
        }

        $out = json_encode($merge);
        $output = fopen("../public/assets/output8.json", "w");
        fwrite($output, $out);
        fclose($output);
        return view('welcome')->with('success8','done!');

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
        $snitch_up = trim(strtoupper($snitch));
        $ketemu = 0;
        foreach ($seeker as $index => $data) {
            if (trim(strtoupper($data['name'])) == $snitch_up) {
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

}
