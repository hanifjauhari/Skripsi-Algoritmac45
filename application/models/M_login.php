<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{


    // get query profile
    function getDataProfile($username)
    {

        $query = "SELECT * FROM tb_profile WHERE username = '$username'";

        // eksekusi
        return $this->db->query($query);
    }




    // permintaan kode baru
    function requestNewCode()
    {

        $email = $this->input->post('email');

        $where = ['email' => $email];
        $dataProfileByEmail = $this->db->get_where('profile', $where);

        if ($dataProfileByEmail->num_rows() > 0) {

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < 6; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }


            // - - - - - - - - 
            $updateKode = ['lupa_password' => strtoupper($randomString)];
            $id_profile = $dataProfileByEmail->row_array()['id_profile'];
            $nama = $dataProfileByEmail->row_array()['nama_lengkap'];

            $this->db->where('id_profile', $id_profile)->update('profile', $updateKode);

            $this->notifikasiEmail($email, $nama, strtoupper($randomString));


            $this->session->set_flashdata('msg', '<span style="color: #0d47a1">Silahkan cek email ' . $email . ' untuk menerima kode</span>');
            redirect(base_url() . '?page=validate&email=' . $email);
        } else {

            $this->session->set_flashdata('msg', '<span style="color: #ef5350">Email ' . $email . ' tidak terdaftar</span>');
            redirect(base_url() . '?page=forgot');
        }
    }





    // proses perubahan password
    function prosesPerubahanPassword()
    {

        $email = $this->input->post('email');
        $kode  = $this->input->post('kode');
        $password  = $this->input->post('password');


        $where = ['email' => $email];
        $dataProfileByEmail = $this->db->get_where('profile', $where);

        if ($dataProfileByEmail->num_rows() > 0) {

            $id_profile = $dataProfileByEmail->row_array()['id_profile'];
            $kodeAkun   = $dataProfileByEmail->row_array()['lupa_password'];

            // pencocokan kode
            if ($kodeAkun == strtoupper($kode)) {

                $this->db->where('id_profile', $id_profile)->update('profile', ['password' => $password]);

                // redirect :: update sukses
                $this->session->set_flashdata('msg', '<span style="color: #0d47a1">Kata sandi berhasil diperbarui</span>');
                redirect(base_url() . '?page=starter');
            } else { // kode tidak valid

                $this->session->set_flashdata('msg', '<span style="color: #ef5350">Kode tidak valid !</span>');
                redirect(base_url() . '?page=validate&email=' . $email);
            }
        } else {

            $this->session->set_flashdata('msg', '<span style="color: #ef5350">Email ' . $email . ' tidak terdaftar</span>');
            redirect(base_url() . '?page=validate&email=' . $email);
        }
    }












    function notifikasiEmail($email, $nama, $kode)
    {


        // load library
        $this->load->library('email');

        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = 465;
        $config['smtp_user'] = "hanifjauhar99@gmail.com";
        $config['smtp_pass'] = "jstpuweoepawmuqg";
        $config['smtp_timeout'] = '7';
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['starttls'] = true;


        $this->email->initialize($config);


        $this->email->set_newline("\r\n");

        $this->email->from('no-reply@matchfutsal', "MatchFutsal");

        // Email penerima
        $this->email->to('"' . $email . '"'); // Email tujuan / penerima

        // Subject email
        $this->email->subject('Reset Kata Sandi');

        // membuat pesan dinamis berdasarkan status
        $pesan = "";

        $htmlContent = '
            <!doctype html>
            <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
            <head>
                <title>
                </title>
                <!--[if !mso]><!-- -->
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <!--<![endif]-->
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style type="text/css">
                    #outlook a {
                        padding: 0;
                    }
                    .ReadMsgBody {
                        width: 100%;
                    }
                    .ExternalClass {
                        width: 100%;
                    }
                    .ExternalClass * {
                        line-height: 100%;
                    }
                    body {
                        margin: 0;
                        padding: 0;
                        font-family: Sans-Serif;
                        -webkit-text-size-adjust: 100%;
                        -ms-text-size-adjust: 100%;
                    }
                    table,
                    td {
                        border-collapse: collapse;
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                    }
                    img {
                        border: 0;
                        height: auto;
                        line-height: 100%;
                        outline: none;
                        text-decoration: none;
                        -ms-interpolation-mode: bicubic;
                    }
                    p {
                        display: block;
                        margin: 13px 0;
                    }
                </style>
                <!--[if !mso]><!-->
                <style type="text/css">
                    @media only screen and (max-width:480px) {
                        @-ms-viewport {
                            width: 320px;
                        }
                        @viewport {
                            width: 320px;
                        }
                    }
                </style>
                <!--<![endif]-->
                <!--[if mso]>
                    <xml>
                    <o:OfficeDocumentSettings>
                    <o:AllowPNG/>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                    </xml>
                    <![endif]-->
                <!--[if lte mso 11]>
                    <style type="text/css">
                    .outlook-group-fix { width:100% !important; }
                    </style>
                    <![endif]-->
                <style type="text/css">
                    @media only screen and (min-width:480px) {
                        .mj-column-per-100 {
                            width: 100% !important;
                        }
                    }
                </style>
                <style type="text/css">
                </style>
            </head>
            <body style="background-color:#f9f9f9;">
                <div style="background-color:#f9f9f9;">
                    <!--[if mso | IE]>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600">
                        
                        <tr>
                            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                    <![endif]-->
                                <div style="background:#f9f9f9;background-color:#f9f9f9;Margin:0px auto;max-width:600px;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f9f9f9;background-color:#f9f9f9;width:100%;">
                                        <tbody>
                                        <tr>
                                            <td style="border-bottom:#333957 solid 5px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                                                <!--[if mso | IE]>
                                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                
                                                    <tr>
                                                        
                                                    </tr>
                                
                                                </table>
                                                <![endif]-->
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <!--[if mso | IE]>
                            </td>
                        </tr>
                    </table>
                    
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600">
                        <tr>
                            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                            <![endif]-->
                                <div style="background:#fff;background-color:#fff;Margin:0px auto;max-width:600px;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#fff;background-color:#fff;width:100%;">
                                        <tbody>
                                            <tr>
                                                <td style="border:#dddddd solid 1px;border-top:0px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                                                    <!--[if mso | IE]>
                                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                
                                                    <tr>
                                
                                                        <td style="vertical-align:bottom;width:600px;">
                                                        <![endif]-->
                                                            <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                                                                    <tr>
                                                                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                                            <div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
                                                                                Hal ' . $nama . ',
                                                                                <br><br>
                                                                                Berikut adalah kode verifikasi untuk lupa kata sandi anda. <br>

                                                                                "' . $kode . '"
                                                                                <br><br>
                                                                                Silahkan gunakan kode ini untuk mengubah kata sandi anda
                                                                                
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                                            <div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:20px;text-align:left;color:#525252;"><br>
                                                                                Salam,<br><br> Admin<br>
                                                                                
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                                            <div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:10px;line-height:20px;text-align:left;color:#525252;">
                                                                                <hr>
                                                                                <label>Jika anda mengalami permasalahan dalam pengiriman email, hubungi admin segera.</label>
                                                                                
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                    
                                                                </table>
                                                            </div>
                                                            <!--[if mso | IE]>
                                                        </td>
                                                    
                                                    </tr>
        
                                                    </table>
                                                    <![endif]-->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--[if mso | IE]>
                            </td>
                        </tr>
                    </table>
                    <![endif]-->
                </div>
            </body>
            </html>';

        // Isi email
        $this->email->message($htmlContent);
        $this->email->send();

        //return $this->email->print_debugger();
        $print = $this->email->print_debugger();

        // print_r( $print );
        // echo "Oke";
    }
}
    
    /* End of file M_login.php */
