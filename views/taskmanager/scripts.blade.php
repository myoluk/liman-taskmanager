<script>
    function taskManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('task_manager_list') }}", data, function (response) {
            // Başarılıysa
            $("#task_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetFileLocation(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_file_location') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#fileLocationModal").modal("show");
            $("#fileLocationContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetServiceStatus(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("service", $(node).find("#service").html())
        request("{{ API('get_service_status') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#serviceStatusModal").modal("show");
            $("#serviceStatusContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            showSwal("Hata!", "error", 2500);
        });
    }

    function jsKillPid(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('kill_pid') }}", data, function (response) {
            // Başarılıysa
            Swal.close();
            showSwal("başarıyla sonlandırıldı", "success", 2000);
        }, function (error) {
            // Başarısızsa
            showSwal("Hata!", "error", 2500);
        });
    }

    function jsKillAllPid(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('kill_all_pid') }}", data, function (response) {
            // Başarılıysa
            Swal.close();
            showSwal("tüm işlemler sonlandırıldı", "success", 2000);
        }, function (error) {
            // Başarısızsa
            showSwal("Hata!", "error", 2500);
        });
    }

    function jsProcessTree(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('process_tree') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#processTreeModal").modal("show");
            $("#processTreeContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsProcessArgs(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_process_args') }}", data, function (response) {
            // Başarılıysa
            console.log(response);
            response = JSON.parse(response);
            $("#processArgsModal").modal("show");
            $("#processArgsContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            showSwal("Hata!", "error", 2500);
        });
    }

    $(".fileModalAc").on("click", function(event){
        console.log("test");
    });

</script>