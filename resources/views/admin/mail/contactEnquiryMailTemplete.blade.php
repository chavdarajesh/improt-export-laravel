<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Enquiry | {{ env('APP_NAME', 'Laravel App') }} </title>
</head>

<body
    style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; -webkit-text-size-adjust:none">
    <center style="width: 100%; table-layout: fixed;">
        <div style="margin:10px;padding:10px;max-width:650px; margin:0 auto;" bgcolor="#ffffff">
            <table style="max-width:320px" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fff">

                <tbody>
                    <tr>
                        <td style="padding:10px 10px">

                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td bgcolor="#ffffff">
                                            <table width="600" align="center" style="margin:0 auto" cellpadding="0"
                                                cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding:40px 10px 0px 0px;background-color:#f9f9f9">
                                                            <table width="100%" cellpadding="0" cellspacing="0"
                                                                align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <th width="113" align="center">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="line-height:0">
                                                                                            <a style="text-decoration:none"
                                                                                                href="{{ route('front.home') }}">{{ env('APP_NAME', 'Laravel App') }}</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td bgcolor="#ffffff">
                                            <table width="600" align="center" style="margin:0 auto" cellpadding="0"
                                                cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding:0px 30px 10px" bgcolor="#f9f9f9">
                                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                                <tbody>

                                                                    <tr>
                                                                        <td align="left"
                                                                            style="font:14px/16px Arial;color:#888;padding:0 0 23px">
                                                                            Hello,<br>
                                                                            <br>
                                                                            New Contact Enquiry Submited With Below
                                                                            Details.<br><br>
                                                                            <br>
                                                                            <br>
                                                                            <p>Name: {{ $data['name'] }}</p>
                                                                            <p>Email: {{ $data['email'] }}</p>
                                                                            <p>Phone: {{ $data['phone'] }}</p>
                                                                            <p>Subject: {{ $data['subject'] }}
                                                                            </p>
                                                                            <p>message: {{ $data['message'] }}
                                                                            </p>
                                                                            <p>Enquiry Date:
                                                                                {{ $data['created_at'] }}</p>
                                                                            <br><br>
                                                                            <div
                                                                                style="text-align: center; margin-top: 15px">
                                                                                <a href="{{ route('admin.contact.messages.view', $data['id']) }}"
                                                                                    style="height:40px;background-color:grey;border:2px solid grey;border-radius:50px;color:#ffffff;display:block;font-family:verdana,helvetica,sans-serif;font-size:18px;line-height:40px;text-align:center;text-decoration:none;width:185px;margin: 0 auto"
                                                                                    target="_blank">View Details</a>
                                                                            </div>
                                                                            <br>
                                                                            <br>
                                                                            <p>Thank You !</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
</body>

</html>
