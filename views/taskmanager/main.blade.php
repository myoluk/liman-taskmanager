<div id="task_list">

</div>

@component("modal-component", [
    "id" => "fileLocationModal",
    "title" => "Dosya Konumu",
    "notSized" => "true"
    ])
    <div id="fileLocationContent"></div>
@endcomponent

@include("modal-button", [
    "text" => "Örnek Modal Aç",
    "class" => "btn-primary fileModalAc",
    "target_id" => "serviceStatusModal"
])

@component("modal-component", [
    "id" => "serviceStatusModal",
    "title" => "Servis Durumu",
    "notSized" => "true"
    ])
    <pre id="serviceStatusContent"
        style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"
    ></pre>
@endcomponent

@component("modal-component", [
    "id" => "processTreeModal",
    "title" => "İşlem Ağacı",
    "notSized" => "true"
    ])
    <pre id="processTreeContent"
        style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"
    ></pre>
@endcomponent

@component("modal-component", [
    "id" => "processArgsModal",
    "title" => "Çalıştırma Argümanları",
    "notSized" => "true"
    ])
    <pre id="processArgsContent"
        style="background-color: black; border-radius: 5px; font-size: 16px; color: white;"
    ></pre>
@endcomponent

@component("modal-component", [
    "id" => "newFileModal",
    "title" => "Yeni Dosya Oluştur",
    "notSized" => "true",
    "footer" => [
        "class" => "btn-success",
        "text" => "Oluştur",
        "onclick" => "newFileEvent()"
        ]
    ])
    <div class="input-group mb-3">
    </div>
@endcomponent


@include("taskmanager.scripts")