<!-- Scripts -->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=en"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/js/material-design.js"></script>

<script src="<?= base_url('assets/admin') ?>/js/jquery.validate.min.js"></script>
<script>
    var onloadCallback = function() {
        grecaptcha.render('html_element', {
            'sitekey' : '6LfdVTwUAAAAAAOIuuZtdmo_cJ4jviJan4uHysyE'
        });
    };
    onloadCallback();
</script>
<script src="<?= base_url('assets/admin') ?>/js/validation.js"></script>
<script src="<?= base_url('assets/admin') ?>/js/account.js"></script>