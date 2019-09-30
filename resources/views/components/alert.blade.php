@if (session()->has('RedeemNotFoundError'))
<script>
    swal("ไม่พบโค๊ดนี้ในระบบหรือโค๊ดไม่ถูกต้อง", "โปรดลองตรวจสอบดูอีกครั้ง", "warning");
    bulmaToast.toast({
        message: "ไม่พบโค๊ดนี้ในระบบหรือโค๊ดไม่ถูกต้อง",
        type: "is-danger has-text-left",
        dismissible: true,
        duration: 5000,
        animate: { in: "fadeInUp", out: "fadeOutRight" }
    });
</script>
@endif

@if (session()->has('RedeemClaimedError'))
<script>
    swal("โค๊ดนี้ถูกใช้ไปแล้ว", "โปรดลองตรวจสอบดูอีกครั้ง", "warning");
    bulmaToast.toast({
        message: "ไม่พบโค๊ดนี้ในระบบหรือโค๊ดไม่ถูกต้อง",
        type: "is-danger has-text-left",
        dismissible: true,
        duration: 5000,
        animate: { in: "fadeInUp", out: "fadeOutRight" }
    });
</script>
@endif

@if (session()->has('moneyNotEnough'))
<script>
    swal("ผิดพลาด: มีคุณมีเงินไม่เพียงพอ", "คุณไม่สามารถซื้อสินค้านี้ได้ เนื่องจากมี Points ไม่เพียงพอ!", "warning");
    bulmaToast.toast({
        message: "คุณมีจำนวน Point ไม่เพียงพอในการซื้อสินค้านี้",
        type: "is-warning has-text-left",
        dismissible: true,
        duration: 5000,
        animate: { in: "fadeInUp", out: "fadeOutRight" }
    });
</script>
@endif

@if (session()->has('buyComplete'))
<script>
    swal("สั่งซื้อสำเร็จ!", "ระบบทำการจัดส่งสินค้าให้คุณแล้ว!", "success");
    bulmaToast.toast({
        message: "สั่งซื้อสำเร็จ! ระบบทำการจัดส่งสินค้าให้คุณแล้ว",
        type: "is-success has-text-left",
        dismissible: true,
        duration: 5000,
        animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
</script>
@endif

@if (session()->has('somethingError'))
<script>
    swal("มีบางอย่างไม่ถูกต้อง!", "ดูเหมือนว่าจะมีการกระทำบางอย่างที่ผิดปกติ", "warning");
    bulmaToast.toast({
        message: "มีบางอย่างไม่ถูกต้อง! ดูเหมือนว่าจะมีการกระทำบางอย่างที่ผิดปกติ",
        type: "is-warning has-text-left",
        dismissible: true,
        duration: 5000,
        animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
</script>
@endif

@if (session()->has('manageItemAdded'))
    <script>
        bulmaToast.toast({
            message: "เพิ่มไอเท็มใหม่เรียบร้อย!",
            type: "is-succcess has-text-left",
            dismissible: true,
            duration: 5000,
            animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
    </script>
@endif


@if (session()->has('manageItemRemoved'))
    <script>
        bulmaToast.toast({
            message: "ลบไอเท็มออกจากร้านค้าแล้ว!",
            type: "is-danger has-text-left",
            dismissible: true,
            duration: 5000,
            animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
    </script>
@endif

@if (session()->has('manageCategoryAdded'))
    <script>
        bulmaToast.toast({
            message: "เพิ่มหมวดหมูไอเท็มใหม่แล้ว!",
            type: "is-success has-text-left",
            dismissible: true,
            duration: 5000,
            animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
    </script>
@endif

@if (session()->has('manageCategoryRemoved'))
    <script>
        bulmaToast.toast({
            message: "ลบหมวดหมู่ไอเท็มสำเร็จ!",
            type: "is-success has-text-left",
            dismissible: true,
            duration: 5000,
            animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
    </script>
@endif

@if (session()->has('manageItemEdited'))
    <script>
        bulmaToast.toast({
            message: "แก้ไขข้อมูลไอเท็มสำเร็จ!",
            type: "is-success has-text-left",
            dismissible: true,
            duration: 5000,
            animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
    </script>
@endif

@if (session()->has('manageCommandsenderSuccess'))
    <script>
        bulmaToast.toast({
            message: "ส่งคำสั่งไปยังเซิร์ฟเวอร์สำเร็จแล้ว!",
            type: "is-success has-text-left",
            dismissible: true,
            duration: 5000,
            animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
    </script>
@endif


@if (session()->has('noPermission'))
    <script>
        swal("ไม่มีสิทธิ์!", "คุณไม่ได้รับอนุญาตให้ใช้งานส่วนนี้", "error");
        bulmaToast.toast({
            message: "คุณไม่มีสิทธิ์เข้าถึงส่วนนี้!",
            type: "is-danger has-text-left",
            dismissible: true,
            duration: 5000,
            animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
    </script>
@endif

@if (session()->has('successfullyUpdateData'))
    <script>
        swal("อัพเดทข้อมูลเรียบร้อย!", "ข้อมูลถูกอัพเดทให้เป็นปัจจุบันแล้ว", "success");
        bulmaToast.toast({
            message: "อัพเดทข้อมูลเรียบร้อย!",
            type: "is-success has-text-left",
            dismissible: true,
            duration: 5000,
            animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
    </script>
@endif

@if (session()->has('successfullyTopup'))
    <script>
        swal("ขอบคุณสำหรับการสนับสนุน!", "ระบบได้เพิ่ม {{ number_format(session()->get('successfullyTopup')) }} Point เข้าบัญชีของคุณแล้ว", "success");
        bulmaToast.toast({
            message: "<p><b>[TOPUP]</b> <br> ได้รับ {{ number_format(session()->get('successfullyTopup')) }} Points จากการเติมเงิน</p>",
            type: "is-info has-text-left",
            dismissible: true,
            duration: 5000,
            animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
    </script>
@endif

@if (session()->has('forumOwnerOnly'))
    <script>
        bulmaToast.toast({
            message: "<p>เฉพาะเจ้าโพสต์เท่านั้นที่มีสิทธิ์เข้าถึงส่วนนี้</p>",
            type: "is-danger has-text-left",
            dismissible: true,
            duration: 5000,
            animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
    </script>
@endif
