<?php

return [
    "index" => "HomeController@index",

    // Tasks
    "runTask" => "TaskController@runTask",
    "checkTask" => "TaskController@checkTask",

    // Hostname Settings
    "get_hostname" => "HostnameController@get",
    "set_hostname" => "HostnameController@set",

    // Systeminfo
    "get_system_info" => "SystemInfoController@get",
    "install_lshw" => "SystemInfoController@install",

    // Runscript
    "run_script" => "RunScriptController@run",

    // TaskView
    "example_task" => "TaskViewController@run",

    // Task Manager Routes
    "task_manager_list" => "TaskManagerController@getList",
    "get_file_location" => "TaskManagerController@getFileLocation",
    "get_service_status" => "TaskManagerController@getServiceStatus",
    "kill_pid" => "TaskManagerController@killPid",
    "kill_all_pid" => "TaskManagerController@killAllPid",
    "process_tree" => "TaskManagerController@getProcessTree",
    "get_process_args" => "TaskManagerController@getProcessArgs",

    // List File
    "list_file" => "ListFileController@listFile",
    "delete_file" => "ListFileController@deleteFile"
];
