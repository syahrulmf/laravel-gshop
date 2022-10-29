<script src="{{ url('frontend/libraries/jquery/jquery-3.4.1.min.js') }}"></script>
<script src="{{ url('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ url('frontend/libraries/fontawesome/js/all.js') }}"></script>
<script>
    $(document).ready(function () {
        $('body').scrollspy({
        target: ".products",
        offset: 50
        });

        $("#header a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;

            $('html, body').animate({
            scrollTop: $(hash).offset().top
            }, 800, function () {

            window.location.hash = hash;
            });
        }
        });
    });
</script>