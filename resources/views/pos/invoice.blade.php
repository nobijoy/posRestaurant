<!DOCTYPE html>
<html>
<head>
    <title>POS Invoice</title>
    <style>
        @media print {
            @page {
                size: 56mm 150mm;
            }
        }
    </style>
</head>
    <body style="width: 50mm; font-size: 10px;">
        <table align="center" style="font-size: 10px; width: fit-content">
            <tr>
                <td>
                    <div style="display: flex; justify-content: center">
                        <img src="{{asset('public/uploads/image/1678164462logo.png')}}" height="30px" width="30px">
                    </div>

                    <p style="text-align: center; margin: 0; font-weight: bold">Bangladesh Parjatan Corporation</p>
                    <p style="text-align: center; margin: 0;">E-5, C, 1 W Agargaon, Dhaka 1207</p>
                    <p style="text-align: center; margin: 0;">TIN: 423424234</p>
                    <p style="text-align: center; margin: 0;">Mobile: 0193453453</p>
                    <p>Bill No: 4678679789</p>

                    <hr>
                    <div style="float: left; width: 50%;">
                        <p>Name : Jane Doe</p>
                        <p>Phone : +88014645665</p>
                    </div>
                    <div style="float: right; width: 50%;">
                        <p>Date : 12/03/2023</p>
                        <p>Payment Type : Cash</p>
                    </div>

                    <p style="margin-bottom:20px;"><strong>Order Details</strong></p>
                    <hr>
                    <table align="center" style="font-size: 10px; width: 100%; margin: 0;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                            <tr>
                                <td>1</td>
                                <td>Beef Burger</td>
                                <td>2</td>
                                <td>220</td>
                                <td>440</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Beef Burger</td>
                                <td>2</td>
                                <td>220</td>
                                <td>440</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Beef Burger</td>
                                <td>2</td>
                                <td>220</td>
                                <td>440</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>

                    <div style="margin: 3px 3px;">
                        <div style="float: left; width: 50%;">
                            <p>Sub Total:</p>
                            <p>VAT: </p>
                            <p>Charge: </p>
                            <p>Grand Total: </p>
                            <p>Rounded: </p>
                        </div>
                        <div style="float: right; width: 50%; text-align: right">
                            <p>1200.00</p>
                            <p>85.59</p>
                            <p>60.00</p>
                            <p>1425.59</p>
                            <p>1425.00</p>
                        </div>
                    </div>
                    <p><span style="font-weight: bold">Your Special Request:</span> </p>
                    <p style="font-style: italic;">Note: If you have any feedback you can reach us via email: ,
                         or phone:   </p>
                    <p style="">Thank You For Visiting</p>
                </td>
            </tr>
        </table>
    </body>

</html>
