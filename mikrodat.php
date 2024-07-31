<?php

$data = [
    [
        "ev",
        "datum",
        "kategoria",
        "idopont",
        "hely",
        "nev",
        "zart",
        "targy",
        "felelos",
        "pdf",
    ],
];
$api_base_url = "https://mikrodat.ujbuda.hu/app/cms/api/honlap/";
$pdf_base_url = "https://mikrodat.ujbuda.hu/app/cms/api/honlap/getfile/";

function get($url, $params = [])
{
    global $api_base_url;
    $query = http_build_query($params);
    $response = file_get_contents($api_base_url . $url . "?" . $query);
    return json_decode($response, true)["content"];
}

function csv($list)
{
    $fp = fopen("mikrodat.csv", "w");

    // Loop through file pointer and a line
    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }

    fclose($fp);
}

$years = get("jegy/years");

foreach ($years as $year) {
    echo "\nY";
    $folders = get("jegy/folders", ["year" => $year]);

    foreach ($folders as $folder) {
        echo "F";
        $items = get("jegy/biz", ["id" => $folder["uuid"]]);
        foreach ($items as $item) {
            echo "I";
            $documents = get("jegy/list", [
                "id" => $folder["uuid"],
                "id2" => $item["uuid"],
            ]);

            foreach ($documents as $document) {
                echo "D";
                $data[] = [
                    $year,
                    $folder["datum"],
                    $folder["kategoria"],
                    $folder["idopont"],
                    $folder["hely"],
                    $folder["nev"],
                    $document["nyilvanossagjelolo"],
                    $document["targy"],
                    $document["felelos"],
                    $document["nyilvanossagjelolo"]
                        ? ""
                        : $pdf_base_url .
                            $document["uuid"] .
                            "/" .
                            rawurlencode($document["name"]),
                ];
            }

            if (count($documents) == 0) {
                $data[] = [
                    $year,
                    $folder["datum"],
                    $folder["kategoria"],
                    $folder["idopont"],
                    $folder["hely"],
                    $folder["nev"],
                    "",
                    "NINCS ELÉRHETŐ DOKUMENTUM",
                    "",
                    "",
                ];
            }
        }
    }
}
csv($data);
