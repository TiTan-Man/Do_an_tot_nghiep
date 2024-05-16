<a href="#" title="Lên trên" id="btnGotop" style="display: none;"><i class="fal fa-angle-up"></i></a>

<script src="{{ asset('themes/frontend/biz9/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('themes/frontend/biz9/js/lightgallery.min.js') }}"></script>
<script src="{{ asset('themes/frontend/biz9/js/app.js') }}"></script>
<script src="{{ asset('themes/frontend/biz9/js/jquery.signalR-2.2.2.min.js') }}"></script>
<script src="{{ asset('themes/frontend/biz9/js/hubs.js') }}"></script>


<!--
<script src="{{ asset('themes/frontend/biz9/js/adv.js') }}"></script>
<script src="{{ asset('themes/frontend/biz9/js/analytics.js') }}"></script>
<script src="{{ asset('themes/frontend/biz9/js/web-bundle.min.js') }}"></script>
-->
<script>
    function Search() {
        var value = $("#txtFindMobile").val().trim();
        if (isBlank(value)) {
            value = $("#txtFind").val().trim();
        }
        if (isBlank(value)) {
            alert("Nhập từ khóa tìm kiếm");
            return false;
        }
        value = value.replace(/\*|:|{|}|\[|]|@|&|%|#|(|)|\/|\\|\?/g, "");
        var url = "/tim-kiem.html?q=" + encodeURI(value);
        window.location = url;
        return false;
    }

    $(function () {
        $("#txtFindMobile,#txtFind").on('keydown', function (e) {
            if (e.keyCode === 13 && e.type === "keydown") { Search(); return false; }
        });
        $(".fa-search").click(function () { Search(); });
        $(window).scroll(function (event) {
            var scroll = $(window).scrollTop();
            console.dir(scroll);
        });
    });

</script>

@isset($web_information->source_code->javascript)
  <script>
    {!! $web_information->source_code->javascript !!}
  </script>
@endisset
