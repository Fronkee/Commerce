var modalWarp = null;
var cat_id;
var name;
const showModal = (cat_name, id) => {
    cat_id = id;
    name = cat_name;
    if (modalWarp != null) {
        modalWarp.remove();
    }

    modalWarp = document.createElement('div');
    modalWarp.innerHTML = `
            <div class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header " style="background-color:#2a5d84">
                    <h5 class="modal-title english text-white">Change Category Name
                    </h5>
                </div>
                <div class="modal-body">
                <form  method="get" class="english" enctype="multipart/form-data">
                <div class="mb-3">
                <label for="name" class="form-label english">Category Name</label>
                 <input type="text" id="name" class="form-control rounded-0 english cat_name"   name="name" value="${name}">
                 <div class="mb-3">             
                 </div>
                 </div>  
                </div>
                <div class="modal-footer" style="background-color:#2a5d84">
                    <button type="button" class="btn btn-light english" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-primary english text-white" onclick="update(event)">Update</button>
                </div>
                </form>
                </div>
            </div>
            </div>
       `;
    document.body.append(modalWarp);
    var modal = new bootstrap.Modal(modalWarp.querySelector('.modal'));
    modal.show();
}

function update(e) {
    e.preventDefault();
    // let cat_name = document.querySelector('.cat_name').value;
    var cat_name = $('.cat_name').val();
    $.ajax({
        type: "POST",
        url: "http://localhost:8080/MYSHOP/public/admin/category/update/",
        data: {
            name: cat_name,
            id: cat_id
        },
        success: function(result) {
            window.location.href = 'http://localhost:8080/MYSHOP/public/admin/category'
            alert(result);
        },
        error: function(response) {
            alert(JSON.parse(response.responseText).name);
            // alert(JSON.parse(response.responseText).name);
        }
    })
}