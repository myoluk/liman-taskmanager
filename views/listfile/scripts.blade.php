<script>
    function jsListFile()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('list_file') }}", data, function (response) {
            // Başarılıysa
            //response = JSON.parse(response);
            //$("#list-file").html(response.message);
            $("#list-file").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsDeleteFile(node)
    {
        showSwal("Siliniyor...", "info");

        let data = new FormData();
        data.append("filename", $(node).find("#filename").html())
        request("{{ API('delete_file') }}", data, function (response) {
            // Başarılıysa
            Swal.close();
            showSwal("Dosya silindi.", "success", 2500);
            //jsListFile();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
</script>