<?php /* Smarty version 2.6.32, created on 2021-11-10 10:09:44
         compiled from demo/csrf.tpl */ ?>
<html>

<head>
    <title>Trang Chuyển Tiền</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="csrf_token()">
</head>

<body>
    <form method="POST" action="transfer">
                <fieldset>
            <legend>New transfer</legend>
            <table>
                <tr>
                    <td>Account</td>
                    <td><input type="text" name="account" size="30"></td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td><input type="text" name="amount" size="30"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"> <input type="submit" name="btn_transfer" value="Transfer"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>