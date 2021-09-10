<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class TaskManagerController
{
	function getList()
    {
        // Komut çalıştırdık
        $cmd = Command::runSudo("ps -Ao user,pid,pcpu,stat,unit,pmem,comm --sort=-pcpu");

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
                "user" => $process[0],
                "pid" => $process[1],
                "cpu" => $process[2],
                "status" => $process[3],
                "service" => $process[4],
                "ram" => $process[5],
                "command" => $process[6]
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["user", "pid", "cpu", "status", "service", "ram", "command"],
            "title" => ["Kullanıcı", "PID", "% İşlemci", "Durum", "Servis", "% Bellek", "İşlem"],
            "menu" => [
                "Dosya Konumu" => [
                    "target" => "jsGetFileLocation",
                    "icon" => "fa-location-arrow"
                ],
                "Servis Durumu" => [
                    "target" => "jsGetServiceStatus",
                    "icon" => "fas fa-eye"
                ],
                "İşlemi Sonlandır" => [
                    "target" => "jsKillPid",
                    "icon" => "fa-times"
                ],
                "Tüm İşlemleri Sonlandır" => [
                    "target" => "jsKillAllPid",
                    "icon" => "fas fa-skull-crossbones"
                ],
                "İşlem Ağacı" => [
                    "target" => "jsProcessTree",
                    "icon" => "fas fa-network-wired"
                ],
                "Çalıştırma Argümanları" => [
                    "target" => "jsProcessArgs",
                    "icon" => "fas fa-running"
                ]
            ]
        ]);
    }

    function getFileLocation()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $location = Command::runSudo("readlink -f /proc/@{:pid}/exe", [
            "pid" => request("pid")
        ]);

        return respond($location);
    }

    function getServiceStatus()
    {
        validate([
            "service" => "required|string"
        ]);

        $status = Command::runSudo("systemctl status @{:service}", [
            "service" => request("service")
        ]);

        return respond($status, strlen($status) ? 200 : 400);
    }

    function killPid(){
        validate([
            "pid" => "required|numeric"
        ]);

        $command = Command::runSudo("kill -9 @{:pid}", [
            "pid" => request("pid")
        ]);

        return respond($command);
    }

    function killAllPid(){
        validate([
            "user" => "required|numeric"
        ]);

        $command = Command::runSudo("killall -u @{:user}", [
            "user" => request("user")
        ]);

        return respond($command);
    }

    function getProcessTree()
    {
        $command = Command::runSudo("pstree");

        return respond($command);
    }

    function getProcessArgs()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $args = Command::runSudo("ps -fp @{:pid}", [
            "pid" => request("pid")
        ]);

        return respond($args);
    }

}
