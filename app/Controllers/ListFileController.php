<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class ListFileController
{
	function listFile()
    {
        $cmd = Command::runSudo("ls -la /home/test/dosyalar/");

        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);

        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);

            // veriyi formatlayalim
            $process = [
                "col1" => $process[0],
                "col2" => $process[1],
                "col3" => $process[2],
                "col4" => $process[3],
                "col5" => $process[4],
                "col6" => $process[5],
                "col7" => $process[6],
                "col8" => $process[7],
                "filename" => $process[8]
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["col1", "col2", "col3", "col4", "col5", "col6", "col7", "col8", "filename"],
            "title" => ["col1", "col2", "col3", "col4", "col5", "col6", "col7", "col8", "Dosya Adı"],
            "menu" => [
                "Dosyayı Sil" => [
                    "target" => "jsDeleteFile",
                    "icon" => "fas fa-trash"
                ]
            ]
        ]);
    }

    function deleteFile(){
        validate([
            "filename" => "required|string"
        ]);

        $deleted = Command::run("rm -rf /home/test/dosyalar/@{:filename}", [
            "filename" => request("filename")
        ]);

        return respond($deleted);
    }
}