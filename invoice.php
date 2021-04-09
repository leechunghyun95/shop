<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h5>송장번호</h5>
        <form action="invoice_ok.php?item_no=<?= $_GET[item_no] ?>" method="POST">
            <input name="invoice">
            <button>등록</button>
        </form>
    </body>
</html>