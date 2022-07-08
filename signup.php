x<div id="modal-signup" class="modal fade">
    <div class="modal-dialog">


        <div class="modal-content">
            <div class="modal-header">
                <h1>Form đăng ký</h1>
                <div class="alert alert-danger" id="div-error" style="display:none;">
                    <!-- <strong>Danger!</strong> Indicates a dangerous or potentially negative action. -->
                </div>
            </div>
            <div class="modal-body">
                <form id="form-signup" method="POST">
                    Tên
                    <input type="text" name="name">
                    <br>
                    Email
                    <input type="email" name="email">
                    <br>
                    Mật khẩu
                    <input type="password" name="password">
                    <br>
                    Sđt
                    <input type="text" name="phone_number">
                    <br>
                    Địa chỉ
                    <input type="text" name="address">
                    <br>
                    <button>Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#form-signup").validate({
        rules: {
            "name": {
                required: true,
                // validateName: true,
                maxlength: 15
            },
            "email": {
                required: true,
                // validateEmail: true,
                email: true
            },
            "password": {
                required: true,
                // validatePassword: true,
                minlength: 8
            }
            // "phone_number" {
            //     required: true,
            //     // validatePhoneNumber: true,
            //     minlength: 10;
            // },
            // "address" {
            //     required: true,
            //     // validateAddress: true,
            //     maxlength: 200;
            // }
        },
        messages: {
            "name": {
                required: " Bắt buộc nhập username",
                maxlength: " Hãy nhập tối đa 15 ký tự"
            },
            "email": {
                required: " Bắt buộc nhập email",
                email: " Nhập email sai rồi"
            },
            "password": {
                required: " Bắt buộc nhập password",
                minlength: " Hãy nhập ít nhất 8 ký tự"
            }
            // "phone_number" {
            //     required: "Bắt buộc điền số điện thoại",
            //     minlength: "Nhập ít nhất 10 số"
            // },
            // "address" {
            //     required: "Bắt buộc điền địa chỉ"
            // }
        },
        submitHandler: function() {
            $.ajax({
                    url: 'process_signup.php',
                    type: 'POST',
                    dataType: 'html',
                    data: $("#form-signup").serializeArray(),
                })
                .done(function(response) {
                    if (response !== '1') {
                        $("#div-error").text(response);
                        $("#div-error").show();
                    } else {
                        $("#modal-signup").toggle();
                        $(".modal-backdrop").hide();
                        $(".menu-user").show();
                        $(".menu-guest").hide();
                        $("#span-name").text("input[name='name']".val());
                    }
                });
        }
    });
});
</script>