<html>

<head>
    <title>transfer</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="csrf_token()">
</head>

<body>
    <form method="POST" action="transfer">
        {* <input type="hidden" name="token" value="{$token}" /> *}
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