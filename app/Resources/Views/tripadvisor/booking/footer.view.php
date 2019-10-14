<div class="footer"></div> 
<div class="section stickyb" style="background-color: #ffff; padding: 10px !important; box-shadow: none !important; border-top: 1px solid #00a680;">
    <table id="detailedQuote" class="detailedQuote">
        <tbody>
            <?php if($home->quote->first_pay):?>
            <tr class="total ">
                <td>Due now</td>
                <td class="right convertible">
                    <?=$home->quote->first_pay_l?>
                </td>
            </tr>
            <?php else:?>
            <tr class="total ">
                <td><b>Total</b></td>
                <td class="right convertible">
                    <b><?=$home->quote->total_l?></b>
                </td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>
    <div class="buttonWrapper">
        <button style="width: 100%; border: 0px solid transparent;" id="submitButton" class="ui_button original submitButton" data-tracking="ClickSubmitCardPayment" data-action="submitVault">
            <span class="lock"></span> Book Now
        </button>
        <div style="padding: 5px;">
            <small>By clicking Book Now I am acknowledging agreement to house rules</small>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <?= js('custom'); ?>
<?php if($user->prefix):?>
<script>
var matching = $('.countryCodeSelect option').removeAttr('selected').filter(function() {
                   return $(this).attr('data-country-code') == '<?=$user->prefix?>'
                });
    matching.prop('selected', true);
    $('.selectContent').html('<?=$user->prefix?>');
</script>
<?php endif;?>
</body>
</html>