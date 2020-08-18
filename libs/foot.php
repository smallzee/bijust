<script src="<?= JS_FOLDER_TEMPLATE ?>jquery.min.js"></script>
<script src="<?= JS_FOLDER_TEMPLATE ?>popper.min.js"></script>
<script src="<?= JS_FOLDER_TEMPLATE ?>bootstrap.min.js"></script>
<script src="<?= JS_FOLDER_TEMPLATE ?>main.js"></script>
<script type="text/javascript">
    $(function () {
       $("#country").change(function (e) {
           var country_id = $(this).val();
           if (country_id > 0){
               $("#city").removeAttr('readonly');


               return;
           }

           $("#city").prop('readonly', true);
       }) ;
    });
</script>
</body>
</html>