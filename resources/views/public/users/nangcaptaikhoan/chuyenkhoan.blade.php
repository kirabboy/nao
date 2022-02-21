@include('public.users.layout.header')
<style>
    p {
        font-size: 14px;
    }

    .modal-dialog {
        margin-top: 65px;
    }

    .modal-content {
        background-color: #ebf4ec;
    }

    .modal-content p{
        color: #2d7638;
    }
</style>
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('profile')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                <span class="ps-3"> Chuyển khoản</span></a>
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row p-3 pt-0">
        <div class="col-12 pb-4">
            <div class="row">
                <div class="col-6 text-start">
                    <p class="m-0 pb-3">Ngân hàng</p>
                    <p class="m-0 pb-3">Số tài khoản</p>
                    <p class="m-0 pb-3">Chủ tài khoản</p>
                    <p class="m-0 pb-3">Nội dung CK</p>
                    <p class="m-0 pb-3">Hạn thanh toán</p>
                    <p class="m-0 fw-bold pb-3" style="font-size: 20px;">Tổng tiền</p>
                </div>
                <div class="col-6 text-end">
                    <p class="m-0 pb-3 color-xanhngoc">{{$bank->bank_name}} {{$bank->bank_chinhanh}}</p>
                    <p class="m-0 pb-3 color-xanhngoc">
                        <span class="btn_linkgioithieu">{{$bank->bank_number}}</span>
                        <span class="linkgioithieu"><i class="fa fa-clone" aria-hidden="true"></i></span>
                    </p>
                    <p class="m-0 pb-3 color-xanhngoc">{{$bank->bank_boss}}</p>
                    <p class="m-0 pb-3 color-xanhngoc">
                        <span class="btn_linkgioithieu">Nangcap{{$user->code_user}}</span>
                        <span class="linkgioithieu"><i class="fa fa-clone" aria-hidden="true"></i></span>
                    </p>
                    <p class="m-0 pb-3 color-xanhngoc">58:09</p>
                    <p class="m-0 pb-3 fw-bold color-xanhngoc" style="font-size: 20px;">
                        {{$bank->price_upgrade}} VNĐ
                    </p>
                </div>
            </div>
        </div>

        <form method="POST" action="{{route('chuyenkhoan')}}" role="form" enctype="multipart/form-data">
            <div class="col-12 pb-5">
                <div class="card-hoahong" style="box-shadow: none; border: 1px solid #f6974f">
                    <div class="card-body pt-1 pb-1">
                        <p class="m-0 pb-3 fw-bold">Hướng dẫn chuyển khoản</p>
                        <p class="m-0">{{$bank->note}}</p>
                    </div>
                </div>
                <div class="pt-3">
                    <i class="fa fa-upload" aria-hidden="true"></i>
                    <label for="uploadImage" class="color-camVIP">Tải hình ảnh chuyển khoản lên</label>
                    <input id="uploadImage" style="display:none;" name="imageChuyenKhoan" type="file">
                    <div id="result" class="uploadPreview">
                </div>
            </div>

            <div class="col-12 text-center pt-3">
                <button class="btn btn-radius btn-cam" style="width: 60%;font-size: 16px;"  data-bs-toggle="modal"
                 data-bs-target="#exampleModal">Hoàn tất</button>
            </div>
        @csrf
        </form>
    <!-- Chuyen Khoan Thanh Cong -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <p class="m-0 fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i> Đăng ký thành công</p>
                <p class="m-0">Cảm ơn quý khách đã đăng ký, chúng tôi sẽ liên lạc sau khi xác nhận thanh toán thành công</p>
            </div>
        </div>
    </div>       
    <!-- End Modal Chuyen Khoan Thanh Cong --> 
    </div>  
</section>
<script>
$("#uploadImage").change(function() {
    filename = this.files[0].name;
    console.log(filename);
});

window.onload = function() {
  if (window.File && window.FileList && window.FileReader) {
    var filesInput = document.getElementById("uploadImage");
    filesInput.addEventListener("change", function(event) {
      var files = event.target.files;
      var output = document.getElementById("result");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          var div = document.createElement("div");
          div.innerHTML = "<img width='100%' class='thumbnail' src='" + picFile.result + "'" +
            "title='" + picFile.name + "'/>";
          output.insertBefore(div, null);
        });        
        picReader.readAsDataURL(file);
      }
    });
  }
}
</script>
@include('public.users.layout.footer')
