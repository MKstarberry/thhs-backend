<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="email_temp_wrapper">
        <div class="blue_line"></div>
        <!-- <img loading="lazy" src="../images/logo.svg" class="img" /> -->
        <div class="email_temp_content_wrapper">
            <!-- <img loading="lazy" src="../images/email_temp_img.png" class="largeImg" /> -->
            <div class="text-content">
                <div class="content">
                    <p class="sub_title" style="font-size: 22px">Dear User</p>

                    <p>
                        Please click on this link to reset your password.
                        
                        <span
                            style="
                  font-weight: 500;
                  font-size: 18px;
                  color: rgba(94, 99, 242, 1);
                ">
                            
                        </span>
                       
                        Password entered at signup.
                        Link {{ $link }}
                    </p>
                </div>
                <div style="width: 570px;margin: 48px 0 0 0;font: 16px Poppins, sans-serif;">
                    <p>
                        Best Regards,
                        <br />
                        <span
                            style="
                  font-weight: 500;
                  font-size: 20px;
                  color: rgba(94, 99, 242, 1);
                ">
                            HR Department
                        </span>
                        <br />
                        Trend Home Health Services
                        <br />
                        Main: (305) 654-4090
                        <br />
                        Fax: 305-654-0409
                    </p>
                </div>
                <div style="color: #000;align-self: end;margin-top: 44px;font: 300 12px/18px Poppins, sans-serif;">
                    <span style="font-weight: 500; color: #ee3030">CONFIDENTIALITY NOTICE:</span>
                    <span style="color: rgba(0, 0, 0, 1)">
                        The information contained in this message is confidential and is
                        intended solely for the use of the person or entity named above.
                        This message may contain individually identifiable information
                        that must remain confidential and is protected by state and
                        federal law. If the reader of this message is not the intended
                        recipient, the reader is hereby notified that any dissemination,
                        distribution or reproduction of this message is strictly
                        prohibited. If you have received this message in error, please
                        immediately notify the sender by telephone and destroy the
                        original message. We regret any inconvenience and appreciate your
                        cooperation.
                    </span>
                </div>
                <div class="footer">
                    <div  style="text-align: center;padding-top: 60px;padding-bottom: 60px;"><a href="#" style="font: 300 14px Poppins, sans-serif;background-color: #5e63f2;padding: 10px 40px;display: inline-block;text-decoration: none;color: white;border-radius: 4px;">hr@trendhhs.com</a></div>
                    <div style="color: #22b290;font: 500 24px Poppins, sans-serif;padding-top: 25px;padding-bottom: 25px;text-align: center;border-top: 1px solid #00000020;border-bottom: 1px solid #00000020;">Trend Home Health Services</div>
                    <div  style="color: #333333;font: 300 14px Poppins, sans-serif;margin-top: 25px;margin-bottom: 25px;text-align: center;">1111 Park Centre Blvd Suite 360 Miami Gardens FL, 33169</div>
                    <div style="color: #999999;font: 300 12px Poppins, sans-serif;text-align: center;">Copyright © 2024</div>
                  </div>
            </div>
        </div>
    </div>
    <style>
        .email_temp_wrapper {
            background-color: #fff;
            display: flex;
            max-width: 698px;
            flex-direction: column;
            color: #5e63f2;
            font-weight: 400;
            line-height: 22px;
            padding: 32px 29px;
        }

        @media (max-width: 991px) {
            .email_temp_wrapper {
                padding: 0 20px;
            }
        }

        .blue_line {
            background-color: #5e63f2;
            height: 14px;
        }

        @media (max-width: 991px) {
            .blue_line {
                max-width: 100%;
            }
        }

        .img {
            aspect-ratio: 2.27;
            object-fit: auto;
            object-position: center;
            width: 140px;
            margin-top: 11px;
            max-width: 100%;
        }

        .text-content {
            margin-left: 25px;
        }

        .email_temp_content_wrapper {
            display: flex;
            margin-top: 11px;
            flex-direction: column;
            padding: 33px 7px;
        }

        @media (max-width: 991px) {
            .email_temp_content_wrapper {
                max-width: 100%;
            }
        }

        .largeImg {
            aspect-ratio: 3.33;
            object-fit: auto;
            object-position: center;
            width: 100%;
        }

        @media (max-width: 991px) {
            .largeImg {
                max-width: 100%;
            }
        }

        .content {
            align-self: start;
            margin: 29px 0 0 0;
            font: 14px Poppins, sans-serif;
        }

        .best_regard_section p,
        .content .sub_title {
            color: #333333;
        }

        .content p {
            color: #333333;
            font-size: 16px;
        }

        @media (max-width: 991px) {
            .content {
                margin-left: 10px;
            }
        }

        .best_regard_section {
            width: 570px;
            margin: 48px 0 0 0;
            font: 16px Poppins, sans-serif;
        }

        @media (max-width: 991px) {
            .best_regard_section {
                margin: 40px 0 0 10px;
            }
        }

        .email_temp_footer {
            color: #000;
            align-self: end;
            margin-top: 44px;
            font: 300 12px/18px Poppins, sans-serif;
        }

        @media (max-width: 991px) {
            .email_temp_footer {
                max-width: 100%;
                margin: 40px 4px 0 0;
            }
        }

        .footer .btn_wrap {
            text-align: center;
            padding-top: 60px;
            padding-bottom: 60px;
        }

        .footer .btn_wrap a {
            font: 300 14px Poppins, sans-serif;
            background-color: #5e63f2;
            padding: 10px 40px;
            display: inline-block;
            text-decoration: none;
            color: white;
            border-radius: 4px;
        }

        .site_title {
            color: #22b290;
            font: 500 24px Poppins, sans-serif;
            padding-top: 25px;
            padding-bottom: 25px;
            text-align: center;
            border-top: 1px solid #00000020;
            border-bottom: 1px solid #00000020;
        }

        .address {
            color: #333333;
            font: 300 14px Poppins, sans-serif;
            margin-top: 25px;
            margin-bottom: 25px;
            text-align: center;
        }

        .copy {
            color: #999999;
            font: 300 12px Poppins, sans-serif;
            text-align: center;
        }
    </style>
</body>

</html>
