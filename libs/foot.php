<script src="<?= JS_FOLDER_TEMPLATE ?>jquery.min.js"></script>
<script src="<?= JS_FOLDER_TEMPLATE ?>popper.min.js"></script>
<script src="<?= JS_FOLDER_TEMPLATE ?>bootstrap.min.js"></script>
<script src="<?= JS_FOLDER_TEMPLATE ?>main.js"></script>
<script type="text/javascript">
    var all_state = <?= json_encode(@$state_array); ?>;
    $(function (e) {
        $("#country").change(function (e) {
            var country_id = $(this).val();

            $("#city").html("");

            if (country_id > 0){
                $("#city").removeAttr('readonly');

                for(var ii=0; ii < all_state.length; ii++){
                   // console.log(all_state[ii].id);
                    if (country_id == all_state[ii].country_id){
                        var city='<option value="'+all_state[ii].id+'">'+all_state[ii].name+'</option>';
                        $("#city").append(city);
                    }else{
                        $("#city").prop('readonly', true);
                    }

                }


                return;
            }
            $("#city").prop('readonly', true);
        });
    });
</script>
</body>
</html>