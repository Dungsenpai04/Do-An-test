$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    
    var imageCount = 0;

    // Thêm hình ảnh mới
    $("#add-image").click(function(){
        imageCount++;
        var newRow = `
            <div class="row d-flex align-items-center">
                <div class="col-md-2">
                    <img src="http://127.0.0.1:8000/administrator/image-default.png" width="100%" id="image-${imageCount}">
                </div>
                <div class="col-md-8">
                    <input type="file" name="images[]" class="form-control" data-image="${imageCount}">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger w-100 delete-image" data-image="${imageCount}">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>`;
        $(".group-image-details").append(newRow);
    });

    // Xóa hình ảnh
    $(".group-image-details").on('click', '.delete-image', function(){
        var imageNumber = $(this).data('image');
        $("#image-" + imageNumber).closest(".row").remove();
    });

    // Xử lý khi thay đổi hình ảnh
    $(".group-image-details").on('change', 'input[name="images[]"]', function(){
        var imageNumber = $(this).data('image');
        var file = this.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function(e){
                $("#image-" + imageNumber).attr("src", e.target.result);
            }

            reader.readAsDataURL(file);
        }
    });

    $('.file_old').change(function(){
        var file = $(this)[0].files[0];
        var number = $(this).data('image');
        var url = $(this).data('url');
        
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#image-" + number).attr("src", e.target.result);
            }

            reader.readAsDataURL(file);
        }

        uploadImage(file, url);
    });
});

function uploadImage(file, url) {
    var formData =  new FormData();
    formData.append('image', file);

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        processData: false, 
        contentType: false,
        success: function(res){
            console.log(res);
        }
    });
}