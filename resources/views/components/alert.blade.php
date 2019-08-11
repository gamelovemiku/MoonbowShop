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
    swal("มีบางอย่างไม่ถูกต้อง!", "ดูเหมือนว่าจะมีการกระทำบางอย่างทำให้การสั่งซื้อไม่สำเร็จ!", "warning");
    bulmaToast.toast({ 
        message: "มีบางอย่างไม่ถูกต้อง! ดูเหมือนว่าจะมีการกระทำบางอย่างทำให้การสั่งซื้อไม่สำเร็จ",
        type: "is-warning has-text-left",
        dismissible: true,
        duration: 5000,
        animate: { in: "fadeInUp", out: "fadeOutRight" }
        });
</script>
@endif